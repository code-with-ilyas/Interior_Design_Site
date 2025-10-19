<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Crème Designs</title>


    <script src="https://cdn.tailwindcss.com"></script>


    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            scrollbar-width: none;

            -ms-overflow-style: none;

        }


        body::-webkit-scrollbar {
            width: 0px;
            background: transparent;

        }



        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f7f5;
            color: #3b2f2f;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Playfair Display', serif;
        }


        html {
            scroll-behavior: smooth;
        }


        .nav-blur {
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.8);
        }


        footer {
            background-color: #3b2f2f;
            color: #f5f2ef;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">


    <header class="fixed w-full top-0 z-50 nav-blur shadow-sm">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <a href="/" class="text-2xl font-semibold tracking-tight text-[#3b2f2f] hover:text-[#5a4a3b] transition">
                Little Crème
            </a>

            <nav class="hidden md:flex space-x-8 text-[#3b2f2f]">
                <a href="#about" class="hover:text-[#b69c84] transition">About</a>
                <a href="#projects" class="hover:text-[#b69c84] transition">Projects</a>
                <a href="#services" class="hover:text-[#b69c84] transition">Services</a>
                <a href="#contact" class="hover:text-[#b69c84] transition">Contact</a>
            </nav>

            <button id="menuBtn" class="md:hidden text-[#3b2f2f] focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu" class="hidden md:hidden bg-[#f8f7f5] border-t border-gray-200">
            <a href="#about" class="block px-6 py-3 text-[#3b2f2f] hover:bg-[#eae6e3]">About</a>
            <a href="#projects" class="block px-6 py-3 text-[#3b2f2f] hover:bg-[#eae6e3]">Projects</a>
            <a href="#services" class="block px-6 py-3 text-[#3b2f2f] hover:bg-[#eae6e3]">Services</a>
            <a href="#contact" class="block px-6 py-3 text-[#3b2f2f] hover:bg-[#eae6e3]">Contact</a>
        </div>
    </header>


    <main class="flex-1 pt-20">
        @yield('content')
    </main>


    <footer class="py-12 mt-16">
        <div class="container mx-auto text-center px-6">
            <h3 class="text-2xl font-semibold mb-2">Little Crème Designs</h3>
            <p class="text-[#d8c4b6] mb-6">
                Thoughtful interiors, crafted with light, texture, and timeless harmony.
            </p>

            <div class="flex justify-center space-x-6 mb-6">
                <a href="#" class="hover:text-[#d8c4b6] transition">Instagram</a>
                <a href="#" class="hover:text-[#d8c4b6] transition">Pinterest</a>
                <a href="#" class="hover:text-[#d8c4b6] transition">LinkedIn</a>
            </div>

            <p class="text-sm text-[#bda89a]">
                © 2025 Little Crème Designs. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>