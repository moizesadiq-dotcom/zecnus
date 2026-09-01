<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ZACNUS - Innovate Your Digital Frontier</title>

    <!-- Prevent theme flash -->
    <script>
        (function () {
            const savedTheme = localStorage.getItem('zacnus-theme');

            if (savedTheme === 'light') {
                document.documentElement.classList.add('light');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',

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
                        },

                        light: {
                            bg: '#F7F8FA',
                            card: '#FFFFFF',
                            border: '#E5E7EB',
                            hero: '#EEF1F5',
                        }

                    }
                }
            }
        }
    </script>

    <style>

        /* =========================================================
           GLOBAL
        ========================================================= */

        html {
            scroll-behavior: smooth;
        }

        body {
            transition:
                background-color 0.35s ease,
                color 0.35s ease;
        }

        * {
            box-sizing: border-box;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }


        /* =========================================================
           DARK MODE
        ========================================================= */

        html.dark body {
            background: #0D0F12;
            color: #D1D5DB;
        }


        /* =========================================================
           LIGHT MODE
        ========================================================= */

        html.light body {
            background: #F7F8FA;
            color: #374151;
        }

        html.light .theme-bg {
            background-color: #F7F8FA !important;
        }

        html.light .theme-card {
            background-color: #FFFFFF !important;
            border-color: #E5E7EB !important;
        }

        html.light .theme-border {
            border-color: #E5E7EB !important;
        }

        html.light .theme-heading {
            color: #111827 !important;
        }

        html.light .theme-text {
            color: #374151 !important;
        }

        html.light .theme-muted {
            color: #6B7280 !important;
        }


        /* =========================================================
           HERO
        ========================================================= */

        .hero-overlay {
            background:
                linear-gradient(
                    180deg,
                    rgba(13,15,18,0.96) 0%,
                    rgba(13,15,18,0.80) 50%,
                    rgba(13,15,18,0.96) 100%
                );
        }

        html.light .hero-overlay {
            background:
                linear-gradient(
                    180deg,
                    rgba(247,248,250,0.94) 0%,
                    rgba(247,248,250,0.82) 50%,
                    rgba(247,248,250,0.96) 100%
                );
        }

        @media (min-width: 1024px) {

            .hero-overlay {
                background:
                    linear-gradient(
                        90deg,
                        rgba(13,15,18,0.97) 0%,
                        rgba(13,15,18,0.82) 50%,
                        rgba(13,15,18,0.35) 100%
                    );
            }

            html.light .hero-overlay {
                background:
                    linear-gradient(
                        90deg,
                        rgba(247,248,250,0.97) 0%,
                        rgba(247,248,250,0.84) 50%,
                        rgba(247,248,250,0.40) 100%
                    );
            }

        }


        /* =========================================================
           ANIMATIONS
        ========================================================= */

        .animate-fade-up {
            opacity: 0;
            transform: translateY(35px);
            animation: fadeUp 0.9s ease forwards;
        }

        .animate-fade-right {
            opacity: 0;
            transform: translateX(-40px);
            animation: fadeRight 0.9s ease forwards;
        }

        .animate-fade-left {
            opacity: 0;
            transform: translateX(40px);
            animation: fadeLeft 0.9s ease forwards;
        }

        .animate-scale {
            opacity: 0;
            transform: scale(0.92);
            animation: scaleIn 0.8s ease forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }

        .delay-600 {
            animation-delay: 0.6s;
        }

        @keyframes fadeUp {

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        @keyframes fadeRight {

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        @keyframes fadeLeft {

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        @keyframes scaleIn {

            to {
                opacity: 1;
                transform: scale(1);
            }

        }


        /* =========================================================
           FLOATING ANIMATION
        ========================================================= */

        .floating {
            animation: floating 4s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

        }


        /* =========================================================
           THEME BUTTON
        ========================================================= */

        #theme-toggle {
            position: relative;
            overflow: hidden;
        }

        #theme-toggle i {
            transition:
                transform 0.35s ease,
                opacity 0.25s ease;
        }

        #theme-toggle:hover i {
            transform: rotate(20deg) scale(1.1);
        }


        /* =========================================================
           MOBILE NAV
        ========================================================= */

        #mobile-menu {
            transition:
                opacity 0.3s ease,
                transform 0.3s ease;
        }

    </style>

</head>


<body class="font-sans antialiased overflow-x-hidden">


<!-- =========================================================
     HEADER
========================================================= -->

