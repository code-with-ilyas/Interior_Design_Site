<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Project::class);

        $projects = Project::with('projectCategory')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Project::class);

        $categories = ProjectCategory::all();
        $experts = Expert::all();
        return view('admin.projects.create', compact('categories', 'experts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $data = $request->validated();

        // Extract related data before creating project
        $experts = $data['experts'] ?? [];
        $expertRoles = $data['expert_roles'] ?? [];
        $images = $request->file('images', []);
        unset($data['experts'], $data['expert_roles'], $data['images']);

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects/covers', 'public');
        }

        // Generate slug from title
        $data['slug'] = Str::slug($data['title']);

        $project = Project::create($data);

        // Handle project images
        foreach ($images as $image) {
            $project->projectImages()->create([
                'image' => $image->store('projects/images', 'public'),
                'caption' => $image->getClientOriginalName(),
            ]);
        }

        // Sync experts with roles
        $expertData = [];
        foreach ($experts as $index => $expertId) {
            if (isset($expertRoles[$index])) {
                $expertData[$expertId] = ['role' => $expertRoles[$index]];
            }
        }

        if (!empty($expertData)) {
            $project->experts()->sync($expertData);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        $project->load('projectCategory', 'projectImages', 'experts');
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $categories = ProjectCategory::all();
        $experts = Expert::all();
        $projectExperts = $project->experts->pluck('id')->toArray();
        $expertRoles = [];

        foreach ($project->experts as $expert) {
            $expertRoles[$expert->id] = $expert->pivot->role;
        }

        return view('admin.projects.edit', compact('project', 'categories', 'experts', 'projectExperts', 'expertRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $data = $request->validated();

        // Extract related data before updating project
        $experts = $data['experts'] ?? [];
        $expertRoles = $data['expert_roles'] ?? [];
        $images = $request->file('images', []);
        unset($data['experts'], $data['expert_roles'], $data['images']);

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Delete old cover image if exists
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects/covers', 'public');
        }

        // Generate slug from title
        $data['slug'] = Str::slug($data['title']);

        $project->update($data);

        // Handle project images
        foreach ($images as $image) {
            $project->projectImages()->create([
                'image' => $image->store('projects/images', 'public'),
                'caption' => $image->getClientOriginalName(),
            ]);
        }

        // Sync experts with roles
        $expertData = [];
        foreach ($experts as $index => $expertId) {
            if (isset($expertRoles[$index])) {
                $expertData[$expertId] = ['role' => $expertRoles[$index]];
            }
        }

        if (!empty($expertData)) {
            $project->experts()->sync($expertData);
        } else {
            $project->experts()->detach();
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        // Delete cover image if exists
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        // Delete project images
        foreach ($project->projectImages as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    /**
     * Remove a project image.
     */
    public function destroyImage(Request $request, $projectId, $imageId)
    {
        $project = Project::findOrFail($projectId);
        $this->authorize('update', $project);

        $image = $project->projectImages()->findOrFail($imageId);

        // Delete image file
        Storage::disk('public')->delete($image->image);

        // Delete image record
        $image->delete();

        return response()->json(['success' => true]);
    }
}
