<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\SiteSetting;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\Instagram;
use App\Models\ExpertCategory;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Testimonial;
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


        // Fetch site settings for about section
        $siteSetting = SiteSetting::firstOrCreate([]);


        $services = Service::with('images', 'category')->get();

        $companies = \App\Models\Company::all();

        // Fetch customers
        $customers = Customer::all();

       // $galleries = Gallery::with('category')->latest()->get();

        // Only get gallery categories that have at least one gallery
        $galleryCategories = \App\Models\GalleryCategory::whereHas('galleries')
            ->with('galleries')
            ->get();

        $instagrams = Instagram::latest()->get();

        // Fetch latest published blog posts
        $blogPosts = BlogPost::with('category')
            ->where('published_at', '<=', now())
            ->orWhereNull('published_at')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Fetch project categories that have projects
        $projectCategories = ProjectCategory::whereHas('projects')
            ->withCount('projects')
            ->orderBy('name')
            ->get();

        // Fetch projects with their images and categories
        $projects = Project::with(['projectImages', 'projectCategory'])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Fetch active testimonials ordered by sort order
        $testimonials = Testimonial::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('expertsByCategory', 'siteSetting', 'services', 'companies', 'customers', 'instagrams', 'blogPosts', 'projects', 'projectCategories', 'testimonials', 'galleryCategories'));
    }

    /**
     * Display a single service
     */
    public function showService(Service $service)
    {
        // Get related services from the same category
        $relatedServices = Service::where('service_category_id', $service->service_category_id)
            ->where('id', '!=', $service->id)
            ->orderBy('updated_at', 'desc')
            ->limit(3)
            ->get();

        // Load service images
        $service->load('images', 'category');

        return view('service-show', compact('service', 'relatedServices'));
    }

    /**
     * Display services by category
     */
    public function servicesByCategory(\App\Models\ServiceCategory $category)
    {
        $services = Service::with('category')
            ->where('service_category_id', $category->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('services-by-category', compact('category', 'services'));
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
