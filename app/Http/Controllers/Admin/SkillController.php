<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
   
    public function index()
    {
        $this->authorize('viewAny', Skill::class);

        $skills = Skill::latest()->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        $this->authorize('create', Skill::class);

        return view('admin.skills.create');
    }

    public function store(SkillRequest $request)
    {
        $this->authorize('create', Skill::class);

        $skill = Skill::create($request->validated());

        return redirect()->route('admin.skills.index')->with('success', 'Skill created successfully.');
    }

    public function show(Skill $skill)
    {
        $this->authorize('view', $skill);

        $skill->load('experts');
        return view('admin.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        $this->authorize('update', $skill);

        return view('admin.skills.edit', compact('skill'));
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $this->authorize('update', $skill);

        $skill->update($request->validated());

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }

    
    public function destroy(Skill $skill)
    {
        $this->authorize('delete', $skill);

        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }
}
