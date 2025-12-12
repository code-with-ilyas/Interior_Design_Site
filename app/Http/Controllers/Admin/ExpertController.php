<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpertRequest;
use App\Models\Expert;
use App\Models\ExpertCategory;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller
{
    
    public function index()
    {
        $this->authorize('viewAny', Expert::class);

        $experts = Expert::with(['skills', 'category'])->latest()->paginate(10);
        return view('admin.experts.index', compact('experts'));
    }

    
    public function create()
    {
        $this->authorize('create', Expert::class);

        $skills = Skill::all();
        $categories = ExpertCategory::all();
        return view('admin.experts.create', compact('skills', 'categories'));
    }

   
    public function store(ExpertRequest $request)
    {
        $this->authorize('create', Expert::class);

        $data = $request->validated();

        
        $skills = $data['skills'] ?? [];
        unset($data['skills']);

        // Handle category_id if it's an array
        if (isset($data['category_id']) && is_array($data['category_id'])) {
            $data['category_id'] = $data['category_id'][0] ?? null;
        }

        // Handle image upload
       
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('experts', 'public');
        }

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            $data['company_logo'] = $request->file('company_logo')->store('experts/company_logos', 'public');
        }

        $expert = Expert::create($data);

        
        if (!empty($skills)) {
            $expert->skills()->sync($skills);
        }

        return redirect()->route('admin.experts.index')->with('success', 'Expert created successfully.');
    }

   
    public function show(Expert $expert)
    {
        $this->authorize('view', $expert);

        $expert->load(['skills', 'projects', 'category']);
        return view('admin.experts.show', compact('expert'));
    }

   
    public function edit(Expert $expert)
    {
        $this->authorize('update', $expert);

        $skills = Skill::all();
        $categories = ExpertCategory::all();
        $expertSkills = $expert->skills->pluck('id')->toArray();

        return view('admin.experts.edit', compact('expert', 'skills', 'categories', 'expertSkills'));
    }

   
    public function update(ExpertRequest $request, Expert $expert)
    {
        $this->authorize('update', $expert);

        $data = $request->validated();

       
        $skills = $data['skills'] ?? [];
        unset($data['skills']);

        // Handle category_id if it's an array
        if (isset($data['category_id']) && is_array($data['category_id'])) {
            $data['category_id'] = $data['category_id'][0] ?? null;
        }

        // Handle image upload
       
        if ($request->hasFile('image')) {
            
            if ($expert->image) {
                Storage::disk('public')->delete($expert->image);
            }
            $data['image'] = $request->file('image')->store('experts', 'public');
        }

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            // Delete old company logo if exists
            if ($expert->company_logo) {
                Storage::disk('public')->delete($expert->company_logo);
            }
            $data['company_logo'] = $request->file('company_logo')->store('experts/company_logos', 'public');
        }

        $expert->update($data);

       
        if (!empty($skills)) {
            $expert->skills()->sync($skills);
        } else {
            $expert->skills()->detach();
        }

        return redirect()->route('admin.experts.index')->with('success', 'Expert updated successfully.');
    }

    
    public function destroy(Expert $expert)
    {
        $this->authorize('delete', $expert);

        
        if ($expert->image) {
            Storage::disk('public')->delete($expert->image);
        }

        $expert->delete();

        return redirect()->route('admin.experts.index')->with('success', 'Expert deleted successfully.');
    }
}
