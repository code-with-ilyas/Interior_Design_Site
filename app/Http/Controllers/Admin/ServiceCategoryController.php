<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    // Show all service categories
    public function index()
    {
        $serviceCategories = ServiceCategory::latest()->get();
        return view('admin.service-categories.index', compact('serviceCategories'));
    }

    // Show form to create a new service category
    public function create()
    {
        return view('admin.service-categories.create');
    }

    // Store a new service category
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['name', 'description', 'order']);
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active') ? $request->is_active : false;

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('service_categories', 'public');
        }

        ServiceCategory::create($data);

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category added successfully.');
    }

    // Show service category details
    public function show(ServiceCategory $serviceCategory)
    {
        return view('admin.service-categories.show', compact('serviceCategory'));
    }

    // Show form to edit service category
    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.service-categories.edit', compact('serviceCategory'));
    }

    // Update service category
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['name', 'description', 'order']);
        $data['slug'] = Str::slug($request->name);
        $data['is_active'] = $request->has('is_active') ? $request->is_active : false;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($serviceCategory->image) {
                Storage::disk('public')->delete($serviceCategory->image);
            }
            $data['image'] = $request->file('image')->store('service_categories', 'public');
        }

        $serviceCategory->update($data);

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category updated successfully.');
    }

    // Delete service category
    public function destroy(ServiceCategory $serviceCategory)
    {
        // Check if category has services assigned to it
        if ($serviceCategory->services()->exists()) {
            return redirect()->route('admin.service-categories.index')
                ->with('error', 'Cannot delete service category because it has services assigned to it.');
        }

        // Delete image if exists
        if ($serviceCategory->image) {
            Storage::disk('public')->delete($serviceCategory->image);
        }

        $serviceCategory->delete();

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category deleted successfully.');
    }
}
