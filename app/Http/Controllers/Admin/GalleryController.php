<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->latest()->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'gallery_category_id' => 'nullable|exists:gallery_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title' => $request->title,
            'gallery_category_id' => $request->gallery_category_id,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image added.');
    }

    public function edit(Gallery $gallery)
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'gallery_category_id' => 'nullable|exists:gallery_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $imagePath = $request->file('image')->store('galleries', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->title = $request->title;
        $gallery->gallery_category_id = $request->gallery_category_id;
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image updated.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image deleted.');
    }
}
