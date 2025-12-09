<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramGallery;
use Illuminate\Http\Request;

class InstagramGalleryController extends Controller
{
    public function index()
    {
        $images = InstagramGallery::latest()->get();
        return view('admin.instagram.index', compact('images'));
    }

    public function create()
    {
        return view('admin.instagram.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('instagram', 'public');

        InstagramGallery::create([
            'image' => 'storage/' . $path
        ]);

        return redirect()->route('admin.instagram.index')->with('success', 'Image added successfully');
    }

    public function destroy(InstagramGallery $instagram)
    {
        if (file_exists(public_path($instagram->image))) {
            unlink(public_path($instagram->image));
        }

        $instagram->delete();

        return back()->with('success', 'Image deleted');
    }
}
