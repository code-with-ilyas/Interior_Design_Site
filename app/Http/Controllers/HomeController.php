<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\About;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\Instagram;
use App\Models\ExpertCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch experts with their categories, skills, and company logos
        $expertsByCategory = ExpertCategory::with(['experts.skills'])
            ->whereHas('experts')
            ->orderBy('name')
            ->get();


        // Fetch latest About section
        $about = About::latest()->first();


        $services = Service::all();

        $companies = \App\Models\Company::all();

        // Fetch customers
        $customers = Customer::all();

        $galleries = Gallery::latest()->get();

        $instagrams = Instagram::latest()->get();

        return view('home', compact('expertsByCategory', 'about', 'services', 'companies', 'customers', 'galleries', 'instagrams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
