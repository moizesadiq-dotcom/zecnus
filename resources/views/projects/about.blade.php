<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ZACNUS</title>
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

            <a href="{{ url('/') }}" class="text-xs font-bold text-gray-400 hover:text-white flex items-center gap-2 transition">
                <i class="fa-solid fa-house text-accent"></i> Back to Home
            </a>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="pt-36 pb-12 bg-dark-hero/40 border-b border-dark-border text-center">
        <div class="max-w-4xl mx-auto px-6">
            <span class="text-xs font-bold uppercase tracking-widest text-accent bg-accent/10 px-3 py-1 rounded">
                Who We Are
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 leading-tight">
                Architects of Digital <span class="text-accent">Innovation</span>
            </h1>
            <p class="text-gray-400 text-xs sm:text-sm mt-3 max-w-2xl mx-auto">
                We are a premier software development studio dedicated to crafting robust web applications, scalable enterprise systems, and seamless user experiences.
            </p>
        </div>
    </section>

    <!-- MISSION & VISION GRID -->
    <section class="py-16 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
        <div class="bg-dark-card border border-dark-border rounded-2xl p-8 space-y-4">
            <div class="h-10 w-10 bg-dark-bg border border-dark-border text-accent rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-bullseye text-base"></i>
            </div>
            <h2 class="text-xl font-bold text-white">Our Mission</h2>
            <p class="text-xs sm:text-sm text-gray-400 leading-relaxed">
                To empower businesses globally by delivering custom, high-grade software solutions that streamline operations, scale smoothly, and deliver measurable growth.
            </p>
        </div>

        <div class="bg-dark-card border border-dark-border rounded-2xl p-8 space-y-4">
            <div class="h-10 w-10 bg-dark-bg border border-dark-border text-accent rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-eye text-base"></i>
            </div>
            <h2 class="text-xl font-bold text-white">Our Vision</h2>
            <p class="text-xs sm:text-sm text-gray-400 leading-relaxed">
                To be a trusted technological powerhouse known for clean code, cutting-edge architecture, and long-term commitment to client success.
            </p>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="py-12 bg-dark-hero/50 border-y border-dark-border">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <h3 class="text-3xl font-extrabold text-white">50+</h3>
                <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-semibold">Projects Delivered</p>
            </div>
            <div>
                <h3 class="text-3xl font-extrabold text-white">99%</h3>
                <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-semibold">Client Satisfaction</p>
            </div>
            <div>
                <h3 class="text-3xl font-extrabold text-white">24/7</h3>
                <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-semibold">Technical Support</p>
            </div>
            <div>
                <h3 class="text-3xl font-extrabold text-white">5+</h3>
                <p class="text-xs text-gray-400 mt-1 uppercase tracking-wider font-semibold">Years Experience</p>
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