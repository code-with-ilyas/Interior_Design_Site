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
    
    public function index()
    {
        $this->authorize('viewAny', Project::class);

        $projects = Project::with('projectCategory')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

   
    public function create()
    {
        $this->authorize('create', Project::class);

        $categories = ProjectCategory::all();
        $experts = Expert::all();
        return view('admin.projects.create', compact('categories', 'experts'));
    }

    
    public function store(ProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $data = $request->validated();

        
        $experts = $data['experts'] ?? [];
        $expertRoles = $data['expert_roles'] ?? [];
        $images = $request->file('images', []);
        unset($data['experts'], $data['expert_roles'], $data['images']);

        
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects/covers', 'public');
        }

      
        $data['slug'] = Str::slug($data['title']);

        $project = Project::create($data);

      
        foreach ($images as $image) {
            $project->projectImages()->create([
                'image' => $image->store('projects/images', 'public'),
                'caption' => $image->getClientOriginalName(),
            ]);
        }

       
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

    
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        $project->load('projectCategory', 'projectImages', 'experts');
        return view('admin.projects.show', compact('project'));
    }

    
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

   
    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $data = $request->validated();

       
        $experts = $data['experts'] ?? [];
        $expertRoles = $data['expert_roles'] ?? [];
        $images = $request->file('images', []);
        unset($data['experts'], $data['expert_roles'], $data['images']);

      
        if ($request->hasFile('cover_image')) {
           
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects/covers', 'public');
        }

       
        $data['slug'] = Str::slug($data['title']);

        $project->update($data);

    
        foreach ($images as $image) {
            $project->projectImages()->create([
                'image' => $image->store('projects/images', 'public'),
                'caption' => $image->getClientOriginalName(),
            ]);
        }

        
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

  
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

       
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

      
        foreach ($project->projectImages as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    
    public function destroyImage(Request $request, $projectId, $imageId)
    {
        $project = Project::findOrFail($projectId);
        $this->authorize('update', $project);

        $image = $project->projectImages()->findOrFail($imageId);

       
        Storage::disk('public')->delete($image->image);

     
        $image->delete();

        return response()->json(['success' => true]);
    }
}
