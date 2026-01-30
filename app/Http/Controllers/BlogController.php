<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts
     */
    public function index()
    {
        $posts = BlogPost::with('category')
            ->where('published_at', '<=', now())
            ->orWhereNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $categories = BlogCategory::withCount('posts')
            ->whereHas('posts', function($query) {
                $query->where('published_at', '<=', now())
                      ->orWhereNull('published_at');
            })
            ->orderBy('name')
            ->get();

        return view('blog-dynamic', compact('posts', 'categories'));
    }

    /**
     * Display a single blog post
     */
    public function show(BlogPost $blog)
    {
        // Check if post is published
        if ($blog->published_at && $blog->published_at > now()) {
            abort(404);
        }

        // Get related posts from the same category
        $relatedPosts = BlogPost::with('category')
            ->where('blog_category_id', $blog->blog_category_id)
            ->where('id', '!=', $blog->id)
            ->where(function($query) {
                $query->where('published_at', '<=', now())
                      ->orWhereNull('published_at');
            })
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Load blog post images
        $blog->load('images');

        return view('blog-show', compact('blog', 'relatedPosts'));
    }

    /**
     * Display posts by category
     */
    public function category(BlogCategory $category)
    {
        $posts = BlogPost::with('category')
            ->where('blog_category_id', $category->id)
            ->where('published_at', '<=', now())
            ->orWhereNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $categories = BlogCategory::withCount('posts')
            ->whereHas('posts', function($query) {
                $query->where('published_at', '<=', now())
                      ->orWhereNull('published_at');
            })
            ->orderBy('name')
            ->get();

        return view('blog-dynamic', compact('posts', 'categories', 'category'));
    }
}
