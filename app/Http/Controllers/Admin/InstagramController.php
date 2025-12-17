<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instagram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstagramController extends Controller
{
    public function index()
    {
        $images = Instagram::latest()->paginate(10);
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

        Instagram::create([
            'image' => $path
        ]);

        return redirect()->route('admin.instagram.index')->with('success', 'Image added successfully');
    }

    public function edit(Instagram $instagram)
    {
        return view('admin.instagram.edit', compact('instagram'));
    }

    public function update(Request $request, Instagram $instagram)
    {
        $request->validate([
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::disk('public')->exists($instagram->image)) {
                Storage::disk('public')->delete($instagram->image);
            }

            $path = $request->file('image')->store('instagram', 'public');
            $instagram->image = $path;
        }

        $instagram->save();

        return redirect()->route('admin.instagram.index')->with('success', 'Image updated successfully');
    }

    public function destroy(Instagram $instagram)
    {
        if (Storage::disk('public')->exists($instagram->image)) {
            Storage::disk('public')->delete($instagram->image);
        }

        $instagram->delete();

        return back()->with('success', 'Image deleted');
    }
}
