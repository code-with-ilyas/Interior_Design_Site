<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function index()
    {
        $sections = AboutSection::latest()->get();
        return view('admin.about.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
        }

        AboutSection::create($data);

        return redirect()->route('admin.about.index')->with('success', 'About section added successfully.');
    }

    public function edit(AboutSection $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, AboutSection $about)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'About section updated successfully.');
    }

    public function destroy(AboutSection $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'About section deleted successfully.');
    }
}
