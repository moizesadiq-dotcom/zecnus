```blade
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Projects - ZACNUS</title>

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

                <div
                    class="h-8 w-8 bg-accent rounded-lg flex items-center justify-center p-1 shadow-md shadow-accent/20"
                >

                    <img
                        src="{{ asset('image/logo-mark.png') }}"
                        alt="ZACNUS"
                        class="w-full h-full object-contain"
                    >

                </div>


                <span
                    class="text-lg font-extrabold tracking-wider text-white uppercase"
                >
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



                <!-- SUPPORT -->

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



                <!-- PROFILE -->

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

    <main
        class="flex-1 overflow-y-auto p-8 space-y-8"
    >


        <!-- HEADER -->

        <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b border-dark-border gap-4"
        >

            <div>

                <h1 class="text-2xl font-extrabold text-white">
                    My Projects
                </h1>

                <p class="text-xs text-gray-400 mt-1">
                    Track all projects assigned to your account.
                </p>

            </div>


            <div class="flex items-center gap-3">

                <span
                    class="text-xs bg-dark-card border border-dark-border px-3 py-2 rounded-xl text-white font-medium flex items-center shadow-sm"
                >

                    <i
                        class="fa-solid fa-circle text-[8px] text-green-500 mr-2"
                    ></i>

                    Client Account

                </span>

            </div>

        </div>



        <!-- =====================================================
             PROJECT COUNT
        ====================================================== -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">


            <!-- TOTAL PROJECTS -->

            <div
                class="bg-dark-card border border-dark-border rounded-2xl p-5"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs text-gray-500 uppercase tracking-wider">
                            Total Projects
                        </p>

                        <h2 class="text-2xl font-extrabold text-white mt-2">
                            {{ $projects->count() }}
                        </h2>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-accent/10 text-accent flex items-center justify-center"
                    >

                        <i class="fa-solid fa-code"></i>

                    </div>

                </div>

            </div>


            <!-- ACTIVE PROJECTS -->

            <div
                class="bg-dark-card border border-dark-border rounded-2xl p-5"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs text-gray-500 uppercase tracking-wider">
                            In Progress
                        </p>

                        <h2 class="text-2xl font-extrabold text-white mt-2">

                            {{ $projects->where('status', 'In Progress')->count() }}

                        </h2>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-spinner"></i>

                    </div>

                </div>

            </div>


            <!-- COMPLETED -->

            <div
                class="bg-dark-card border border-dark-border rounded-2xl p-5"
            >

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs text-gray-500 uppercase tracking-wider">
                            Completed
                        </p>

                        <h2 class="text-2xl font-extrabold text-white mt-2">

                            {{ $projects->where('status', 'Completed')->count() }}

                        </h2>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-green-500/10 text-green-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-circle-check"></i>

                    </div>

                </div>

            </div>


        </div>



        <!-- =====================================================
             PROJECTS TABLE
        ====================================================== -->

        <div
            class="bg-dark-card border border-dark-border rounded-2xl p-6 shadow-xl"
        >


            <div class="flex justify-between items-center mb-6">

                <div>

                    <h3
                        class="text-sm font-bold text-white uppercase tracking-wider"
                    >
                        All Assigned Projects
                    </h3>

                    <p class="text-[11px] text-gray-500 mt-1">
                        Projects assigned specifically to your account.
                    </p>

                </div>


                <span
                    class="px-3 py-1.5 rounded-lg bg-dark-bg border border-dark-border text-xs text-gray-400"
                >

                    {{ $projects->count() }}

                    {{ $projects->count() == 1 ? 'Project' : 'Projects' }}

                </span>

            </div>



            <div class="overflow-x-auto">

                <table class="w-full text-left text-xs text-gray-300">


                    <!-- TABLE HEADER -->

                    <thead
                        class="bg-dark-bg text-gray-500 uppercase tracking-wider border-b border-dark-border"
                    >

                        <tr>

                            <th class="p-3.5 rounded-l-xl">
                                Project Name
                            </th>

                            <th class="p-3.5">
                                Client
                            </th>

                            <th class="p-3.5">
                                Location
                            </th>

                            <th class="p-3.5">
                                Status
                            </th>

                            <th class="p-3.5">
                                Progress
                            </th>

                            <th class="p-3.5">
                                Deadline
                            </th>

                            <th class="p-3.5 rounded-r-xl text-right">
                                Action
                            </th>

                        </tr>

                    </thead>



                    <!-- TABLE BODY -->

                    <tbody class="divide-y divide-dark-border">


                        @forelse($projects as $project)


                            <tr
                                class="hover:bg-dark-bg/40 transition"
                            >


                                <!-- PROJECT NAME -->

                                <td class="p-3.5">

                                    <div class="font-bold text-white">

                                        {{ $project->title }}

                                    </div>


                                    <div
                                        class="text-[10px] text-gray-500 font-normal mt-1"
                                    >

                                        {{ $project->category ?? 'Web Development' }}

                                    </div>

                                </td>



                                <!-- CLIENT -->

                                <td class="p-3.5">

                                    <div class="text-white font-medium">

                                        {{ $user->name ?? 'Client' }}

                                    </div>


                                    <div class="text-[10px] text-gray-500">

                                        {{ $user->email ?? '' }}

                                    </div>

                                </td>



                                <!-- LOCATION -->

                                <td class="p-3.5 text-gray-400">

                                    @if($project->location)

                                        <div class="flex items-center gap-2">

                                            <i
                                                class="fa-solid fa-location-dot text-accent"
                                            ></i>

                                            <span>
                                                {{ $project->location }}
                                            </span>

                                        </div>

                                    @else

                                        <span class="text-gray-600">
                                            Not specified
                                        </span>

                                    @endif

                                </td>



                                <!-- STATUS -->

                                <td class="p-3.5">

                                    @php

                                        $statusClass = match(
                                            $project->status ?? 'In Progress'
                                        ) {

                                            'Planning'
                                                => 'bg-purple-500/10 text-purple-400',

                                            'In Progress'
                                                => 'bg-blue-500/10 text-blue-400',

                                            'Review'
                                                => 'bg-yellow-500/10 text-yellow-400',

                                            'Completed'
                                                => 'bg-green-500/10 text-green-400',

                                            default
                                                => 'bg-gray-500/10 text-gray-400'

                                        };

                                    @endphp


                                    <span
                                        class="px-2.5 py-1 rounded-md font-semibold text-[10px] {{ $statusClass }}"
                                    >

                                        {{ $project->status ?? 'In Progress' }}

                                    </span>

                                </td>



                                <!-- PROGRESS -->

                                <td class="p-3.5">

                                    @php
                                        $progress = max(
                                            0,
                                            min(
                                                100,
                                                (int) ($project->progress ?? 0)
                                            )
                                        );
                                    @endphp


                                    <div
                                        class="w-full bg-dark-bg rounded-full h-2 max-w-[120px] border border-dark-border overflow-hidden mb-1"
                                    >

                                        <div
                                            class="bg-accent h-2 rounded-full"
                                            style="width: {{ $progress }}%"
                                        ></div>

                                    </div>


                                    <span
                                        class="text-[10px] text-gray-400 font-medium"
                                    >

                                        {{ $progress }}% Completed

                                    </span>

                                </td>



                                <!-- DEADLINE -->

                                <td class="p-3.5 text-gray-400">

                                    @if($project->deadline)

                                        <div class="text-white font-medium">

                                            {{ $project->deadline->format('d M Y') }}

                                        </div>

                                    @else

                                        <span class="text-gray-600">
                                            No deadline
                                        </span>

                                    @endif

                                </td>



                                <!-- ACTION -->

                                <td class="p-3.5 text-right">

                                    <a
                                        href="{{ route('client.project.detail', $project->id) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-dark-bg border border-dark-border text-white hover:border-accent hover:text-accent font-bold text-[11px] transition"
                                    >

                                        View Project

                                        <i
                                            class="fa-solid fa-arrow-right text-[9px]"
                                        ></i>

                                    </a>

                                </td>


                            </tr>


                        @empty


                            <!-- EMPTY STATE -->

                            <tr>

                                <td
                                    colspan="7"
                                    class="p-12 text-center"
                                >

                                    <div
                                        class="w-16 h-16 mx-auto rounded-2xl bg-dark-bg border border-dark-border flex items-center justify-center mb-4"
                                    >

                                        <i
                                            class="fa-solid fa-folder-open text-2xl text-gray-600"
                                        ></i>

                                    </div>


                                    <h4
                                        class="text-white font-bold text-sm"
                                    >
                                        No Projects Assigned
                                    </h4>


                                    <p
                                        class="text-gray-500 text-xs mt-2"
                                    >
                                        No projects have been assigned to your account yet.
                                    </p>

                                </td>

                            </tr>


                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>


    </main>

</div>

</body>

</html>
```
