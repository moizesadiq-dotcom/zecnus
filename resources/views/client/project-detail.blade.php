```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Project Details - ZACNUS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

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
</head>

<body class="bg-dark-bg text-gray-300 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- =========================================================
             SIDEBAR
        ========================================================== -->
        <aside
            class="w-64 bg-dark-hero border-r border-dark-border hidden md:flex flex-col justify-between p-6"
        >

            <div class="space-y-8">

                <!-- LOGO -->
                <div class="flex items-center gap-3">

                    <div class="h-8 w-8 bg-accent rounded-lg flex items-center justify-center p-1 shadow-md shadow-accent/20">

                        <img
                            src="{{ asset('image/logo-mark.png') }}"
                            alt="ZACNUS"
                            class="w-full h-full object-contain"
                        >

                    </div>

                    <span class="text-lg font-extrabold tracking-wider text-white uppercase">
                        ZACNUS Portal
                    </span>

                </div>


                <!-- NAVIGATION -->
                <nav class="space-y-2 text-xs font-semibold">

                    <!-- OVERVIEW -->
                    <a
                        href="{{ route('client.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl
                        {{ request()->routeIs('client.dashboard')
                            ? 'bg-accent text-white shadow-lg shadow-accent/20'
                            : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                    >
                        <i class="fa-solid fa-chart-pie"></i>
                        Overview
                    </a>


                    <!-- MY PROJECTS -->
                    <a
                        href="{{ route('client.projects') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl
                        {{ request()->routeIs('client.projects', 'client.project.detail')
                            ? 'bg-accent text-white shadow-lg shadow-accent/20'
                            : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                    >
                        <i class="fa-solid fa-code"></i>
                        My Projects
                    </a>


                    <!-- SERVICES -->
                    <a
                        href="{{ route('client.services') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl
                        {{ request()->routeIs('client.services')
                            ? 'bg-accent text-white shadow-lg shadow-accent/20'
                            : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                    >
                        <i class="fa-solid fa-briefcase"></i>
                        Services
                    </a>


                    <!-- INVOICES -->
                    <a
                        href="{{ route('client.invoices') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl
                        {{ request()->routeIs('client.invoices')
                            ? 'bg-accent text-white shadow-lg shadow-accent/20'
                            : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                    >
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        Invoices
                    </a>


                    <!-- SUPPORT TICKETS -->
                    <a
                        href="{{ route('client.support') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl
                        {{ request()->routeIs('client.support')
                            ? 'bg-accent text-white shadow-lg shadow-accent/20'
                            : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                    >
                        <i class="fa-solid fa-headset"></i>
                        Support Tickets
                    </a>


                    <!-- PROFILE SETTINGS -->
                    <a
                        href="{{ route('client.profile') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl
                        {{ request()->routeIs('client.profile')
                            ? 'bg-accent text-white shadow-lg shadow-accent/20'
                            : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                    >
                        <i class="fa-solid fa-user-gear"></i>
                        Profile Settings
                    </a>

                </nav>

            </div>


            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">

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
        <main class="flex-1 overflow-y-auto p-8 space-y-8">

            <!-- HEADER -->
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b border-dark-border gap-4"
            >

                <div>

                    <div class="flex items-center gap-3 mb-2">

                        <a
                            href="{{ route('client.projects') }}"
                            class="text-xs text-gray-400 hover:text-white"
                        >
                            <i class="fa-solid fa-arrow-left mr-1"></i>
                            Back to Projects
                        </a>

                        <span
                            class="text-xs px-2.5 py-0.5 rounded bg-blue-500/10 text-blue-400 font-bold"
                        >
                            In Progress
                        </span>

                    </div>


                    <h1 class="text-2xl font-extrabold text-white">
                        {{ $project->title ?? 'E-Commerce Platform Development' }}
                    </h1>

                    <p class="text-xs text-gray-400 mt-1">
                        Detailed overview, timeline, milestones, and updates for this project.
                    </p>

                </div>


                <div class="text-right">

                    <span class="text-[10px] text-gray-400 uppercase tracking-wider block">
                        Deadline
                    </span>

                    <span class="text-xs font-bold text-red-400">
                        {{ $project->deadline ?? '30 Sep 2026' }}
                    </span>

                </div>

            </div>


            <!-- =====================================================
                 PROJECT CONTENT
            ====================================================== -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- LEFT -->
                <div class="lg:col-span-2 space-y-6">


                    <!-- PROJECT MILESTONES -->
                    <div
                        class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
                    >

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4">
                            Project Milestones
                        </h3>


                        <div class="space-y-4">

                            <!-- MILESTONE 1 -->
                            <div
                                class="flex items-start gap-4 p-3 bg-dark-bg rounded-xl border border-dark-border"
                            >

                                <div
                                    class="w-7 h-7 rounded-full bg-green-500/10 text-green-400 flex items-center justify-center text-xs font-bold mt-0.5"
                                >
                                    <i class="fa-solid fa-check"></i>
                                </div>

                                <div class="flex-1">

                                    <h4 class="text-xs font-bold text-white">
                                        Phase 1: UI/UX Wireframing & Design
                                    </h4>

                                    <p class="text-[10px] text-gray-400 mt-0.5">
                                        Completed on 20 Aug 2026
                                    </p>

                                </div>

                                <span
                                    class="text-[10px] font-bold text-green-400 bg-green-500/10 px-2.5 py-1 rounded"
                                >
                                    Done
                                </span>

                            </div>


                            <!-- MILESTONE 2 -->
                            <div
                                class="flex items-start gap-4 p-3 bg-dark-bg rounded-xl border border-dark-border"
                            >

                                <div
                                    class="w-7 h-7 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center text-xs font-bold mt-0.5"
                                >
                                    <i class="fa-solid fa-spinner"></i>
                                </div>

                                <div class="flex-1">

                                    <h4 class="text-xs font-bold text-white">
                                        Phase 2: Backend API & Database Setup
                                    </h4>

                                    <p class="text-[10px] text-gray-400 mt-0.5">
                                        Expected by 10 Sep 2026
                                    </p>

                                </div>

                                <span
                                    class="text-[10px] font-bold text-blue-400 bg-blue-500/10 px-2.5 py-1 rounded"
                                >
                                    In Progress
                                </span>

                            </div>


                            <!-- MILESTONE 3 -->
                            <div
                                class="flex items-start gap-4 p-3 bg-dark-bg rounded-xl border border-dark-border"
                            >

                                <div
                                    class="w-7 h-7 rounded-full bg-gray-500/10 text-gray-400 flex items-center justify-center text-xs font-bold mt-0.5"
                                >
                                    <i class="fa-solid fa-clock"></i>
                                </div>

                                <div class="flex-1">

                                    <h4 class="text-xs font-bold text-white">
                                        Phase 3: QA Testing & Final Deployment
                                    </h4>

                                    <p class="text-[10px] text-gray-400 mt-0.5">
                                        Expected by 30 Sep 2026
                                    </p>

                                </div>

                                <span
                                    class="text-[10px] font-bold text-gray-400 bg-gray-500/10 px-2.5 py-1 rounded"
                                >
                                    Pending
                                </span>

                            </div>

                        </div>

                    </div>


                    <!-- PROJECT REQUIREMENTS -->
                    <div
                        class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
                    >

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-3">
                            Project Requirements & Scope
                        </h3>

                        <p class="text-xs text-gray-400 leading-relaxed">
                            {{ $project->description ?? 'Fully functional high-performance e-commerce solution with integrated payment gateways, user dashboard, automated invoicing, and inventory tracking system.' }}
                        </p>

                    </div>


                    <!-- PROJECT UPDATES -->
                    <div
                        class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
                    >

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4">
                            Project Updates & Comments
                        </h3>


                        <div class="space-y-4">

                            <!-- UPDATE 1 -->
                            <div
                                class="p-3.5 bg-dark-bg rounded-xl border border-dark-border"
                            >

                                <div class="flex justify-between items-center mb-1">

                                    <span class="text-xs font-bold text-white">
                                        ZACNUS Lead Developer
                                    </span>

                                    <span class="text-[10px] text-gray-500">
                                        2 days ago
                                    </span>

                                </div>

                                <p class="text-xs text-gray-400">
                                    Database architecture has been finalized. Moving to API endpoints development.
                                </p>

                            </div>


                            <!-- UPDATE 2 -->
                            <div
                                class="p-3.5 bg-dark-bg rounded-xl border border-dark-border"
                            >

                                <div class="flex justify-between items-center mb-1">

                                    <span class="text-xs font-bold text-white">
                                        Client Account
                                    </span>

                                    <span class="text-[10px] text-gray-500">
                                        5 days ago
                                    </span>

                                </div>

                                <p class="text-xs text-gray-400">
                                    Looks great! Please ensure secure hashing for user authentication.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT -->
                <div class="space-y-6">


                    <!-- PROJECT TIMELINE -->
                    <div
                        class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
                    >

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4">
                            Project Timeline
                        </h3>


                        <div class="space-y-3 text-xs">

                            <div
                                class="flex justify-between pb-2 border-b border-dark-border"
                            >

                                <span class="text-gray-400">
                                    Start Date:
                                </span>

                                <span class="text-white font-bold">
                                    {{ $project->start_date ?? '15 Aug 2026' }}
                                </span>

                            </div>


                            <div
                                class="flex justify-between pb-2 border-b border-dark-border"
                            >

                                <span class="text-gray-400">
                                    Target Deadline:
                                </span>

                                <span class="text-red-400 font-bold">
                                    {{ $project->deadline ?? '30 Sep 2026' }}
                                </span>

                            </div>


                            <div class="flex justify-between">

                                <span class="text-gray-400">
                                    Overall Progress:
                                </span>

                                <span class="text-green-400 font-bold">
                                    {{ $project->progress ?? 50 }}%
                                </span>

                            </div>

                        </div>

                    </div>


                    <!-- ASSIGNED TEAM -->
                    <div
                        class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
                    >

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4">
                            Assigned Team
                        </h3>


                        <div class="space-y-3">

                            <!-- TEAM MEMBER 1 -->
                            <div
                                class="flex items-center gap-3 p-2 bg-dark-bg rounded-xl border border-dark-border"
                            >

                                <div
                                    class="w-8 h-8 rounded-full bg-accent/20 text-accent font-bold text-xs flex items-center justify-center border border-accent/30"
                                >
                                    ZM
                                </div>

                                <div>

                                    <h4 class="text-xs font-bold text-white">
                                        Zain Mushtaq
                                    </h4>

                                    <p class="text-[10px] text-gray-400">
                                        Lead Architect
                                    </p>

                                </div>

                            </div>


                            <!-- TEAM MEMBER 2 -->
                            <div
                                class="flex items-center gap-3 p-2 bg-dark-bg rounded-xl border border-dark-border"
                            >

                                <div
                                    class="w-8 h-8 rounded-full bg-blue-500/20 text-blue-400 font-bold text-xs flex items-center justify-center border border-blue-500/30"
                                >
                                    AZ
                                </div>

                                <div>

                                    <h4 class="text-xs font-bold text-white">
                                        Ali Zohaib
                                    </h4>

                                    <p class="text-[10px] text-gray-400">
                                        Full-Stack Dev
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>
</html>
```
