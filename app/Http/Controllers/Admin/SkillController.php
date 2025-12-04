<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Skill::class);

        $skills = Skill::latest()->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Skill::class);

        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        $this->authorize('create', Skill::class);

        $skill = Skill::create($request->validated());

        return redirect()->route('admin.skills.index')->with('success', 'Skill created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        $this->authorize('view', $skill);

        $skill->load('experts');
        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        $this->authorize('update', $skill);

        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $this->authorize('update', $skill);

        $skill->update($request->validated());

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $this->authorize('delete', $skill);

        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }
}
