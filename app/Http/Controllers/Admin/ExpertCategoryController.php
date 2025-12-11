<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExpertCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpertCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ExpertCategory::class);

        $categories = ExpertCategory::latest()->paginate(10);
        return view('admin.expert-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', ExpertCategory::class);

        return view('admin.expert-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', ExpertCategory::class);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:expert_categories',
            'description' => 'nullable|string',
        ]);

        // Generate slug from name if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category = ExpertCategory::create($data);

        return redirect()->route('admin.expert-categories.index')->with('success', 'Expert category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpertCategory $expertCategory)
    {
        $this->authorize('view', $expertCategory);

        $expertCategory->load('experts');
        return view('admin.expert-categories.show', compact('expertCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpertCategory $expertCategory)
    {
        $this->authorize('update', $expertCategory);

        return view('admin.expert-categories.edit', compact('expertCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpertCategory $expertCategory)
    {
        $this->authorize('update', $expertCategory);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:expert_categories,slug,' . $expertCategory->id,
            'description' => 'nullable|string',
        ]);

        // Generate slug from name if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $expertCategory->update($data);

        return redirect()->route('admin.expert-categories.index')->with('success', 'Expert category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpertCategory $expertCategory)
    {
        $this->authorize('delete', $expertCategory);

        // Check if category has experts
        if ($expertCategory->experts()->count() > 0) {
            return redirect()->route('admin.expert-categories.index')->with('error', 'Cannot delete category with experts. Please reassign experts first.');
        }

        $expertCategory->delete();

        return redirect()->route('admin.expert-categories.index')->with('success', 'Expert category deleted successfully.');
    }
}
