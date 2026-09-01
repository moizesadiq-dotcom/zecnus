<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Client Dashboard - ZACNUS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    },

                    colors: {
                        accent: {
                            DEFAULT: '#E61C1C',
                            hover: '#C81313'
                        },

                        dark: {
                            bg: '#0D0F12',
                            card: '#16191E',
                            border: '#242830',
                            hero: '#121419'
                        }
                    }
                }
            }
        }
    </script>

    <script>
        (function () {
            const savedTheme = localStorage.getItem('zacnus-theme');

            const systemPrefersLight =
                window.matchMedia &&
                window.matchMedia('(prefers-color-scheme: light)').matches;

            const theme =
                savedTheme ||
                (systemPrefersLight ? 'light' : 'dark');

            document.documentElement.classList.toggle(
                'light-theme',
                theme === 'light'
            );

            document.documentElement.dataset.theme = theme;
        })();
    </script>

    <style>
        :root {
            color-scheme: dark;

            --zac-bg: #0D0F12;
            --zac-card: #16191E;
            --zac-secondary-bg: #121419;
            --zac-border: #242830;
            --zac-text: #FFFFFF;
            --zac-secondary-text: #B8BDC7;
            --zac-muted: #8B919C;
            --zac-accent: #E61C1C;
            --zac-accent-hover: #C81313;
            --zac-shadow: rgba(0, 0, 0, 0.28);
        }

        html.light-theme {
            color-scheme: light;

            --zac-bg: #F8FAFC;
            --zac-card: #FFFFFF;
            --zac-secondary-bg: #F1F5F9;
            --zac-border: #E2E8F0;
            --zac-text: #111827;
            --zac-secondary-text: #374151;
            --zac-muted: #6B7280;
            --zac-accent: #E61C1C;
            --zac-accent-hover: #C81313;
            --zac-shadow: rgba(15, 23, 42, 0.08);
        }

        html,
        body {
            background-color: var(--zac-bg);
            color: var(--zac-secondary-text);

            transition:
                background-color 220ms ease,
                color 220ms ease;
        }

        body {
            min-height: 100vh;
        }

        html.light-theme .bg-dark-bg {
            background-color: var(--zac-bg) !important;
        }

        html.light-theme .bg-dark-card {
            background-color: var(--zac-card) !important;
        }

        html.light-theme .bg-dark-hero {
            background-color: var(--zac-secondary-bg) !important;
        }

        html.light-theme .border-dark-border {
            border-color: var(--zac-border) !important;
        }

        html.light-theme .text-white {
            color: var(--zac-text) !important;
        }

        html.light-theme .text-gray-300 {
            color: var(--zac-secondary-text) !important;
        }

        html.light-theme .text-gray-400 {
            color: var(--zac-secondary-text) !important;
        }

        html.light-theme .text-gray-500 {
            color: var(--zac-muted) !important;
        }

        html.light-theme .text-gray-600 {
            color: #4B5563 !important;
        }

        html.light-theme .hover\:bg-dark-card:hover {
            background-color: var(--zac-card) !important;
        }

        html.light-theme .hover\:text-white:hover {
            color: var(--zac-text) !important;
        }

        html.light-theme .hover\:border-gray-600:hover {
            border-color: #CBD5E1 !important;
        }

        html.light-theme .hover\:text-red-400:hover {
            color: var(--zac-accent-hover) !important;
        }

        html.light-theme .shadow-md,
        html.light-theme .shadow-xl,
        html.light-theme .shadow-sm {
            --tw-shadow-color: var(--zac-shadow);
        }

        .bg-accent {
            background-color: var(--zac-accent) !important;
        }

        .text-accent {
            color: var(--zac-accent) !important;
        }

        .border-accent {
            border-color: var(--zac-accent) !important;
        }

        .hover\:bg-accent:hover {
            background-color: var(--zac-accent-hover) !important;
        }

        .zac-theme-toggle {
            position: relative;
            width: 42px;
            height: 42px;
            flex: 0 0 42px;

            border: 1px solid var(--zac-border);
            border-radius: 14px;

            background: var(--zac-card);
            color: var(--zac-secondary-text);

            display: inline-flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;

            box-shadow: 0 8px 24px var(--zac-shadow);

            transition:
                background-color 220ms ease,
                border-color 220ms ease,
                color 220ms ease,
                transform 180ms ease,
                box-shadow 220ms ease;
        }

        .zac-theme-toggle:hover {
            color: var(--zac-accent);
            border-color: rgba(230, 28, 28, 0.45);
            transform: translateY(-1px);
        }

        .zac-theme-toggle:active {
            transform: translateY(0) scale(0.97);
        }

        .zac-theme-toggle:focus-visible {
            outline: 2px solid var(--zac-accent);
            outline-offset: 3px;
        }

        .zac-theme-toggle i {
            font-size: 15px;

            transition:
                transform 220ms ease,
                opacity 180ms ease;
        }

        .zac-theme-toggle .fa-sun {
            display: none;
        }

        html.light-theme .zac-theme-toggle .fa-moon {
            display: none;
        }

        html.light-theme .zac-theme-toggle .fa-sun {
            display: inline-block;
        }

        .zac-account-badge {
            background-color: var(--zac-card) !important;
            border-color: var(--zac-border) !important;
            color: var(--zac-text) !important;

            transition:
                background-color 220ms ease,
                border-color 220ms ease,
                color 220ms ease;
        }

        input,
        select,
        textarea {
            transition:
                background-color 220ms ease,
                color 220ms ease,
                border-color 220ms ease;
        }

        html.light-theme input,
        html.light-theme select,
        html.light-theme textarea {
            background-color: var(--zac-card);
            color: var(--zac-text);
            border-color: var(--zac-border);
        }

        html.light-theme input::placeholder,
        html.light-theme textarea::placeholder {
            color: var(--zac-muted);
        }

        @keyframes zacnusFadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .zac-reveal {
            animation: zacnusFadeUp 500ms ease both;
        }

        .zac-reveal-delay-1 {
            animation-delay: 60ms;
        }

        .zac-reveal-delay-2 {
            animation-delay: 120ms;
        }

        .zac-reveal-delay-3 {
            animation-delay: 180ms;
        }

        main > div:not(.zac-theme-control-row) .bg-dark-card {
            transition:
                background-color 220ms ease,
                border-color 220ms ease,
                box-shadow 220ms ease,
                transform 180ms ease;
        }

        main > div:not(.zac-theme-control-row) .bg-dark-card:hover {
            transform: translateY(-2px);
        }

        @media (prefers-reduced-motion: reduce) {
            html,
            body,
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>

</head>


<body class="bg-dark-bg text-gray-300 font-sans antialiased">


<div class="flex min-h-screen">


    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside
        class="w-64 bg-dark-hero border-r border-dark-border hidden md:flex flex-col justify-between p-6"
    >

        <div class="space-y-8">


            <!-- LOGO -->

            <div class="flex items-center gap-3">

                <div
                    class="h-9 w-9 bg-accent rounded-lg flex items-center justify-center p-1 shadow-md shadow-accent/20"
                >

                    <img
                        src="{{ asset('image/logo-mark.png') }}"
                        alt="ZACNUS"
                        class="w-full h-full object-contain"
                    >

                </div>


                <div>

                    <span class="text-lg font-extrabold tracking-wider text-white uppercase">
                        ZACNUS
                    </span>

                    <p class="text-[9px] text-gray-500 uppercase tracking-widest">
                        Client Portal
                    </p>

                </div>

            </div>


            <!-- NAVIGATION -->

            <nav class="space-y-2 text-xs font-semibold">


                <!-- DASHBOARD -->

                <a
                    href="{{ route('client.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-accent text-white shadow-lg shadow-accent/20"
                >

                    <i class="fa-solid fa-chart-pie w-4"></i>

                    Overview

                </a>


                <!-- PROJECTS -->

                <a
                    href="{{ route('client.projects') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-dark-card hover:text-white transition"
                >

                    <i class="fa-solid fa-code w-4"></i>

                    My Projects

                </a>


                <!-- SERVICES -->

                <a
                    href="{{ route('client.services') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-dark-card hover:text-white transition"
                >

                    <i class="fa-solid fa-briefcase w-4"></i>

                    Services

                </a>


                <!-- INVOICES -->

                <a
                    href="{{ route('client.invoices') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-dark-card hover:text-white transition"
                >

                    <i class="fa-solid fa-file-invoice-dollar w-4"></i>

                    Invoices

                </a>


                <!-- SUPPORT -->

                <a
                    href="{{ route('client.support') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-dark-card hover:text-white transition"
                >

                    <i class="fa-solid fa-headset w-4"></i>

                    Support Tickets

                </a>


                <!-- PROFILE -->

                <a
                    href="{{ route('client.profile') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-dark-card hover:text-white transition"
                >

                    <i class="fa-solid fa-user-gear w-4"></i>

                    Profile Settings

                </a>

            </nav>

        </div>


        <!-- LOGOUT -->

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 text-xs font-semibold transition cursor-pointer"
            >

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </button>

        </form>

    </aside>



    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main class="flex-1 overflow-y-auto p-5 md:p-8">


        <!-- =====================================================
             HEADER
        ====================================================== -->

        <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b border-dark-border gap-4"
        >

            <div>

                <p class="text-xs text-accent font-bold uppercase tracking-widest mb-2">
                    Client Dashboard
                </p>

                <h1 class="text-2xl md:text-3xl font-extrabold text-white">

                    Welcome back,
                    {{ $user->name ?? 'Client' }}!

                </h1>

                <p class="text-xs text-gray-400 mt-2 max-w-2xl">

                    Here's an overview of your projects, invoices,
                    deadlines and support activity.

                </p>

            </div>


            <!-- ACCOUNT BADGE -->

            <div class="flex items-center gap-3">

                <button
                    type="button"
                    id="zacnusThemeToggle"
                    class="zac-theme-toggle"
                    aria-label="Switch to light mode"
                    title="Switch to light mode"
                >

                    <i class="fa-solid fa-moon" aria-hidden="true"></i>

                    <i class="fa-solid fa-sun" aria-hidden="true"></i>

                </button>

                <div
                    class="zac-account-badge text-xs bg-dark-card border border-dark-border px-4 py-3 rounded-xl text-white font-medium flex items-center shadow-sm"
                >

                    <i class="fa-solid fa-circle text-[8px] text-green-500 mr-2"></i>

                    Client Account

                </div>

            </div>

        </div>



        <!-- =====================================================
             SUCCESS MESSAGE
        ====================================================== -->

        @if(session('success'))

            <div
                class="mt-6 bg-green-900/30 border border-green-700/50 text-green-300 px-5 py-4 rounded-xl"
            >

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-circle-check"></i>

                    <span class="text-sm">
                        {{ session('success') }}
                    </span>

                </div>

            </div>

        @endif



        <!-- =====================================================
             ERROR MESSAGE
        ====================================================== -->

        @if($errors->any())

            <div
                class="mt-6 bg-red-900/30 border border-red-700/50 text-red-300 px-5 py-4 rounded-xl"
            >

                <div class="flex items-start gap-3">

                    <i class="fa-solid fa-circle-exclamation mt-1"></i>

                    <div>

                        <p class="font-bold text-sm mb-2">
                            Please fix the following:
                        </p>

                        <ul class="list-disc ml-5 text-xs space-y-1">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif



        <!-- =====================================================
             STATISTICS
        ====================================================== -->

        @php

            $totalProjects = isset($projects)
                ? $projects->count()
                : 0;

            $inProgressProjects = isset($projects)
                ? $projects->filter(function ($project) {
                    return strtolower(trim($project->status ?? '')) === 'in progress';
                })->count()
                : 0;

            $completedProjects = isset($projects)
                ? $projects->filter(function ($project) {
                    return strtolower(trim($project->status ?? '')) === 'completed';
                })->count()
                : 0;

            $pendingInvoices = isset($invoices)
                ? $invoices->filter(function ($invoice) {
                    return in_array(
                        strtolower(trim($invoice->status ?? '')),
                        ['pending', 'unpaid']
                    );
                })->count()
                : 0;

            $openTickets = isset($tickets)
                ? $tickets->filter(function ($ticket) {
                    return in_array(
                        strtolower(trim($ticket->status ?? '')),
                        ['pending', 'open', 'in progress']
                    );
                })->count()
                : 0;

        @endphp


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-8 zac-reveal zac-reveal-delay-1">


            <!-- TOTAL PROJECTS -->

            <div
                class="bg-dark-card border border-dark-border p-5 rounded-2xl shadow-md"
            >

                <div class="flex justify-between items-start">

                    <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">
                        Total Projects
                    </span>

                    <div
                        class="w-9 h-9 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-code"></i>

                    </div>

                </div>


                <div class="text-3xl font-extrabold text-white mt-4">

                    {{ $totalProjects }}

                </div>


                <p class="text-[10px] text-gray-500 mt-2">
                    Projects assigned to you
                </p>

            </div>



            <!-- IN PROGRESS -->

            <div
                class="bg-dark-card border border-dark-border p-5 rounded-2xl shadow-md"
            >

                <div class="flex justify-between items-start">

                    <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">
                        In Progress
                    </span>

                    <div
                        class="w-9 h-9 rounded-xl bg-yellow-500/10 text-yellow-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-spinner"></i>

                    </div>

                </div>


                <div class="text-3xl font-extrabold text-white mt-4">

                    {{ $inProgressProjects }}

                </div>


                <p class="text-[10px] text-gray-500 mt-2">
                    Currently being worked on
                </p>

            </div>



            <!-- COMPLETED -->

            <div
                class="bg-dark-card border border-dark-border p-5 rounded-2xl shadow-md"
            >

                <div class="flex justify-between items-start">

                    <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">
                        Completed
                    </span>

                    <div
                        class="w-9 h-9 rounded-xl bg-green-500/10 text-green-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-check-double"></i>

                    </div>

                </div>


                <div class="text-3xl font-extrabold text-white mt-4">

                    {{ $completedProjects }}

                </div>


                <p class="text-[10px] text-gray-500 mt-2">
                    Successfully completed
                </p>

            </div>



            <!-- SUPPORT -->

            <div
                class="bg-dark-card border border-dark-border p-5 rounded-2xl shadow-md"
            >

                <div class="flex justify-between items-start">

                    <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">
                        Open Tickets
                    </span>

                    <div
                        class="w-9 h-9 rounded-xl bg-red-500/10 text-red-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-headset"></i>

                    </div>

                </div>


                <div class="text-3xl font-extrabold text-white mt-4">

                    {{ $openTickets }}

                </div>


                <p class="text-[10px] text-gray-500 mt-2">
                    Support requests
                </p>

            </div>

        </div>



        <!-- =====================================================
             PROJECTS + DEADLINES
        ====================================================== -->

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8 zac-reveal zac-reveal-delay-2">


            <!-- PROJECT PROGRESS -->

            <div
                class="lg:col-span-2 bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
            >

                <div class="flex justify-between items-center mb-6">

                    <div>

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">
                            Project Progress
                        </h3>

                        <p class="text-[10px] text-gray-500 mt-1">
                            Your assigned projects
                        </p>

                    </div>


                    <a
                        href="{{ route('client.projects') }}"
                        class="text-xs text-accent font-bold hover:underline"
                    >

                        View All

                        <i class="fa-solid fa-arrow-right ml-1"></i>

                    </a>

                </div>



                <div class="space-y-4">


                    @forelse($projects ?? [] as $project)


                        <!-- PROJECT CARD -->

                        <div
                            class="bg-dark-bg p-5 rounded-xl border border-dark-border hover:border-gray-600 transition"
                        >

                            <div
                                class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-4"
                            >

                                <div>

                                    <h4 class="text-sm font-bold text-white">

                                        {{ $project->title }}

                                    </h4>

                                    <p class="text-[10px] text-gray-500 mt-1">

                                        {{ $project->category ?? 'General Project' }}

                                    </p>

                                </div>


                                @php

                                    $status = strtolower(
                                        trim($project->status ?? 'pending')
                                    );

                                @endphp


                                @if($status === 'completed')

                                    <span
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-3 py-1 rounded-full bg-green-500/10 text-green-400"
                                    >

                                        <i class="fa-solid fa-check"></i>

                                        Completed

                                    </span>

                                @elseif($status === 'in progress')

                                    <span
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-3 py-1 rounded-full bg-blue-500/10 text-blue-400"
                                    >

                                        <i class="fa-solid fa-spinner"></i>

                                        In Progress

                                    </span>

                                @elseif($status === 'pending')

                                    <span
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-3 py-1 rounded-full bg-yellow-500/10 text-yellow-400"
                                    >

                                        <i class="fa-solid fa-clock"></i>

                                        Pending

                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-3 py-1 rounded-full bg-gray-500/10 text-gray-400"
                                    >

                                        {{ ucfirst($project->status ?? 'Unknown') }}

                                    </span>

                                @endif

                            </div>



                            <!-- PROGRESS -->

                            @php

                                $progress = is_numeric($project->progress)
                                    ? (int) $project->progress
                                    : 0;

                                $progress = max(0, min(100, $progress));

                            @endphp


                            <div class="flex justify-between items-center mb-2">

                                <span class="text-[10px] text-gray-500">
                                    Progress
                                </span>

                                <span class="text-[10px] font-bold text-white">
                                    {{ $progress }}%
                                </span>

                            </div>


                            <div
                                class="w-full bg-dark-card rounded-full h-2 border border-dark-border overflow-hidden"
                            >

                                <div
                                    class="bg-accent h-2 rounded-full transition-all duration-500"
                                    style="width: {{ $progress }}%"
                                ></div>

                            </div>



                            <!-- PROJECT META -->

                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4"
                            >

                                <div
                                    class="flex items-center gap-2 text-[10px] text-gray-400"
                                >

                                    <i class="fa-solid fa-money-bill text-green-400"></i>

                                    <span>

                                        Budget:

                                        <strong class="text-white">

                                            ${{ number_format((float) ($project->budget ?? 0), 2) }}

                                        </strong>

                                    </span>

                                </div>


                                <div
                                    class="flex items-center gap-2 text-[10px] text-gray-400"
                                >

                                    <i class="fa-regular fa-calendar text-red-400"></i>

                                    <span>

                                        Deadline:

                                        <strong class="text-white">

                                            {{ $project->deadline
                                                ? \Carbon\Carbon::parse($project->deadline)->format('d M Y')
                                                : 'Not Set'
                                            }}

                                        </strong>

                                    </span>

                                </div>

                            </div>



                            <!-- PROJECT DETAIL BUTTON -->

                            <div class="mt-4 pt-4 border-t border-dark-border">

                                <a
                                    href="{{ route('client.project.detail', $project->id) }}"
                                    class="inline-flex items-center gap-2 text-[10px] font-bold text-accent hover:text-red-400 transition"
                                >

                                    View Project Details

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                            </div>

                        </div>


                    @empty


                        <!-- NO PROJECTS -->

                        <div
                            class="text-center py-12 border border-dashed border-dark-border rounded-xl"
                        >

                            <div
                                class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center mb-4"
                            >

                                <i class="fa-solid fa-folder-open text-xl"></i>

                            </div>


                            <h4 class="text-sm font-bold text-white mb-2">

                                No Projects Assigned

                            </h4>


                            <p class="text-xs text-gray-500">

                                Your assigned projects will appear here.

                            </p>

                        </div>


                    @endforelse

                </div>

            </div>



            <!-- UPCOMING DEADLINES -->

            <div
                class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
            >

                <div class="flex justify-between items-center mb-6">

                    <div>

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">
                            Upcoming Deadlines
                        </h3>

                        <p class="text-[10px] text-gray-500 mt-1">
                            Project delivery dates
                        </p>

                    </div>

                </div>


                <div class="space-y-3">


                    @php

                        $upcomingProjects = collect($projects ?? [])
                            ->filter(function ($project) {

                                return !empty($project->deadline);

                            })
                            ->sortBy('deadline')
                            ->take(5);

                    @endphp


                    @forelse($upcomingProjects as $project)


                        <div
                            class="flex items-center justify-between gap-3 p-4 bg-dark-bg rounded-xl border border-dark-border"
                        >

                            <div class="flex items-center gap-3 min-w-0">

                                <div
                                    class="w-9 h-9 flex-shrink-0 rounded-lg bg-accent/10 text-accent flex items-center justify-center"
                                >

                                    <i class="fa-regular fa-calendar"></i>

                                </div>


                                <div class="min-w-0">

                                    <h4
                                        class="text-xs font-bold text-white truncate"
                                    >

                                        {{ $project->title }}

                                    </h4>

                                    <p class="text-[10px] text-gray-500 mt-1">

                                        Delivery Date

                                    </p>

                                </div>

                            </div>


                            <span
                                class="flex-shrink-0 text-[9px] font-bold text-red-400 bg-red-500/10 px-2.5 py-1.5 rounded-md"
                            >

                                {{ \Carbon\Carbon::parse($project->deadline)->format('d M') }}

                            </span>

                        </div>


                    @empty


                        <div
                            class="text-center py-10 text-gray-500"
                        >

                            <i class="fa-regular fa-calendar-xmark text-2xl mb-3"></i>

                            <p class="text-xs">
                                No upcoming deadlines.
                            </p>

                        </div>


                    @endforelse

                </div>

            </div>

        </div>



        <!-- =====================================================
             INVOICES + TICKETS
        ====================================================== -->

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6 zac-reveal zac-reveal-delay-3">


            <!-- RECENT INVOICES -->

            <div
                class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
            >

                <div class="flex justify-between items-center mb-5">

                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">

                        Recent Invoices

                    </h3>


                    <a
                        href="{{ route('client.invoices') }}"
                        class="text-xs text-accent font-bold hover:underline"
                    >

                        View All

                    </a>

                </div>


                <div class="space-y-3">


                    @forelse(($invoices ?? collect())->take(5) as $invoice)


                        <div
                            class="flex items-center justify-between gap-3 p-4 bg-dark-bg rounded-xl border border-dark-border"
                        >

                            <div>

                                <p class="text-xs font-bold text-white">

                                    {{ $invoice->invoice_number ?? 'Invoice' }}

                                </p>

                                <p class="text-[10px] text-gray-500 mt-1">

                                    Due:

                                    {{ $invoice->due_date
                                        ? \Carbon\Carbon::parse($invoice->due_date)->format('d M Y')
                                        : 'N/A'
                                    }}

                                </p>

                            </div>


                            <div class="text-right">

                                <p class="text-xs font-bold text-white">

                                    ${{ number_format((float) ($invoice->amount ?? 0), 2) }}

                                </p>


                                @php

                                    $invoiceStatus = strtolower(
                                        trim($invoice->status ?? '')
                                    );

                                @endphp


                                @if($invoiceStatus === 'paid')

                                    <span class="text-[9px] text-green-400">
                                        Paid
                                    </span>

                                @else

                                    <span class="text-[9px] text-yellow-400">

                                        {{ ucfirst($invoice->status ?? 'Pending') }}

                                    </span>

                                @endif

                            </div>

                        </div>


                    @empty


                        <div
                            class="text-center py-8 text-gray-500 text-xs"
                        >

                            No invoices available.

                        </div>


                    @endforelse

                </div>

            </div>



            <!-- SUPPORT TICKETS -->

            <div
                class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
            >

                <div class="flex justify-between items-center mb-5">

                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">

                        Support Tickets

                    </h3>


                    <a
                        href="{{ route('client.support') }}"
                        class="text-xs text-accent font-bold hover:underline"
                    >

                        View All

                    </a>

                </div>


                <div class="space-y-3">


                    @forelse(($tickets ?? collect())->take(5) as $ticket)


                        <div
                            class="flex items-center justify-between gap-3 p-4 bg-dark-bg rounded-xl border border-dark-border"
                        >

                            <div class="min-w-0">

                                <p class="text-xs font-bold text-white truncate">

                                    {{ $ticket->subject }}

                                </p>

                                <p class="text-[10px] text-gray-500 mt-1">

                                    {{ $ticket->created_at
                                        ? $ticket->created_at->format('d M Y')
                                        : ''
                                    }}

                                </p>

                            </div>


                            @php

                                $ticketStatus = strtolower(
                                    trim($ticket->status ?? 'pending')
                                );

                            @endphp


                            @if($ticketStatus === 'resolved' || $ticketStatus === 'closed')

                                <span
                                    class="flex-shrink-0 text-[9px] font-bold px-2.5 py-1 rounded-md bg-green-500/10 text-green-400"
                                >

                                    {{ ucfirst($ticket->status) }}

                                </span>

                            @elseif($ticketStatus === 'in progress')

                                <span
                                    class="flex-shrink-0 text-[9px] font-bold px-2.5 py-1 rounded-md bg-blue-500/10 text-blue-400"
                                >

                                    In Progress

                                </span>

                            @else

                                <span
                                    class="flex-shrink-0 text-[9px] font-bold px-2.5 py-1 rounded-md bg-yellow-500/10 text-yellow-400"
                                >

                                    {{ ucfirst($ticket->status ?? 'Pending') }}

                                </span>

                            @endif

                        </div>


                    @empty


                        <div
                            class="text-center py-8 text-gray-500 text-xs"
                        >

                            No support tickets yet.

                        </div>


                    @endforelse

                </div>

            </div>

        </div>



        <!-- =====================================================
             FOOTER
        ====================================================== -->

        <div
            class="border-t border-dark-border mt-8 pt-6 pb-4 text-center"
        >

            <p class="text-[10px] text-gray-600">

                © {{ date('Y') }} ZACNUS. All rights reserved.

            </p>

        </div>


    </main>

</div>



<script>

    document.addEventListener('DOMContentLoaded', function () {

        const root = document.documentElement;

        const toggle = document.getElementById('zacnusThemeToggle');


        if (!toggle) {
            return;
        }


        function getCurrentTheme() {

            return root.classList.contains('light-theme')
                ? 'light'
                : 'dark';

        }


        function updateToggle(theme) {

            const isLight = theme === 'light';


            toggle.setAttribute(
                'aria-label',
                isLight
                    ? 'Switch to dark mode'
                    : 'Switch to light mode'
            );


            toggle.setAttribute(
                'title',
                isLight
                    ? 'Switch to dark mode'
                    : 'Switch to light mode'
            );

        }


        updateToggle(getCurrentTheme());


        toggle.addEventListener('click', function () {

            const nextTheme =
                getCurrentTheme() === 'light'
                    ? 'dark'
                    : 'light';


            root.classList.toggle(
                'light-theme',
                nextTheme === 'light'
            );


            root.dataset.theme = nextTheme;


            localStorage.setItem(
                'zacnus-theme',
                nextTheme
            );


            updateToggle(nextTheme);

        });


        const mediaQuery =
            window.matchMedia('(prefers-color-scheme: light)');


        function handleSystemThemeChange(event) {

            if (localStorage.getItem('zacnus-theme')) {
                return;
            }


            const systemTheme =
                event.matches
                    ? 'light'
                    : 'dark';


            root.classList.toggle(
                'light-theme',
                systemTheme === 'light'
            );


            root.dataset.theme = systemTheme;


            updateToggle(systemTheme);

        }


        if (mediaQuery.addEventListener) {

            mediaQuery.addEventListener(
                'change',
                handleSystemThemeChange
            );

        } else if (mediaQuery.addListener) {

            mediaQuery.addListener(
                'change',
                handleSystemThemeChange
            );

        }

    });

</script>


</body>
</html>