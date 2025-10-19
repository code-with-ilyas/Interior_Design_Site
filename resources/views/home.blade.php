@extends('layouts.master')

@section('title', 'Home - Little Crème Designs')

@section('content')


<section class="relative flex items-center justify-center min-h-screen bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80');">
    <div class="bg-[#3b2f2f]/60 absolute inset-0"></div>
    <div class="relative text-center text-white z-10 px-6">
        <h1 class="text-4xl md:text-6xl font-light mb-4 tracking-tight">
            Crafting Spaces that Reflect Your Soul
        </h1>
        <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
            We design interiors rooted in emotion, natural light, and timeless materials — inspired by the French art of understated elegance.
        </p>
        <a href="#projects"
            class="mt-8 inline-block bg-[#d8c4b6] text-black px-6 py-3 rounded-full font-medium hover:bg-[#cbb8a4] transition">
            Explore Our Work
        </a>
    </div>
</section>


<section id="about" class="py-24 bg-[#f5f2ef]">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-semibold text-[#3b2f2f] mb-6">About Us</h2>
        <p class="text-[#5a4a3b] max-w-3xl mx-auto leading-relaxed text-lg">
            At <strong>Little Crème Designs</strong>, we believe that every home should tell a story — one of balance, warmth, and subtle sophistication.
            Inspired by <em>Little Worker’s human-centered design</em> and the premium simplicity of La Crème, we create interiors that feel alive, meaningful, and beautifully quiet.
        </p>
    </div>
</section>


<section id="projects" class="py-24 bg-white">
    <div class="container mx-auto px-6 md:px-12">
        <h2 class="text-3xl font-semibold text-center text-[#3b2f2f] mb-12">Featured Projects</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="group relative overflow-hidden rounded-2xl shadow-md">
                <img src="https://images.unsplash.com/photo-1615874959474-d609969a20ed?auto=format&fit=crop&w=800&q=80

"
                    alt="Modern Living Room"
                    class="w-full h-72 object-cover transform group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-[#3b2f2f]/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <span class="text-white font-medium text-lg">Modern Living Room</span>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl shadow-md">
                <img src="https://images.unsplash.com/photo-1618220179428-22790b461013?auto=format&fit=crop&w=800&q=80
"
                    alt="Elegant Workspace"
                    class="w-full h-72 object-cover transform group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-[#3b2f2f]/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <span class="text-white font-medium text-lg">Elegant Workspace</span>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl shadow-md">
                <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=800&q=80"
                    alt="Luxury Bedroom"
                    class="w-full h-72 object-cover transform group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-[#3b2f2f]/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <span class="text-white font-medium text-lg">Luxury Bedroom</span>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="services" class="py-24 bg-[#f5f2ef]">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-semibold text-[#3b2f2f] mb-12">Our Expertise</h2>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="p-10 bg-white rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3 text-[#3b2f2f]">Interior Architecture</h3>
                <p class="text-[#5a4a3b]">
                    Harmonizing function and emotion, we shape interiors that embody natural balance and everyday comfort.
                </p>
            </div>

            <div class="p-10 bg-white rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3 text-[#3b2f2f]">Bespoke Renovations</h3>
                <p class="text-[#5a4a3b]">
                    We reinterpret existing spaces with refined materials and timeless color stories.
                </p>
            </div>

            <div class="p-10 bg-white rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3 text-[#3b2f2f]">Custom Furnishings</h3>
                <p class="text-[#5a4a3b]">
                    Thoughtfully crafted furniture that brings soul and harmony to your interior.
                </p>
            </div>
        </div>
    </div>
</section>


<section id="contact" class="py-24 bg-white">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-3xl font-semibold text-[#3b2f2f] mb-8">Let’s Create Together</h2>

        <p class="text-[#5a4a3b] max-w-2xl mx-auto mb-12 leading-relaxed">
            Have an idea or a space you wish to transform?
            Let us design a place that feels like home — warm, grounded, and beautifully yours.
        </p>

        <form action="#" method="POST" class="max-w-xl mx-auto space-y-4">
            <input type="text" placeholder="Your Name" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3b2f2f]">
            <input type="email" placeholder="Your Email" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3b2f2f]">
            <textarea rows="5" placeholder="Your Message" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3b2f2f]"></textarea>
            <button type="submit" class="bg-[#3b2f2f] text-white px-6 py-3 rounded-full font-medium hover:bg-[#2e2424] transition">
                Send Message
            </button>
        </form>
    </div>
</section>

@endsection