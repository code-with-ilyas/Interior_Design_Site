<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::latest()->paginate(10);
        return view('admin.gallery-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:gallery_categories,name',
            'description' => 'nullable|string'
        ]);

        GalleryCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Gallery category created successfully.');
    }

    public function show(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery-category.show', compact('galleryCategory'));
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery-category.edit', compact('galleryCategory'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:gallery_categories,name,' . $galleryCategory->id,
            'description' => 'nullable|string'
        ]);

        $galleryCategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Gallery category updated successfully.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Gallery category deleted successfully.');
    }
}
