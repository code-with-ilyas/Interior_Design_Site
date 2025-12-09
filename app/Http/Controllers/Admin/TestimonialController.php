<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'testimonial_text' => 'required|string',
            'client_image' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'client_name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'testimonial_text' => 'required|string',
            'client_image' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('client_image')) {
            // Delete old image
            if ($testimonial->client_image) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            $data['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->client_image) {
            Storage::disk('public')->delete($testimonial->client_image);
        }

        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
