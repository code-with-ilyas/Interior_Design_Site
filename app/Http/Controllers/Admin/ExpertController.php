<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpertRequest;
use App\Models\Expert;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Expert::class);

        $experts = Expert::with('skills')->latest()->paginate(10);
        return view('admin.experts.index', compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Expert::class);

        $skills = Skill::all();
        return view('admin.experts.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpertRequest $request)
    {
        $this->authorize('create', Expert::class);

        $data = $request->validated();

        // Extract skills before creating expert
        $skills = $data['skills'] ?? [];
        unset($data['skills']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('experts', 'public');
        }

        $expert = Expert::create($data);

        // Sync skills
        if (!empty($skills)) {
            $expert->skills()->sync($skills);
        }

        return redirect()->route('admin.experts.index')->with('success', 'Expert created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expert $expert)
    {
        $this->authorize('view', $expert);

        $expert->load('skills', 'projects');
        return view('admin.experts.show', compact('expert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expert $expert)
    {
        $this->authorize('update', $expert);

        $skills = Skill::all();
        $expertSkills = $expert->skills->pluck('id')->toArray();

        return view('admin.experts.edit', compact('expert', 'skills', 'expertSkills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpertRequest $request, Expert $expert)
    {
        $this->authorize('update', $expert);

        $data = $request->validated();

        // Extract skills before updating expert
        $skills = $data['skills'] ?? [];
        unset($data['skills']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($expert->image) {
                Storage::disk('public')->delete($expert->image);
            }
            $data['image'] = $request->file('image')->store('experts', 'public');
        }

        $expert->update($data);

        // Sync skills
        if (!empty($skills)) {
            $expert->skills()->sync($skills);
        } else {
            $expert->skills()->detach();
        }

        return redirect()->route('admin.experts.index')->with('success', 'Expert updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expert $expert)
    {
        $this->authorize('delete', $expert);

        // Delete image if exists
        if ($expert->image) {
            Storage::disk('public')->delete($expert->image);
        }

        $expert->delete();

        return redirect()->route('admin.experts.index')->with('success', 'Expert deleted successfully.');
    }
}
