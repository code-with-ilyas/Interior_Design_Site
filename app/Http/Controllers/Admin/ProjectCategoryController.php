<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryRequest;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', ProjectCategory::class);

        $categories = ProjectCategory::latest()->paginate(10);
        return view('admin.project-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', ProjectCategory::class);

        return view('admin.project-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectCategoryRequest $request)
    {
        $this->authorize('create', ProjectCategory::class);

        $category = ProjectCategory::create($request->validated());

        return redirect()->route('admin.project-categories.index')->with('success', 'Project category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectCategory $projectCategory)
    {
        $this->authorize('view', $projectCategory);

        $projectCategory->load('projects');
        return view('admin.project-categories.show', compact('projectCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $projectCategory)
    {
        $this->authorize('update', $projectCategory);

        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $this->authorize('update', $projectCategory);

        $projectCategory->update($request->validated());

        return redirect()->route('admin.project-categories.index')->with('success', 'Project category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        $this->authorize('delete', $projectCategory);

        $projectCategory->delete();

        return redirect()->route('admin.project-categories.index')->with('success', 'Project category deleted successfully.');
    }
}
