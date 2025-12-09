<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Customer; 
use App\Models\AboutSection;
use App\Models\Service;
use App\Models\InstagramGallery;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all gallery images
        $galleries = Gallery::latest()->get();

        // Fetch all customers
        $customers = Customer::latest()->get();

        $aboutSections = AboutSection::all();

        $services = Service::all();

         $instagramImages = InstagramGallery::all();


        

         $testimonials = Testimonial::all();

        // Pass both to home view
        return view('home', compact('galleries', 'customers', 'aboutSections', 'services' ,'instagramImages' ,'testimonials'));
    }
}
