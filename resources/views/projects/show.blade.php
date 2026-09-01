<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - ZACNUS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        accent: {
                            DEFAULT: '#E61C1C',
                            hover: '#C81313',
                            light: '#FFF0EB',
                        },
                        dark: {
                            bg: '#0D0F12',
                            card: '#16191E',
                            border: '#242830',
                            hero: '#121419',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark-bg text-gray-300 font-sans antialiased selection:bg-accent selection:text-white">

    <!-- HEADER / NAVBAR -->
    <header class="fixed top-0 left-0 w-full z-50 bg-dark-bg/80 backdrop-blur-md border-b border-dark-border/50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="h-9 w-9 bg-accent rounded-lg flex items-center justify-center p-1.5 shadow-md shadow-accent/20 group-hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('image/logo-mark.png') }}" alt="ZACNUS Mark" class="w-full h-full object-contain">
                </div>
                <span class="text-xl font-extrabold tracking-wider text-white uppercase group-hover:text-accent transition-colors duration-300">
                    ZACNUS
                </span>
            </a>

            <a href="{{ url('/') }}#portfolio" class="text-xs font-bold text-gray-400 hover:text-white flex items-center gap-2 transition">
                <i class="fa-solid fa-arrow-left text-accent"></i> Back to Projects
            </a>
        </div>
    </header>

    <!-- PROJECT HERO -->
    <section class="pt-36 pb-12 bg-dark-hero/40 border-b border-dark-border">
        <div class="max-w-7xl mx-auto px-6">
            <span class="text-xs font-bold uppercase tracking-widest text-accent bg-accent/10 px-3 py-1 rounded">
                {{ $project->category ?? 'Web Application' }}
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 leading-tight">
                {{ $project->title }}
            </h1>
            <p class="text-gray-400 text-sm sm:text-base mt-3 max-w-2xl">
                A high-performance digital solution crafted with cutting-edge technologies to drive business growth and user engagement.
            </p>
        </div>
    </section>

    <!-- MAIN CONTENT GRID -->
    <section class="py-16 max-w-7xl mx-auto px-6 grid lg:grid-cols-12 gap-12">
        <!-- Left Side: Main Image & Description -->
        <div class="lg:col-span-8 space-y-8">
            <!-- Project Main Banner Image -->
            <div class="rounded-2xl overflow-hidden border border-dark-border bg-dark-card shadow-2xl">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200" alt="{{ $project->title }}" class="w-full h-[400px] object-cover">
            </div>

            <!-- Overview -->
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8 space-y-4">
                <h2 class="text-xl font-bold text-white">Project Overview</h2>
                <p class="text-xs sm:text-sm text-gray-400 leading-relaxed">
                    {{ $project->description ?? 'This project was developed for client requirements focusing on scalability, clean UI/UX architecture, and seamless database integration. Built from the ground up, it handles complex workflows efficiently while delivering a fast visual experience.' }}
                </p>
            </div>

            <!-- Key Features -->
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8 space-y-4">
                <h2 class="text-xl font-bold text-white">Key Features Built</h2>
                <ul class="grid sm:grid-cols-2 gap-4 text-xs text-gray-300">
                    <li class="flex items-center gap-3 bg-dark-bg p-3 rounded-xl border border-dark-border">
                        <i class="fa-solid fa-bolt text-accent"></i> High Performance & Speed
                    </li>
                    <li class="flex items-center gap-3 bg-dark-bg p-3 rounded-xl border border-dark-border">
                        <i class="fa-solid fa-shield-halved text-accent"></i> Secure Database Architecture
                    </li>
                    <li class="flex items-center gap-3 bg-dark-bg p-3 rounded-xl border border-dark-border">
                        <i class="fa-solid fa-mobile-screen text-accent"></i> Fully Responsive Design
                    </li>
                    <li class="flex items-center gap-3 bg-dark-bg p-3 rounded-xl border border-dark-border">
                        <i class="fa-solid fa-sliders text-accent"></i> Dynamic Admin Dashboard Controls
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Side: Sidebar Meta Details -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-dark-card border border-dark-border rounded-2xl p-6 space-y-6">
                <h3 class="text-base font-bold text-white border-b border-dark-border pb-4">Project Information</h3>
                
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block">Client</span>
                    <p class="text-sm font-semibold text-white mt-1">Global Tech Solutions</p>
                </div>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block">Category</span>
                    <p class="text-sm font-semibold text-white mt-1">{{ $project->category ?? 'Software / Web' }}</p>
                </div>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block">Timeline</span>
                    <p class="text-sm font-semibold text-white mt-1">3 Weeks</p>
                </div>

                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block mb-2">Tech Stack Used</span>
                    <div class="flex flex-wrap gap-2">
                        <span class="text-[11px] bg-dark-bg border border-dark-border text-gray-300 font-semibold px-2.5 py-1 rounded-md">Laravel</span>
                        <span class="text-[11px] bg-dark-bg border border-dark-border text-gray-300 font-semibold px-2.5 py-1 rounded-md">Tailwind CSS</span>
                        <span class="text-[11px] bg-dark-bg border border-dark-border text-gray-300 font-semibold px-2.5 py-1 rounded-md">MySQL</span>
                        <span class="text-[11px] bg-dark-bg border border-dark-border text-gray-300 font-semibold px-2.5 py-1 rounded-md">JavaScript</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-dark-border">
                    <a href="#" class="w-full bg-accent hover:bg-accent-hover text-white text-xs font-bold py-3.5 rounded-xl transition flex items-center justify-center gap-2 shadow-lg shadow-accent/20">
                        Visit Live Demo <i class="fa-solid fa-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark-hero border-t border-dark-border mt-20 pt-12 pb-8 text-xs text-gray-400">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-gray-500">
            <p>© 2026 ZACNUS. All rights reserved.</p>
            <a href="{{ url('/') }}" class="hover:text-white">Home</a>
        </div>
    </footer>

</body>
</html>