<header
    class="fixed top-0 left-0 w-full z-50
           bg-white/90 dark:bg-[#0D0F12]/90
           backdrop-blur-xl
           border-b border-gray-200 dark:border-[#242830]
           transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="h-20 flex items-center justify-between">

            <!-- LOGO -->

            <a href="#home"
               class="flex items-center gap-3 group">

                <div
                    class="h-10 w-10
                           bg-accent
                           rounded-xl
                           flex items-center justify-center
                           shadow-lg shadow-red-500/20
                           group-hover:scale-105
                           transition duration-300">

                    <span class="text-white font-black text-lg">
                        Z
                    </span>

                </div>

                <span
                    class="text-lg sm:text-xl
                           font-extrabold
                           tracking-wider
                           text-gray-900 dark:text-white
                           uppercase
                           group-hover:text-accent
                           transition">

                    ZACNUS

                </span>

            </a>


            <!-- DESKTOP NAV -->

            <nav
                class="hidden md:flex
                       items-center
                       gap-8
                       text-sm
                       font-semibold
                       text-gray-600 dark:text-gray-400">

                <a href="#home"
                   class="text-accent hover:text-accent-hover transition">
                    Home
                </a>

                <a href="#solutions"
                   class="hover:text-accent transition">
                    Solutions
                </a>

                <a href="#portfolio"
                   class="hover:text-accent transition">
                    Projects
                </a>

                <a href="#about"
                   class="hover:text-accent transition">
                    About
                </a>

                <a href="#testimonials"
                   class="hover:text-accent transition">
                    Clients
                </a>

                <a href="#contact"
                   class="hover:text-accent transition">
                    Contact
                </a>

            </nav>


            <!-- RIGHT SIDE -->

            <div class="flex items-center gap-3">


                <!-- THEME TOGGLE -->

                <button
                    id="theme-toggle"
                    type="button"
                    aria-label="Toggle theme"

                    class="w-11 h-11
                           rounded-full
                           border
                           border-gray-200 dark:border-gray-700
                           bg-white dark:bg-gray-800
                           flex items-center justify-center
                           text-gray-700 dark:text-gray-200
                           hover:text-accent
                           hover:border-accent
                           hover:shadow-lg
                           hover:shadow-red-500/10
                           transition-all duration-300">

                    <i
                        id="theme-icon"
                        class="fa-solid fa-moon text-sm">
                    </i>

                </button>


                <!-- CLIENT PORTAL -->

                <a
                    href="{{ route('client.dashboard') }}"

                    class="hidden sm:inline-flex
                           items-center
                           gap-2
                           bg-accent
                           hover:bg-accent-hover
                           text-white
                           text-sm
                           font-semibold
                           px-5
                           py-2.5
                           rounded-full
                           transition
                           shadow-lg
                           shadow-red-500/20">

                    Client Portal

                    <i class="fa-solid fa-arrow-right text-xs"></i>

                </a>


                <!-- MOBILE MENU BUTTON -->

                <button
                    id="mobile-menu-btn"
                    type="button"

                    class="md:hidden
                           w-11 h-11
                           rounded-full
                           border
                           border-gray-200 dark:border-gray-700
                           bg-white dark:bg-gray-800
                           text-gray-700 dark:text-gray-200
                           flex items-center justify-center">

                    <i class="fa-solid fa-bars"></i>

                </button>

            </div>

        </div>


        <!-- MOBILE NAV -->

        <div
            id="mobile-menu"
            class="hidden md:hidden
                   pb-5">

            <div
                class="bg-white dark:bg-[#16191E]
                       border
                       border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       p-4
                       shadow-xl">

                <div class="flex flex-col gap-2">

                    <a href="#home"
                       class="px-4 py-3 rounded-xl hover:bg-red-50 dark:hover:bg-red-500/10 hover:text-accent">
                        Home
                    </a>

                    <a href="#solutions"
                       class="px-4 py-3 rounded-xl hover:bg-red-50 dark:hover:bg-red-500/10 hover:text-accent">
                        Solutions
                    </a>

                    <a href="#portfolio"
                       class="px-4 py-3 rounded-xl hover:bg-red-50 dark:hover:bg-red-500/10 hover:text-accent">
                        Projects
                    </a>

                    <a href="#about"
                       class="px-4 py-3 rounded-xl hover:bg-red-50 dark:hover:bg-red-500/10 hover:text-accent">
                        About
                    </a>

                    <a href="#contact"
                       class="px-4 py-3 rounded-xl hover:bg-red-50 dark:hover:bg-red-500/10 hover:text-accent">
                        Contact
                    </a>

                    <a href="{{ route('client.dashboard') }}"
                       class="mt-2 bg-accent text-white text-center px-4 py-3 rounded-xl font-semibold">

                        Client Portal

                    </a>

                </div>

            </div>

        </div>

    </div>

</header>


<!-- =========================================================
     HERO
========================================================= -->

<section
    id="home"

    class="relative
           pt-32
           pb-20
           min-h-screen
           flex items-center
           bg-cover
           bg-center
           transition-colors duration-500"

    style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1600');">


    <div class="absolute inset-0 hero-overlay"></div>


    <div
        class="relative
               max-w-7xl
               mx-auto
               px-4 sm:px-6
               w-full">

        <div
            class="grid
                   lg:grid-cols-12
                   gap-12
                   items-center">


            <!-- HERO CONTENT -->

            <div
                class="lg:col-span-7
                       text-center
                       lg:text-left">


                <div
                    class="inline-flex
                           items-center
                           gap-2
                           border
                           border-red-500/40
                           bg-red-500/10
                           px-4
                           py-2
                           rounded-full
                           text-accent
                           text-xs
                           font-bold
                           tracking-widest
                           uppercase
                           animate-fade-up">

                    <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>

                    INNOVATE • BUILD • GROW

                </div>


                <h1
                    class="mt-6
                           text-4xl
                           sm:text-5xl
                           lg:text-6xl
                           font-extrabold
                           leading-tight
                           animate-fade-right
                           delay-200">

                    <span class="text-gray-900 dark:text-white">
                        ZACNUS –
                    </span>

                    <br>

                    <span class="text-accent">
                        Innovate Your
                    </span>

                    <br>

                    <span class="text-gray-900 dark:text-white">
                        Digital Frontier
                    </span>

                </h1>


                <p
                    class="mt-6
                           text-sm
                           sm:text-base
                           lg:text-lg
                           text-gray-700 dark:text-gray-300
                           max-w-xl
                           mx-auto
                           lg:mx-0
                           leading-relaxed
                           font-medium
                           animate-fade-up
                           delay-300">

                    We craft intelligent digital solutions that empower
                    businesses to grow, adapt, and lead in the modern world.

                </p>


                <!-- BUTTONS -->

                <div
                    class="flex
                           flex-wrap
                           justify-center
                           lg:justify-start
                           gap-4
                           mt-8
                           animate-fade-up
                           delay-400">

                    <a
                        href="#solutions"

                        class="bg-accent
                               hover:bg-accent-hover
                               text-white
                               text-sm
                               font-semibold
                               px-7
                               py-3.5
                               rounded-full
                               transition
                               flex items-center
                               gap-2
                               shadow-xl
                               shadow-red-500/25
                               hover:-translate-y-1">

                        Explore Solutions

                        <i class="fa-solid fa-arrow-right text-xs"></i>

                    </a>


                    <a
                        href="#portfolio"

                        class="border
                               border-gray-300 dark:border-gray-700
                               bg-white/80 dark:bg-[#16191E]/70
                               backdrop-blur-md
                               text-gray-900 dark:text-white
                               text-sm
                               font-semibold
                               px-7
                               py-3.5
                               rounded-full
                               transition
                               flex items-center
                               gap-2
                               hover:-translate-y-1
                               hover:border-accent">

                        <i class="fa-solid fa-play text-xs text-accent"></i>

                        View Projects

                    </a>

                </div>


                <!-- HERO STATS -->

                <div
                    class="grid
                           grid-cols-2
                           sm:grid-cols-4
                           gap-5
                           pt-8
                           mt-8
                           border-t
                           border-gray-300/70 dark:border-gray-700/60
                           text-left
                           animate-fade-up
                           delay-500">


                    <div>

                        <h4
                            class="text-2xl
                                   font-black
                                   text-gray-900 dark:text-white">

                            50+

                        </h4>

                        <p
                            class="text-[10px]
                                   text-gray-600 dark:text-gray-400
                                   uppercase
                                   tracking-wider
                                   mt-1
                                   font-semibold">

                            Projects Delivered

                        </p>

                    </div>


                    <div>

                        <h4
                            class="text-2xl
                                   font-black
                                   text-gray-900 dark:text-white">

                            30+

                        </h4>

                        <p
                            class="text-[10px]
                                   text-gray-600 dark:text-gray-400
                                   uppercase
                                   tracking-wider
                                   mt-1
                                   font-semibold">

                            Happy Clients

                        </p>

                    </div>


                    <div>

                        <h4
                            class="text-2xl
                                   font-black
                                   text-gray-900 dark:text-white">

                            98%

                        </h4>

                        <p
                            class="text-[10px]
                                   text-gray-600 dark:text-gray-400
                                   uppercase
                                   tracking-wider
                                   mt-1
                                   font-semibold">

                            Satisfaction

                        </p>

                    </div>


                    <div>

                        <h4
                            class="text-2xl
                                   font-black
                                   text-gray-900 dark:text-white">

                            5+

                        </h4>

                        <p
                            class="text-[10px]
                                   text-gray-600 dark:text-gray-400
                                   uppercase
                                   tracking-wider
                                   mt-1
                                   font-semibold">

                            Years Experience

                        </p>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- =========================================================
     SERVICES
========================================================= -->

<section
    id="solutions"

    class="py-20
           bg-[#F7F8FA] dark:bg-[#0D0F12]
           transition-colors duration-500">

    <div
        class="max-w-7xl
               mx-auto
               px-4 sm:px-6">


        <div
            class="mb-12
                   animate-fade-up">

            <span
                class="text-xs
                       font-bold
                       tracking-widest
                       text-gray-600 dark:text-gray-400
                       uppercase">

                What We Do

            </span>


            <h2
                class="text-3xl
                       sm:text-4xl
                       font-extrabold
                       text-gray-900 dark:text-white
                       mt-2">

                Digital Solutions

                <br>

                <span class="text-accent">
                    for Modern Businesses
                </span>

            </h2>

        </div>


        <div
            class="grid
                   grid-cols-1
                   sm:grid-cols-2
                   lg:grid-cols-6
                   gap-4">


            <!-- SERVICE 1 -->

            <div
                class="service-card
                       bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       p-5
                       flex flex-col
                       justify-between
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       shadow-sm
                       hover:shadow-xl
                       animate-fade-up">

                <div>

                    <div
                        class="w-11 h-11
                               bg-red-50 dark:bg-[#242830]
                               text-accent
                               rounded-xl
                               flex items-center
                               justify-center
                               mb-5">

                        <i class="fa-solid fa-code"></i>

                    </div>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mb-2">

                        Project Development

                    </h3>


                    <p
                        class="text-[11px]
                               text-gray-600 dark:text-gray-400
                               leading-relaxed
                               font-medium">

                        We build scalable, secure, and high-performance
                        web & mobile applications.

                    </p>

                </div>


                <span
                    class="text-xs
                           text-accent
                           font-bold
                           mt-5
                           inline-flex
                           items-center
                           gap-1">

                    Learn More

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </span>

            </div>


            <!-- SERVICE 2 -->

            <div
                class="service-card
                       bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       p-5
                       flex flex-col
                       justify-between
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       shadow-sm
                       hover:shadow-xl
                       animate-fade-up
                       delay-100">

                <div>

                    <div
                        class="w-11 h-11
                               bg-red-50 dark:bg-[#242830]
                               text-accent
                               rounded-xl
                               flex items-center
                               justify-center
                               mb-5">

                        <i class="fa-solid fa-laptop-code"></i>

                    </div>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mb-2">

                        Project Showcase

                    </h3>


                    <p
                        class="text-[11px]
                               text-gray-600 dark:text-gray-400
                               leading-relaxed
                               font-medium">

                        We create stunning showcases that highlight
                        your brand and products.

                    </p>

                </div>


                <span
                    class="text-xs
                           text-accent
                           font-bold
                           mt-5
                           inline-flex
                           items-center
                           gap-1">

                    Learn More

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </span>

            </div>


            <!-- SERVICE 3 -->

            <div
                class="bg-accent
                       text-white
                       border border-accent
                       rounded-2xl
                       p-5
                       flex flex-col
                       justify-between
                       shadow-xl
                       shadow-red-500/20
                       lg:scale-105
                       lg:z-10
                       hover:-translate-y-2
                       transition-all duration-300
                       animate-scale
                       delay-200">

                <div>

                    <div
                        class="w-11 h-11
                               bg-white/20
                               text-white
                               rounded-xl
                               flex items-center
                               justify-center
                               mb-5">

                        <i class="fa-solid fa-layer-group"></i>

                    </div>


                    <h3
                        class="text-sm
                               font-extrabold
                               mb-2">

                        Digital Solutions

                    </h3>


                    <p
                        class="text-[11px]
                               text-white/90
                               leading-relaxed">

                        From automation to integration,
                        we deliver end-to-end solutions.

                    </p>

                </div>


                <span
                    class="text-xs
                           text-white
                           font-bold
                           mt-5
                           inline-flex
                           items-center
                           gap-1">

                    Learn More

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </span>

            </div>


            <!-- SERVICE 4 -->

            <div
                class="bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       p-5
                       flex flex-col
                       justify-between
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       shadow-sm
                       hover:shadow-xl
                       animate-fade-up
                       delay-300">

                <div>

                    <div
                        class="w-11 h-11
                               bg-red-50 dark:bg-[#242830]
                               text-accent
                               rounded-xl
                               flex items-center
                               justify-center
                               mb-5">

                        <i class="fa-solid fa-bullhorn"></i>

                    </div>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mb-2">

                        Digital Marketing

                    </h3>


                    <p
                        class="text-[11px]
                               text-gray-600 dark:text-gray-400
                               leading-relaxed
                               font-medium">

                        Data-driven strategies to grow your brand
                        and reach the right audience.

                    </p>

                </div>


                <span
                    class="text-xs
                           text-accent
                           font-bold
                           mt-5
                           inline-flex
                           items-center
                           gap-1">

                    Learn More

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </span>

            </div>


            <!-- SERVICE 5 -->

            <div
                class="bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       p-5
                       flex flex-col
                       justify-between
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       shadow-sm
                       hover:shadow-xl
                       animate-fade-up
                       delay-400">

                <div>

                    <div
                        class="w-11 h-11
                               bg-red-50 dark:bg-[#242830]
                               text-accent
                               rounded-xl
                               flex items-center
                               justify-center
                               mb-5">

                        <i class="fa-solid fa-pen-nib"></i>

                    </div>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mb-2">

                        UI/UX Design

                    </h3>


                    <p
                        class="text-[11px]
                               text-gray-600 dark:text-gray-400
                               leading-relaxed
                               font-medium">

                        Beautiful, intuitive designs that deliver
                        exceptional user experiences.

                    </p>

                </div>


                <span
                    class="text-xs
                           text-accent
                           font-bold
                           mt-5
                           inline-flex
                           items-center
                           gap-1">

                    Learn More

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </span>

            </div>


            <!-- SERVICE 6 -->

            <div
                class="bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       p-5
                       flex flex-col
                       justify-between
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       shadow-sm
                       hover:shadow-xl
                       animate-fade-up
                       delay-500">

                <div>

                    <div
                        class="w-11 h-11
                               bg-red-50 dark:bg-[#242830]
                               text-accent
                               rounded-xl
                               flex items-center
                               justify-center
                               mb-5">

                        <i class="fa-solid fa-magnifying-glass-chart"></i>

                    </div>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mb-2">

                        SEO & Analytics

                    </h3>


                    <p
                        class="text-[11px]
                               text-gray-600 dark:text-gray-400
                               leading-relaxed
                               font-medium">

                        Improve rankings, boost performance,
                        and accelerate growth.

                    </p>

                </div>


                <span
                    class="text-xs
                           text-accent
                           font-bold
                           mt-5
                           inline-flex
                           items-center
                           gap-1">

                    Learn More

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </span>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     PROJECT SHOWCASE
========================================================= -->

<section
    id="portfolio"

    class="py-20
           bg-gray-100 dark:bg-[#121419]
           border-y
           border-gray-200 dark:border-[#242830]
           overflow-hidden
           transition-colors duration-500">


    <div
        class="max-w-7xl
               mx-auto
               px-4 sm:px-6">


        <div
            class="flex
                   flex-col
                   sm:flex-row
                   justify-between
                   items-start
                   sm:items-end
                   gap-5
                   mb-10
                   animate-fade-up">


            <div>

                <span
                    class="text-xs
                           font-bold
                           tracking-widest
                           text-gray-600 dark:text-gray-400
                           uppercase">

                    Our Work

                </span>


                <h2
                    class="text-3xl
                           sm:text-4xl
                           font-extrabold
                           text-gray-900 dark:text-white
                           mt-2">

                    Project

                    <span class="text-accent">
                        Showcases
                    </span>

                </h2>

            </div>


            <div
                class="flex
                       items-center
                       gap-3">

                <button
                    id="slider-prev"

                    class="w-11 h-11
                           rounded-full
                           border
                           border-gray-300 dark:border-gray-700
                           bg-white dark:bg-[#16191E]
                           text-gray-800 dark:text-white
                           flex items-center
                           justify-center
                           hover:border-accent
                           hover:text-accent
                           transition">

                    <i class="fa-solid fa-arrow-left text-xs"></i>

                </button>


                <button
                    id="slider-next"

                    class="w-11 h-11
                           rounded-full
                           border
                           border-gray-300 dark:border-gray-700
                           bg-white dark:bg-[#16191E]
                           text-gray-800 dark:text-white
                           flex items-center
                           justify-center
                           hover:border-accent
                           hover:text-accent
                           transition">

                    <i class="fa-solid fa-arrow-right text-xs"></i>

                </button>

            </div>

        </div>


        <!-- SLIDER -->

        <div
            id="project-slider"

            class="flex
                   gap-6
                   overflow-x-auto
                   no-scrollbar
                   scroll-smooth
                   snap-x
                   snap-mandatory
                   pb-5">


            <!-- PROJECT 1 -->

            <div
                class="min-w-[280px]
                       sm:min-w-[380px]
                       snap-start
                       bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       overflow-hidden
                       group
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       flex-shrink-0
                       shadow-sm hover:shadow-xl">


                <div
                    class="relative
                           h-48 sm:h-52
                           overflow-hidden">

                    <span
                        class="absolute
                               top-4 left-4
                               bg-black/70
                               backdrop-blur-md
                               text-white
                               text-[11px]
                               font-bold
                               px-2.5 py-1
                               rounded-md
                               z-10">

                        01

                    </span>


                    <img
                        src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800"

                        alt="Digital Workspace"

                        class="w-full
                               h-full
                               object-cover
                               group-hover:scale-110
                               transition duration-500">

                </div>


                <div class="p-5">

                    <span
                        class="text-[10px]
                               font-bold
                               uppercase
                               tracking-wider
                               text-accent
                               bg-red-50 dark:bg-red-500/10
                               px-2 py-1
                               rounded">

                        Web Application

                    </span>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mt-3">

                        ZACNUS - Digital Workspace Platform

                    </h3>


                    <a
                        href="#"
                        class="text-xs
                               text-gray-600 dark:text-gray-400
                               mt-4
                               inline-flex
                               items-center
                               gap-1
                               hover:text-accent">

                        View Project

                        <i class="fa-solid fa-arrow-right text-[10px]"></i>

                    </a>

                </div>

            </div>


            <!-- PROJECT 2 -->

            <div
                class="min-w-[280px]
                       sm:min-w-[380px]
                       snap-start
                       bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       overflow-hidden
                       group
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       flex-shrink-0
                       shadow-sm hover:shadow-xl">


                <div
                    class="relative
                           h-48 sm:h-52
                           overflow-hidden">

                    <span
                        class="absolute
                               top-4 left-4
                               bg-black/70
                               backdrop-blur-md
                               text-white
                               text-[11px]
                               font-bold
                               px-2.5 py-1
                               rounded-md
                               z-10">

                        02

                    </span>


                    <img
                        src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800"

                        alt="E-Commerce"

                        class="w-full
                               h-full
                               object-cover
                               group-hover:scale-110
                               transition duration-500">

                </div>


                <div class="p-5">

                    <span
                        class="text-[10px]
                               font-bold
                               uppercase
                               tracking-wider
                               text-accent
                               bg-red-50 dark:bg-red-500/10
                               px-2 py-1
                               rounded">

                        E-Commerce

                    </span>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mt-3">

                        ZACNUS - Modern E-Commerce Solution

                    </h3>


                    <a
                        href="#"
                        class="text-xs
                               text-gray-600 dark:text-gray-400
                               mt-4
                               inline-flex
                               items-center
                               gap-1
                               hover:text-accent">

                        View Project

                        <i class="fa-solid fa-arrow-right text-[10px]"></i>

                    </a>

                </div>

            </div>


            <!-- PROJECT 3 -->

            <div
                class="min-w-[280px]
                       sm:min-w-[380px]
                       snap-start
                       bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       overflow-hidden
                       group
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       flex-shrink-0
                       shadow-sm hover:shadow-xl">


                <div
                    class="relative
                           h-48 sm:h-52
                           overflow-hidden">

                    <span
                        class="absolute
                               top-4 left-4
                               bg-black/70
                               backdrop-blur-md
                               text-white
                               text-[11px]
                               font-bold
                               px-2.5 py-1
                               rounded-md
                               z-10">

                        03

                    </span>


                    <img
                        src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=800"

                        alt="Mobile Application"

                        class="w-full
                               h-full
                               object-cover
                               group-hover:scale-110
                               transition duration-500">

                </div>


                <div class="p-5">

                    <span
                        class="text-[10px]
                               font-bold
                               uppercase
                               tracking-wider
                               text-accent
                               bg-red-50 dark:bg-red-500/10
                               px-2 py-1
                               rounded">

                        Mobile App

                    </span>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mt-3">

                        ZACNUS - Smart Mobile Experience

                    </h3>


                    <a
                        href="#"
                        class="text-xs
                               text-gray-600 dark:text-gray-400
                               mt-4
                               inline-flex
                               items-center
                               gap-1
                               hover:text-accent">

                        View Project

                        <i class="fa-solid fa-arrow-right text-[10px]"></i>

                    </a>

                </div>

            </div>


            <!-- PROJECT 4 -->

            <div
                class="min-w-[280px]
                       sm:min-w-[380px]
                       snap-start
                       bg-white dark:bg-[#16191E]
                       border border-gray-200 dark:border-[#242830]
                       rounded-2xl
                       overflow-hidden
                       group
                       hover:border-red-400
                       hover:-translate-y-2
                       transition-all duration-300
                       flex-shrink-0
                       shadow-sm hover:shadow-xl">


                <div
                    class="relative
                           h-48 sm:h-52
                           overflow-hidden">

                    <span
                        class="absolute
                               top-4 left-4
                               bg-black/70
                               backdrop-blur-md
                               text-white
                               text-[11px]
                               font-bold
                               px-2.5 py-1
                               rounded-md
                               z-10">

                        04

                    </span>


                    <img
                        src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?q=80&w=800"

                        alt="Brand Identity"

                        class="w-full
                               h-full
                               object-cover
                               group-hover:scale-110
                               transition duration-500">

                </div>


                <div class="p-5">

                    <span
                        class="text-[10px]
                               font-bold
                               uppercase
                               tracking-wider
                               text-accent
                               bg-red-50 dark:bg-red-500/10
                               px-2 py-1
                               rounded">

                        Branding

                    </span>


                    <h3
                        class="text-sm
                               font-extrabold
                               text-gray-900 dark:text-white
                               mt-3">

                        ZACNUS - Brand Identity Design

                    </h3>


                    <a
                        href="#"
                        class="text-xs
                               text-gray-600 dark:text-gray-400
                               mt-4
                               inline-flex
                               items-center
                               gap-1
                               hover:text-accent">

                        View Project

                        <i class="fa-solid fa-arrow-right text-[10px]"></i>

                    </a>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- =========================================================
     STATS
========================================================= -->

<section
    class="max-w-7xl
           mx-auto
           px-4 sm:px-6
           my-14">

    <div
        class="bg-white dark:bg-[#16191E]
               border border-gray-200 dark:border-[#242830]
               rounded-3xl
               p-6 sm:p-8
               grid
               grid-cols-2
               sm:grid-cols-5
               gap-6
               text-center
               shadow-sm
               animate-scale">


        <div>

            <h4
                class="text-xl
                       font-black
                       text-gray-900 dark:text-white">

                50+

            </h4>

            <p
                class="text-[10px]
                       text-gray-600 dark:text-gray-400
                       uppercase
                       tracking-wider
                       mt-1
                       font-semibold">

                Projects Completed

            </p>

        </div>


        <div>

            <h4
                class="text-xl
                       font-black
                       text-gray-900 dark:text-white">

                30+

            </h4>

            <p
                class="text-[10px]
                       text-gray-600 dark:text-gray-400
                       uppercase
                       tracking-wider
                       mt-1
                       font-semibold">

                Happy Clients

            </p>

        </div>


        <div>

            <h4
                class="text-xl
                       font-black
                       text-gray-900 dark:text-white">

                98%

            </h4>

            <p
                class="text-[10px]
                       text-gray-600 dark:text-gray-400
                       uppercase
                       tracking-wider
                       mt-1
                       font-semibold">

                Satisfaction

            </p>

        </div>


        <div>

            <h4
                class="text-xl
                       font-black
                       text-gray-900 dark:text-white">

                5+

            </h4>

            <p
                class="text-[10px]
                       text-gray-600 dark:text-gray-400
                       uppercase
                       tracking-wider
                       mt-1
                       font-semibold">

                Years Experience

            </p>

        </div>


        <div class="col-span-2 sm:col-span-1">

            <h4
                class="text-xl
                       font-black
                       text-gray-900 dark:text-white">

                24/7

            </h4>

            <p
                class="text-[10px]
                       text-gray-600 dark:text-gray-400
                       uppercase
                       tracking-wider
                       mt-1
                       font-semibold">

                Support Available

            </p>

        </div>


    </div>

</section>


<!-- =========================================================
     ABOUT / WHY CHOOSE US
========================================================= -->

<section
    id="about"

    class="py-16
           bg-[#F7F8FA] dark:bg-[#0D0F12]
           transition-colors duration-500">

    <div
        class="max-w-7xl
               mx-auto
               px-4 sm:px-6">

        <div
            class="grid
                   lg:grid-cols-12
                   gap-12
                   items-center">


            <!-- LEFT -->

            <div
                class="lg:col-span-6
                       animate-fade-right">


                <span
                    class="text-xs
                           font-bold
                           tracking-widest
                           text-gray-600 dark:text-gray-400
                           uppercase">

                    Why Choose Us

                </span>


                <h2
                    class="text-3xl
                           sm:text-4xl
                           font-extrabold
                           text-gray-900 dark:text-white
                           mt-2">

                    We combine innovation,

                    <br>

                    <span class="text-accent">
                        creativity & technology
                    </span>

                </h2>


                <p
                    class="text-sm
                           text-gray-600 dark:text-gray-400
                           leading-relaxed
                           mt-5
                           max-w-xl">

                    We help businesses transform ideas into powerful
                    digital products through strategy, design,
                    development and continuous support.

                </p>


                <div
                    class="space-y-4
                           mt-8">


                    <div
                        class="flex items-center gap-3">

                        <div
                            class="w-7 h-7
                                   rounded-full
                                   bg-red-50 dark:bg-red-500/10
                                   text-accent
                                   flex items-center
                                   justify-center">

                            <i class="fa-solid fa-check text-xs"></i>

                        </div>

                        <span
                            class="text-sm
                                   font-semibold
                                   text-gray-800 dark:text-gray-300">

                            Result-driven digital strategies

                        </span>

                    </div>


                    <div
                        class="flex items-center gap-3">

                        <div
                            class="w-7 h-7
                                   rounded-full
                                   bg-red-50 dark:bg-red-500/10
                                   text-accent
                                   flex items-center
                                   justify-center">

                            <i class="fa-solid fa-check text-xs"></i>

                        </div>

                        <span
                            class="text-sm
                                   font-semibold
                                   text-gray-800 dark:text-gray-300">

                            Experienced & passionate team

                        </span>

                    </div>


                    <div
                        class="flex items-center gap-3">

                        <div
                            class="w-7 h-7
                                   rounded-full
                                   bg-red-50 dark:bg-red-500/10
                                   text-accent
                                   flex items-center
                                   justify-center">

                            <i class="fa-solid fa-check text-xs"></i>

                        </div>

                        <span
                            class="text-sm
                                   font-semibold
                                   text-gray-800 dark:text-gray-300">

                            Agile & transparent process

                        </span>

                    </div>


                    <div
                        class="flex items-center gap-3">

                        <div
                            class="w-7 h-7
                                   rounded-full
                                   bg-red-50 dark:bg-red-500/10
                                   text-accent
                                   flex items-center
                                   justify-center">

                            <i class="fa-solid fa-check text-xs"></i>

                        </div>

                        <span
                            class="text-sm
                                   font-semibold
                                   text-gray-800 dark:text-gray-300">

                            On-time delivery with quality

                        </span>

                    </div>


                </div>

            </div>


            <!-- RIGHT -->

            <div
                class="lg:col-span-6
                       animate-fade-left">


                <div
                    class="bg-white dark:bg-[#16191E]
                           border border-gray-200 dark:border-[#242830]
                           rounded-3xl
                           p-6 sm:p-8
                           shadow-xl">


                    <div
                        class="flex items-center
                               justify-between
                               mb-6">

                        <div>

                            <p
                                class="text-xs
                                       text-gray-500 dark:text-gray-400
                                       font-semibold">

                                Digital Excellence

                            </p>

                            <h3
                                class="text-xl
                                       font-extrabold
                                       text-gray-900 dark:text-white
                                       mt-1">

                                Built for Growth

                            </h3>

                        </div>


                        <div
                            class="w-12 h-12
                                   rounded-2xl
                                   bg-red-50 dark:bg-red-500/10
                                   text-accent
                                   flex items-center
                                   justify-center
                                   floating">

                            <i class="fa-solid fa-rocket"></i>

                        </div>

                    </div>


                    <div
                        class="space-y-5">


                        <div>

                            <div
                                class="flex justify-between
                                       text-xs
                                       font-bold
                                       mb-2">

                                <span
                                    class="text-gray-700 dark:text-gray-300">

                                    Development

                                </span>

                                <span class="text-accent">
                                    95%
                                </span>

                            </div>


                            <div
                                class="h-2
                                       bg-gray-100 dark:bg-gray-800
                                       rounded-full
                                       overflow-hidden">

                                <div
                                    class="h-full
                                           bg-accent
                                           rounded-full"
                                    style="width:95%">
                                </div>

                            </div>

                        </div>


                        <div>

                            <div
                                class="flex justify-between
                                       text-xs
                                       font-bold
                                       mb-2">

                                <span
                                    class="text-gray-700 dark:text-gray-300">

                                    UI/UX Design

                                </span>

                                <span class="text-accent">
                                    92%
                                </span>

                            </div>


                            <div
                                class="h-2
                                       bg-gray-100 dark:bg-gray-800
                                       rounded-full
                                       overflow-hidden">

                                <div
                                    class="h-full
                                           bg-accent
                                           rounded-full"
                                    style="width:92%">
                                </div>

                            </div>

                        </div>


                        <div>

                            <div
                                class="flex justify-between
                                       text-xs
                                       font-bold
                                       mb-2">

                                <span
                                    class="text-gray-700 dark:text-gray-300">

                                    Digital Strategy

                                </span>

                                <span class="text-accent">
                                    89%
                                </span>

                            </div>


                            <div
                                class="h-2
                                       bg-gray-100 dark:bg-gray-800
                                       rounded-full
                                       overflow-hidden">

                                <div
                                    class="h-full
                                           bg-accent
                                           rounded-full"
                                    style="width:89%">
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- =========================================================
     TESTIMONIALS
========================================================= -->

<section
    id="testimonials"

    class="py-20
           bg-white dark:bg-[#121419]
           transition-colors duration-500">


    <div
        class="max-w-7xl
               mx-auto
               px-4 sm:px-6">


        <div
            class="grid
                   lg:grid-cols-12
                   gap-12
                   items-center">


            <!-- TESTIMONIAL -->

            <div
                class="lg:col-span-7
                       animate-fade-right">


                <span
                    class="text-xs
                           font-bold
                           tracking-widest
                           text-gray-600 dark:text-gray-400
                           uppercase">

                    Client Feedback

                </span>


                <h2
                    class="text-3xl
                           sm:text-4xl
                           font-extrabold
                           text-gray-900 dark:text-white
                           mt-2">

                    What our clients

                    <span class="text-accent">
                        say about us
                    </span>

                </h2>


                <div
                    class="bg-gray-50 dark:bg-[#16191E]
                           border border-gray-200 dark:border-[#242830]
                           rounded-3xl
                           p-6 sm:p-8
                           mt-8
                           shadow-sm">


                    <div
                        class="text-accent
                               text-4xl
                               mb-4">

                        <i class="fa-solid fa-quote-left"></i>

                    </div>


                    <p
                        class="text-gray-700 dark:text-gray-300
                               text-sm
                               leading-relaxed">

                        "ZACNUS transformed our idea into a powerful
                        digital product. Their team is professional,
                        creative and reliable."

                    </p>


                    <div
                        class="flex
                               items-center
                               justify-between
                               gap-4
                               mt-7">


                        <div
                            class="flex
                                   items-center
                                   gap-3">


                            <img
                                src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200"

                                alt="Sarah Johnson"

                                class="w-12 h-12
                                       rounded-full
                                       object-cover
                                       border-2
                                       border-accent">


                            <div>

                                <h4
                                    class="text-sm
                                           font-extrabold
                                           text-gray-900 dark:text-white">

                                    Sarah Johnson

                                </h4>

                                <p
                                    class="text-[11px]
                                           text-gray-500 dark:text-gray-400">

                                    CEO, TechNova

                                </p>

                            </div>

                        </div>


                        <div
                            class="text-amber-400
                                   text-xs
                                   flex gap-1">

                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>

                        </div>


                    </div>

                </div>

            </div>


            <!-- CLIENTS -->

            <div
                class="lg:col-span-5
                       animate-fade-left">


                <span
                    class="text-xs
                           font-bold
                           tracking-widest
                           text-gray-600 dark:text-gray-400
                           uppercase">

                    Our Clients

                </span>


                <div
                    class="grid
                           grid-cols-2
                           gap-3
                           mt-5">


                    <div
                        class="bg-gray-50 dark:bg-[#16191E]
                               border border-gray-200 dark:border-[#242830]
                               py-4
                               px-4
                               rounded-xl
                               text-center
                               text-gray-700 dark:text-gray-300
                               font-extrabold
                               text-xs
                               uppercase">

                        TechNova

                    </div>


                    <div
                        class="bg-gray-50 dark:bg-[#16191E]
                               border border-gray-200 dark:border-[#242830]
                               py-4
                               px-4
                               rounded-xl
                               text-center
                               text-gray-700 dark:text-gray-300
                               font-extrabold
                               text-xs
                               uppercase">

                        HexaLab

                    </div>


                    <div
                        class="bg-gray-50 dark:bg-[#16191E]
                               border border-gray-200 dark:border-[#242830]
                               py-4
                               px-4
                               rounded-xl
                               text-center
                               text-gray-700 dark:text-gray-300
                               font-extrabold
                               text-xs
                               uppercase">

                        Softify

                    </div>


                    <div
                        class="bg-gray-50 dark:bg-[#16191E]
                               border border-gray-200 dark:border-[#242830]
                               py-4
                               px-4
                               rounded-xl
                               text-center
                               text-gray-700 dark:text-gray-300
                               font-extrabold
                               text-xs
                               uppercase">

                        DigitalEdge

                    </div>


                    <div
                        class="bg-gray-50 dark:bg-[#16191E]
                               border border-gray-200 dark:border-[#242830]
                               py-4
                               px-4
                               rounded-xl
                               text-center
                               text-gray-700 dark:text-gray-300
                               font-extrabold
                               text-xs
                               uppercase">

                        InnovaTech

                    </div>


                    <div
                        class="bg-gray-50 dark:bg-[#16191E]
                               border border-gray-200 dark:border-[#242830]
                               py-4
                               px-4
                               rounded-xl
                               text-center
                               text-gray-700 dark:text-gray-300
                               font-extrabold
                               text-xs
                               uppercase">

                        Visionary

                    </div>


                </div>

            </div>


        </div>

    </div>

</section>


<!-- =========================================================
     CONTACT
========================================================= -->

<section
    id="contact"

    class="py-16
           bg-[#F7F8FA] dark:bg-[#0D0F12]
           transition-colors duration-500">


    <div
        class="max-w-7xl
               mx-auto
               px-4 sm:px-6">


        <div
            class="bg-white dark:bg-[#16191E]
                   border border-gray-200 dark:border-[#242830]
                   rounded-3xl
                   p-6 sm:p-12
                   shadow-xl
                   animate-scale">


            <div class="max-w-2xl mb-8">


                <h2
                    class="text-3xl
                           sm:text-4xl
                           font-extrabold
                           text-gray-900 dark:text-white">

                    Let's Build Something

                    <br>

                    <span class="text-accent">
                        Amazing Together
                    </span>

                </h2>


                <p
                    class="text-sm
                           text-gray-600 dark:text-gray-400
                           mt-3">

                    Have a project in mind?
                    Let's discuss how we can help you achieve it.

                </p>

            </div>


            <!-- SUCCESS -->

            @if(session('success'))

                <div
                    class="mb-5
                           bg-green-50 dark:bg-green-500/10
                           border border-green-200 dark:border-green-500/30
                           text-green-700 dark:text-green-400
                           px-4 py-3
                           rounded-xl
                           text-sm">

                    <i class="fa-solid fa-circle-check mr-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- ERRORS -->

            @if($errors->any())

                <div
                    class="mb-5
                           bg-red-50 dark:bg-red-500/10
                           border border-red-200 dark:border-red-500/30
                           text-red-700 dark:text-red-400
                           px-4 py-3
                           rounded-xl
                           text-sm">

                    <ul class="list-disc list-inside">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORM -->

            <form
                action="{{ route('contact.store') }}"
                method="POST"

                class="grid
                       grid-cols-1
                       sm:grid-cols-3
                       gap-4">

                @csrf


                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Your Name"
                    required

                    class="bg-gray-50 dark:bg-[#0D0F12]
                           border border-gray-200 dark:border-[#242830]
                           rounded-xl
                           px-4 py-3
                           text-sm
                           text-gray-900 dark:text-white
                           placeholder-gray-500
                           focus:border-accent
                           focus:ring-2
                           focus:ring-red-500/10
                           outline-none
                           transition">


                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email Address"
                    required

                    class="bg-gray-50 dark:bg-[#0D0F12]
                           border border-gray-200 dark:border-[#242830]
                           rounded-xl
                           px-4 py-3
                           text-sm
                           text-gray-900 dark:text-white
                           placeholder-gray-500
                           focus:border-accent
                           focus:ring-2
                           focus:ring-red-500/10
                           outline-none
                           transition">


                <div class="flex gap-2">

                    <input
                        type="text"
                        name="message"
                        placeholder="Your Message"
                        required

                        class="bg-gray-50 dark:bg-[#0D0F12]
                               border border-gray-200 dark:border-[#242830]
                               rounded-xl
                               px-4 py-3
                               text-sm
                               text-gray-900 dark:text-white
                               placeholder-gray-500
                               focus:border-accent
                               focus:ring-2
                               focus:ring-red-500/10
                               outline-none
                               w-full
                               transition">


                    <button
                        type="submit"

                        class="bg-accent
                               hover:bg-accent-hover
                               text-white
                               px-5
                               rounded-xl
                               transition
                               flex items-center
                               justify-center
                               flex-shrink-0
                               shadow-lg
                               shadow-red-500/20">

                        <i class="fa-solid fa-paper-plane text-xs"></i>

                    </button>

                </div>


            </form>

        </div>

    </div>

</section>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer
    class="bg-white dark:bg-[#121419]
           border-t border-gray-200 dark:border-[#242830]
           mt-10
           pt-16
           pb-8
           transition-colors duration-500">


    <div
        class="max-w-7xl
               mx-auto
               px-4 sm:px-6
               grid
               grid-cols-1
               sm:grid-cols-2
               lg:grid-cols-5
               gap-10
               pb-12
               border-b
               border-gray-200 dark:border-[#242830]">


        <!-- BRAND -->

        <div
            class="space-y-4
                   lg:col-span-1">


            <a
                href="#home"
                class="flex items-center gap-3">


                <div
                    class="h-9 w-9
                           bg-accent
                           rounded-lg
                           flex items-center
                           justify-center">

                    <span
                        class="text-white
                               font-black">

                        Z

                    </span>

                </div>


                <span
                    class="text-base
                           font-extrabold
                           tracking-wider
                           text-gray-900 dark:text-white
                           uppercase">

                    ZACNUS

                </span>

            </a>


            <p
                class="text-[11px]
                       text-gray-600 dark:text-gray-400
                       leading-relaxed">

                Innovating your digital frontier with smart strategies
                and modern technology.

            </p>


            <div
                class="flex gap-3">


                <a
                    href="#"
                    class="w-9 h-9
                           rounded-lg
                           bg-gray-50 dark:bg-[#16191E]
                           border border-gray-200 dark:border-[#242830]
                           flex items-center
                           justify-center
                           text-gray-600 dark:text-gray-400
                           hover:text-accent
                           hover:border-accent
                           transition">

                    <i class="fa-brands fa-facebook-f text-xs"></i>

                </a>


                <a
                    href="#"
                    class="w-9 h-9
                           rounded-lg
                           bg-gray-50 dark:bg-[#16191E]
                           border border-gray-200 dark:border-[#242830]
                           flex items-center
                           justify-center
                           text-gray-600 dark:text-gray-400
                           hover:text-accent
                           hover:border-accent
                           transition">

                    <i class="fa-brands fa-twitter text-xs"></i>

                </a>


                <a
                    href="#"
                    class="w-9 h-9
                           rounded-lg
                           bg-gray-50 dark:bg-[#16191E]
                           border border-gray-200 dark:border-[#242830]
                           flex items-center
                           justify-center
                           text-gray-600 dark:text-gray-400
                           hover:text-accent
                           hover:border-accent
                           transition">

                    <i class="fa-brands fa-linkedin-in text-xs"></i>

                </a>


                <a
                    href="#"
                    class="w-9 h-9
                           rounded-lg
                           bg-gray-50 dark:bg-[#16191E]
                           border border-gray-200 dark:border-[#242830]
                           flex items-center
                           justify-center
                           text-gray-600 dark:text-gray-400
                           hover:text-accent
                           hover:border-accent
                           transition">

                    <i class="fa-brands fa-instagram text-xs"></i>

                </a>


            </div>

        </div>


        <!-- COMPANY -->

        <div class="space-y-4">

            <h4
                class="text-gray-900 dark:text-white
                       font-bold
                       text-xs
                       uppercase
                       tracking-wider">

                Company

            </h4>


            <ul
                class="space-y-3
                       text-[11px]">

                <li>
                    <a href="#about"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        About Us
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Careers
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Our Team
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Blog
                    </a>
                </li>

            </ul>

        </div>


        <!-- SERVICES -->

        <div class="space-y-4">

            <h4
                class="text-gray-900 dark:text-white
                       font-bold
                       text-xs
                       uppercase
                       tracking-wider">

                Services

            </h4>


            <ul
                class="space-y-3
                       text-[11px]">

                <li>
                    <a href="#solutions"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Digital Solutions
                    </a>
                </li>

                <li>
                    <a href="#solutions"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Project Development
                    </a>
                </li>

                <li>
                    <a href="#solutions"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Mobile App
                    </a>
                </li>

                <li>
                    <a href="#solutions"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        UI/UX Design
                    </a>
                </li>

            </ul>

        </div>


        <!-- RESOURCES -->

        <div class="space-y-4">

            <h4
                class="text-gray-900 dark:text-white
                       font-bold
                       text-xs
                       uppercase
                       tracking-wider">

                Resources

            </h4>


            <ul
                class="space-y-3
                       text-[11px]">

                <li>
                    <a href="#portfolio"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Case Studies
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Documentation
                    </a>
                </li>

                <li>
                    <a href="#contact"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        Support
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="text-gray-600 dark:text-gray-400 hover:text-accent transition">
                        FAQs
                    </a>
                </li>

            </ul>

        </div>


        <!-- NEWSLETTER -->

        <div class="space-y-4">

            <h4
                class="text-gray-900 dark:text-white
                       font-bold
                       text-xs
                       uppercase
                       tracking-wider">

                Subscribe to our newsletter

            </h4>


            <p
                class="text-[11px]
                       text-gray-600 dark:text-gray-400">

                Get the latest updates & insights straight to your inbox.

            </p>


            <form
                class="flex relative">

                <input
                    type="email"
                    placeholder="Your email"

                    class="bg-gray-50 dark:bg-[#16191E]
                           border border-gray-200 dark:border-[#242830]
                           rounded-xl
                           px-3 py-2
                           text-xs
                           text-gray-900 dark:text-white
                           placeholder-gray-500
                           focus:border-accent
                           outline-none
                           w-full
                           pr-10">


                <button
                    type="submit"

                    class="absolute
                           right-1
                           top-1
                           bottom-1
                           bg-accent
                           hover:bg-accent-hover
                           text-white
                           px-3
                           rounded-lg
                           transition
                           flex items-center
                           justify-center">

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </button>

            </form>

        </div>

    </div>


    <!-- COPYRIGHT -->

    <div
        class="max-w-7xl
               mx-auto
               px-4 sm:px-6
               pt-6
               flex
               flex-col
               sm:flex-row
               justify-between
               items-center
               gap-4
               text-[11px]
               text-gray-500
               text-center
               sm:text-left">


        <p>
            © 2026 ZACNUS. All rights reserved.
        </p>


        <div class="flex gap-6">

            <a href="#"
               class="hover:text-accent transition">

                Privacy Policy

            </a>


            <a href="#"
               class="hover:text-accent transition">

                Terms of Service

            </a>

        </div>

    </div>

</footer>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    document.addEventListener('DOMContentLoaded', function () {


        /* =====================================================
           THEME
        ===================================================== */

        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');

        const html = document.documentElement;


        function updateThemeIcon() {

            if (html.classList.contains('light')) {

                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');

                themeToggle.setAttribute(
                    'aria-label',
                    'Switch to dark mode'
                );

            } else {

                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');

                themeToggle.setAttribute(
                    'aria-label',
                    'Switch to light mode'
                );

            }

        }


        updateThemeIcon();


        themeToggle.addEventListener('click', function () {

            if (html.classList.contains('dark')) {

                html.classList.remove('dark');

                html.classList.add('light');

                localStorage.setItem(
                    'zacnus-theme',
                    'light'
                );

            } else {

                html.classList.remove('light');

                html.classList.add('dark');

                localStorage.setItem(
                    'zacnus-theme',
                    'dark'
                );

            }


            updateThemeIcon();

        });


        /* =====================================================
           MOBILE MENU
        ===================================================== */

        const mobileMenuBtn =
            document.getElementById('mobile-menu-btn');

        const mobileMenu =
            document.getElementById('mobile-menu');


        mobileMenuBtn.addEventListener('click', function () {

            mobileMenu.classList.toggle('hidden');

            const icon =
                mobileMenuBtn.querySelector('i');


            if (mobileMenu.classList.contains('hidden')) {

                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');

            } else {

                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');

            }

        });


        /* =====================================================
           CLOSE MOBILE MENU
        ===================================================== */

        mobileMenu.querySelectorAll('a').forEach(function (link) {

            link.addEventListener('click', function () {

                mobileMenu.classList.add('hidden');

                const icon =
                    mobileMenuBtn.querySelector('i');

                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');

            });

        });


        /* =====================================================
           PROJECT SLIDER
        ===================================================== */

        const slider =
            document.getElementById('project-slider');

        const prevBtn =
            document.getElementById('slider-prev');

        const nextBtn =
            document.getElementById('slider-next');


        if (slider && prevBtn && nextBtn) {


            nextBtn.addEventListener('click', function () {

                slider.scrollBy({

                    left: 400,

                    behavior: 'smooth'

                });

            });


            prevBtn.addEventListener('click', function () {

                slider.scrollBy({

                    left: -400,

                    behavior: 'smooth'

                });

            });

        }


        /* =====================================================
           REVEAL ANIMATION ON SCROLL
        ===================================================== */

        const animatedElements =
            document.querySelectorAll(
                '.animate-fade-up, .animate-fade-right, .animate-fade-left, .animate-scale'
            );


        const observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.style.animationPlayState =
                                'running';

                        }

                    });

                },
                {
                    threshold: 0.12
                }
            );


        animatedElements.forEach(function (element) {

            element.style.animationPlayState = 'paused';

            observer.observe(element);

        });


    });

</script>


</body>
</html>