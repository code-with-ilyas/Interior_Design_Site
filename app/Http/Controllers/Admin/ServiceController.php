<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // Show all services
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    // Show form to create a new service
    public function create()
    {
        $serviceCategories = ServiceCategory::orderBy('name')->get();
        return view('admin.services.create', compact('serviceCategories'));
    }

    // Store a new service
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'service_category_id' => 'nullable|exists:service_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_images' => 'nullable|array',
            'additional_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'short_description', 'long_description', 'icon', 'service_category_id']);
        $data['slug'] = Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service = Service::create($data);

        // Handle additional images
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $image) {
                if ($image->isValid()) {
                    $service->images()->create([
                        'image' => $image->store('services/images', 'public'),
                        'alt_text' => $image->getClientOriginalName(),
                        'order' => 0,
                        'is_primary' => false
                    ]);
                }
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service added successfully.');
    }

    // Show service details
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    // Show form to edit service
    public function edit(Service $service)
    {
        $serviceCategories = ServiceCategory::orderBy('name')->get();
        return view('admin.services.edit', compact('service', 'serviceCategories'));
    }

    // Update service
    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'service_category_id' => 'nullable|exists:service_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_images' => 'nullable|array',
            'additional_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'short_description', 'long_description', 'icon', 'service_category_id']);
        $data['slug'] = Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        // Handle additional images
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $image) {
                if ($image->isValid()) {
                    $service->images()->create([
                        'image' => $image->store('services/images', 'public'),
                        'alt_text' => $image->getClientOriginalName(),
                        'order' => 0,
                        'is_primary' => false
                    ]);
                }
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    // Delete service
    public function destroy(Service $service)
    {
        // Delete main image if exists
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        // Delete all additional images
        foreach ($service->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    /**
     * Remove a service image.
     */
    public function destroyImage(Request $request, $serviceId, $imageId)
    {
        $service = Service::findOrFail($serviceId);

        $image = $service->images()->findOrFail($imageId);

        // Delete image file
        Storage::disk('public')->delete($image->image);

        // Delete image record
        $image->delete();

        return response()->json(['success' => true]);
    }
}
