<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryRequest;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    
    public function index()
    {
        $this->authorize('viewAny', ProjectCategory::class);

        $categories = ProjectCategory::latest()->paginate(10);
        return view('admin.project-categories.index', compact('categories'));
    }

    
    public function create()
    {
        $this->authorize('create', ProjectCategory::class);

        return view('admin.project-categories.create');
    }

    
    public function store(ProjectCategoryRequest $request)
    {
        $this->authorize('create', ProjectCategory::class);

        $category = ProjectCategory::create($request->validated());

        return redirect()->route('admin.project-categories.index')->with('success', 'Project category created successfully.');
    }

    
    public function show(ProjectCategory $projectCategory)
    {
        $this->authorize('view', $projectCategory);

        $projectCategory->load('projects');
        return view('admin.project-categories.show', compact('projectCategory'));
    }

   
    public function edit(ProjectCategory $projectCategory)
    {
        $this->authorize('update', $projectCategory);

        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    
    public function update(ProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $this->authorize('update', $projectCategory);

        $projectCategory->update($request->validated());

        return redirect()->route('admin.project-categories.index')->with('success', 'Project category updated successfully.');
    }

    
    public function destroy(ProjectCategory $projectCategory)
    {
        $this->authorize('delete', $projectCategory);

        $projectCategory->delete();

        return redirect()->route('admin.project-categories.index')->with('success', 'Project category deleted successfully.');
    }
}
