<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['projectCategory', 'projectImages', 'experts'])->orderBy('created_at', 'desc')->get();

        return view('projects', compact('projects'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['projectCategory', 'projectImages', 'experts']);

        // Get related projects (same category)
        $relatedProjects = Project::where('project_category_id', $project->project_category_id)
            ->where('id', '!=', $project->id)
            ->with(['projectCategory', 'projectImages'])
            ->limit(3)
            ->get();

        // Get site settings for phone number and other details
        $siteSetting = \App\Models\SiteSetting::first();

        return view('project-show', compact('project', 'relatedProjects', 'siteSetting'));
    }
}
