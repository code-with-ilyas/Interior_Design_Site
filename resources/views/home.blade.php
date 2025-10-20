@extends('layouts.master')
@section('title', 'Home - Little Crème Designs')

@section('content')
<!-- Hero Section -->
<section class="relative flex items-center justify-center min-h-screen bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80');">
    <div class="bg-[#3b2f2f]/60 absolute inset-0"></div>
    <div class="relative text-center text-white z-10 px-6 scroll-animate">
        <h1 class="text-4xl md:text-6xl font-light mb-4 tracking-tight">Crafting Spaces that Reflect Your Soul</h1>
        <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
            We design interiors rooted in emotion, natural light, and timeless materials — inspired by the French art of understated elegance.
        </p>
        <a href="#projects" class="mt-8 inline-block bg-[#d8c4b6] text-black px-6 py-3 rounded-full font-medium hover:bg-[#cbb8a4] transition">Explore Our Work</a>
    </div>
</section>

<!-- About -->
<section id="about" class="py-24 bg-[#f5f2ef] scroll-animate">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-semibold text-[#3b2f2f] mb-6">About Us</h2>
        <p class="text-[#5a4a3b] max-w-3xl mx-auto leading-relaxed text-lg">
            At <strong>Little Crème Designs</strong>, we believe that every home should tell a story — one of balance, warmth, and subtle sophistication.
            Inspired by <em>Little Worker’s human-centered design</em> and the premium simplicity of La Crème, we create interiors that feel alive,
            meaningful, and beautifully quiet.
        </p>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="py-24 bg-white scroll-animate">
    <div class="container mx-auto px-6 md:px-12">
        <h2 class="text-3xl font-semibold text-center text-[#3b2f2f] mb-12">Featured Projects</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ([
                ['url' => 'https://images.unsplash.com/photo-1615874959474-d609969a20ed?auto=format&fit=crop&w=800&q=80', 'title' => 'Modern Living Room'],
                ['url' => 'https://images.unsplash.com/photo-1618220179428-22790b461013?auto=format&fit=crop&w=800&q=80', 'title' => 'Elegant Workspace'],
                ['url' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=800&q=80', 'title' => 'Luxury Bedroom'],
            ] as $project)
            <div class="group relative overflow-hidden rounded-2xl shadow-md">
                <img src="{{ $project['url'] }}" alt="{{ $project['title'] }}" class="w-full h-72 object-cover transform group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-[#3b2f2f]/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <span class="text-white font-medium text-lg">{{ $project['title'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-[#f8f7f5] scroll-animate">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-semibold text-[#3b2f2f] mb-8">What Clients Say</h2>
        <p class="text-[#5a4a3b] max-w-2xl mx-auto italic leading-relaxed">
            “Working with Little Crème was a dream. They understood our lifestyle and crafted spaces that truly reflect who we are.”
        </p>
        <span class="block mt-4 text-[#b69c84] font-semibold">— Sophia L., Paris</span>
    </div>
</section>

<!-- Services -->
<section id="services" class="py-24 bg-[#f5f2ef] scroll-animate">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-semibold text-[#3b2f2f] mb-12">Our Expertise</h2>
        <div class="grid md:grid-cols-3 gap-10">
            @foreach ([
                ['title' => 'Interior Architecture', 'desc' => 'Harmonizing function and emotion, we shape interiors that embody natural balance and everyday comfort.'],
                ['title' => 'Bespoke Renovations', 'desc' => 'We reinterpret existing spaces with refined materials and timeless color stories.'],
                ['title' => 'Custom Furnishings', 'desc' => 'Thoughtfully crafted furniture that brings soul and harmony to your interior.'],
            ] as $service)
            <div class="p-10 bg-white rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3 text-[#3b2f2f]">{{ $service['title'] }}</h3>
                <p class="text-[#5a4a3b]">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-24 bg-white scroll-animate">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-semibold text-[#3b2f2f] mb-8">Let’s Create Together</h2>
        <p class="text-[#5a4a3b] max-w-2xl mx-auto mb-12 leading-relaxed">
            Have an idea or a space you wish to transform? Let us design a place that feels like home — warm, grounded, and beautifully yours.
        </p>

        <form action="#" method="POST" class="max-w-xl mx-auto space-y-4">
            <input type="text" placeholder="Your Name" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3b2f2f]">
            <input type="email" placeholder="Your Email" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3b2f2f]">
            <textarea rows="5" placeholder="Your Message" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3b2f2f]"></textarea>
            <button type="submit" class="bg-[#3b2f2f] text-white px-6 py-3 rounded-full font-medium hover:bg-[#2e2424] transition">Send Message</button>
        </form>
    </div>
</section>
@endsection
