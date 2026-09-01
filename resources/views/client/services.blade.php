
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Services - ZACNUS Client Portal</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
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

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #0D0F12;
        }

        .dark-card {
            background: #16191E;
        }

        .dark-border {
            border-color: #242830;
        }

        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #0D0F12;
        }

        ::-webkit-scrollbar-thumb {
            background: #2D323A;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #E61C1C;
        }
    </style>
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
    <main class="flex-1 overflow-y-auto">

        <!-- TOP BAR -->
        <header
            class="h-20 border-b border-dark-border bg-dark-bg/95 backdrop-blur flex items-center justify-between px-8 md:px-10"
        >

            <div>

                <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">
                    Client Portal
                </p>

                <h1 class="text-xl font-bold text-white">
                    Services
                </h1>

            </div>


            <!-- USER -->
            <div class="flex items-center gap-4">

                <div class="text-right">

                    <p class="text-sm font-semibold text-white">
                        {{ auth()->user()->name ?? 'Client' }}
                    </p>

                    <p class="text-[10px] text-gray-500">
                        Client Account
                    </p>

                </div>


                <div
                    class="w-10 h-10 rounded-full bg-accent flex items-center justify-center font-bold text-white shadow-lg shadow-accent/20"
                >
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                </div>

            </div>

        </header>


        <!-- =====================================================
             PAGE CONTENT
        ====================================================== -->
        <section class="p-8 md:p-10">

            <!-- PAGE HEADER -->
            <div class="mb-10">

                <span
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent/10 text-red-400 text-[10px] uppercase tracking-widest font-bold mb-4"
                >

                    <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>

                    ZACNUS Services

                </span>


                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
                    Our Services
                </h2>


                <p class="text-sm text-gray-400 max-w-2xl leading-7">
                    Explore the professional digital services provided by ZACNUS.
                    Services available here are managed directly by our administration team.
                </p>

            </div>


            <!-- =================================================
                 SERVICES GRID
            ================================================== -->
            @if($services->count())

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @foreach($services as $service)

                        <div
                            class="dark-card border dark-border rounded-2xl p-6 hover:border-accent/50 transition duration-300 group"
                        >

                            <!-- ICON -->
                            <div
                                class="w-14 h-14 rounded-xl bg-accent/10 text-red-400 flex items-center justify-center mb-6 group-hover:bg-accent group-hover:text-white transition"
                            >

                                @if($service->icon)

                                    <span class="text-2xl">
                                        {{ $service->icon }}
                                    </span>

                                @else

                                    <i class="fa-solid fa-briefcase text-xl"></i>

                                @endif

                            </div>


                            <!-- TITLE -->
                            <h3 class="text-lg font-bold text-white mb-3">
                                {{ $service->title }}
                            </h3>


                            <!-- DESCRIPTION -->
                            <p class="text-sm text-gray-400 leading-7">
                                {{ $service->description }}
                            </p>


                            <!-- STATUS -->
                            <div
                                class="mt-6 pt-4 border-t border-dark-border flex items-center justify-between"
                            >

                                <span
                                    class="text-[10px] uppercase tracking-widest text-green-400 font-bold"
                                >
                                    Available Service
                                </span>

                                <span class="w-2 h-2 rounded-full bg-green-500"></span>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <!-- =================================================
                     NO SERVICES
                ================================================== -->
                <div
                    class="dark-card border border-dashed dark-border rounded-2xl p-16 text-center"
                >

                    <div
                        class="w-16 h-16 mx-auto rounded-2xl bg-dark-card flex items-center justify-center mb-6"
                    >

                        <i class="fa-solid fa-briefcase text-2xl text-gray-600"></i>

                    </div>


                    <h2 class="text-lg font-bold text-white mb-2">
                        No Services Available
                    </h2>


                    <p class="text-sm text-gray-500">
                        Services provided by ZACNUS will appear here.
                    </p>

                </div>

            @endif

        </section>

    </main>

</div>

</body>

</html>
```
