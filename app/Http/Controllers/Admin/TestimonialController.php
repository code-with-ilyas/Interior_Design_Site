<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
            'client_name' => 'required',
            'designation' => 'nullable',
            'testimonial_text' => 'required',
            'client_image' => 'nullable|image',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $request->file('client_image')
                ->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'client_name' => 'required',
            'designation' => 'nullable',
            'testimonial_text' => 'required',
            'client_image' => 'nullable|image',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $request->file('client_image')
                ->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return back()->with('success', 'Testimonial deleted');
    }
}
