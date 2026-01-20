<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogPostImageRequest;
use App\Models\BlogPostImage;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogPost $blogPost)
    {
        $images = $blogPost->images()->latest()->paginate(10);
        return view('admin.blog-post-images.index', compact('images', 'blogPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BlogPost $blogPost)
    {
        return view('admin.blog-post-images.create', compact('blogPost'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostImageRequest $request, BlogPost $blogPost)
    {
        $validated = $request->validated();

        $validated['blog_post_id'] = $blogPost->id;
        $validated['image'] = $request->file('image')->store('blog-post-images', 'public');

        BlogPostImage::create($validated);

        return redirect()->route('admin.blog-posts.images.index', $blogPost)
            ->with('success', 'Blog post image added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPostImage $blogPostImage)
    {
        return view('admin.blog-post-images.show', compact('blogPostImage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPostImage $blogPostImage)
    {
        return view('admin.blog-post-images.edit', compact('blogPostImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPostImage $blogPostImage)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($blogPostImage->image);
            $validated['image'] = $request->file('image')->store('blog-post-images', 'public');
        }

        $blogPostImage->update($validated);

        return redirect()->route('admin.blog-posts.images.index', $blogPostImage->post)
            ->with('success', 'Blog post image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPostImage $blogPostImage)
    {
        // Delete image file
        Storage::disk('public')->delete($blogPostImage->image);

        $blogPost = $blogPostImage->post;
        $blogPostImage->delete();

        return redirect()->route('admin.blog-posts.images.index', $blogPost)
            ->with('success', 'Blog post image deleted successfully.');
    }
}
