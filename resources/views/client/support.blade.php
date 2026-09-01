
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Support Tickets - ZACNUS</title>

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

                    <h1 class="text-2xl font-extrabold text-white">
                        Support & Tickets
                    </h1>

                    <p class="text-xs text-gray-400 mt-1">
                        Need technical assistance? Open a new support ticket or track existing queries.
                    </p>

                </div>


                <div class="flex items-center gap-3">

                    <span
                        class="text-xs bg-dark-card border border-dark-border px-3 py-2 rounded-xl text-white font-medium flex items-center shadow-sm"
                    >
                        <i class="fa-solid fa-circle text-[8px] text-green-500 mr-2"></i>
                        Client Account
                    </span>

                </div>

            </div>


            <!-- =====================================================
                 GRID LAYOUT
            ====================================================== -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- =================================================
                     CREATE NEW TICKET
                ================================================== -->
                <div
                    class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl h-fit"
                >

                    <h3
                        class="text-sm font-bold text-white uppercase tracking-wider mb-4"
                    >
                        Open New Ticket
                    </h3>


                    <form
                        action="{{ route('client.support.store') }}"
                        method="POST"
                        class="space-y-4"
                    >

                        @csrf


                        <!-- SUBJECT -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Subject
                            </label>

                            <input
                                type="text"
                                name="subject"
                                required
                                placeholder="Brief description of issue"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                            >

                        </div>


                        <!-- MESSAGE -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Message Details
                            </label>

                            <textarea
                                name="message"
                                rows="4"
                                required
                                placeholder="Describe your issue or request in detail..."
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition resize-none"
                            ></textarea>

                        </div>


                        <!-- SUBMIT -->
                        <button
                            type="submit"
                            class="w-full py-2.5 bg-accent hover:bg-accent-hover text-white rounded-xl font-bold text-xs shadow-lg shadow-accent/20 transition cursor-pointer"
                        >
                            Submit Ticket
                        </button>

                    </form>

                </div>


                <!-- =================================================
                     EXISTING SUPPORT TICKETS
                ================================================== -->
                <div
                    class="lg:col-span-2 bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl"
                >

                    <h3
                        class="text-sm font-bold text-white uppercase tracking-wider mb-4"
                    >
                        Your Support Tickets
                    </h3>


                    <div class="space-y-4">

                        @forelse($tickets ?? [] as $ticket)

                            <div
                                class="p-4 bg-dark-bg rounded-xl border border-dark-border space-y-2"
                            >

                                <div class="flex justify-between items-center">

                                    <span class="text-xs font-bold text-white">
                                        {{ $ticket->subject }}
                                    </span>

                                    <span
                                        class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-500/10 text-blue-400"
                                    >
                                        {{ $ticket->status ?? 'Open' }}
                                    </span>

                                </div>


                                <p class="text-xs text-gray-400">
                                    {{ $ticket->message }}
                                </p>


                                <div
                                    class="text-[10px] text-gray-500 pt-1 border-t border-dark-border/60 flex justify-between"
                                >

                                    <span>
                                        Submitted on:
                                        {{ $ticket->created_at?->format('d M Y, h:i A') ?? 'Recently' }}
                                    </span>

                                    <span class="text-accent font-medium">
                                        Admin status: Pending Review
                                    </span>

                                </div>

                            </div>

                        @empty

                            <div class="text-center py-12 text-gray-500 text-xs">

                                No support tickets submitted yet.
                                Use the form to open one.

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>
</html>
```
