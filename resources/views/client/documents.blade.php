<x-app-layout>

    <div class="bg-dark-bg min-h-screen text-gray-200">

        <!-- LEFT SIDEBAR -->
        <aside class="fixed left-0 top-0 bottom-0 w-64 bg-black border-r border-gray-800 p-6 flex flex-col justify-between z-50">

            <div>

                <!-- LOGO -->
                <div class="mb-10">
                    <h1 class="text-xl font-extrabold text-red-600 tracking-wide">
                        ZACNUS
                    </h1>

                    <p class="text-[10px] text-gray-500 uppercase tracking-widest mt-1">
                        Client Portal
                    </p>
                </div>


                <!-- NAVIGATION -->
                <nav class="space-y-2">

                    <!-- Overview -->
                    <a href="{{ route('client.dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                       {{ request()->routeIs('client.dashboard')
                            ? 'bg-red-600 text-white font-semibold'
                            : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">

                        <i class="fa-solid fa-chart-line w-4"></i>

                        <span>Overview</span>

                    </a>


                    <!-- My Projects -->
                    <a href="{{ route('client.projects') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                       {{ request()->routeIs('client.projects', 'client.project.detail')
                            ? 'bg-red-600 text-white font-semibold'
                            : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">

                        <i class="fa-solid fa-folder-open w-4"></i>

                        <span>My Projects</span>

                    </a>


                    <!-- Services -->
                    <a href="{{ route('client.services') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                       {{ request()->routeIs('client.services')
                            ? 'bg-red-600 text-white font-semibold'
                            : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">

                        <i class="fa-solid fa-briefcase w-4"></i>

                        <span>Services</span>

                    </a>


                    <!-- Invoices -->
                    <a href="{{ route('client.invoices') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                       {{ request()->routeIs('client.invoices')
                            ? 'bg-red-600 text-white font-semibold'
                            : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">

                        <i class="fa-solid fa-file-invoice-dollar w-4"></i>

                        <span>Invoices</span>

                    </a>


                    <!-- Support Tickets -->
                    <a href="{{ route('client.support') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                       {{ request()->routeIs('client.support')
                            ? 'bg-red-600 text-white font-semibold'
                            : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">

                        <i class="fa-solid fa-headset w-4"></i>

                        <span>Support Tickets</span>

                    </a>


                    <!-- Profile Settings -->
                    <a href="{{ route('client.profile') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                       {{ request()->routeIs('client.profile')
                            ? 'bg-red-600 text-white font-semibold'
                            : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">

                        <i class="fa-solid fa-user-gear w-4"></i>

                        <span>Profile Settings</span>

                    </a>

                </nav>

            </div>


            <!-- LOGOUT -->
            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-600/10 transition">

                    <i class="fa-solid fa-right-from-bracket w-4"></i>

                    <span>Logout</span>

                </button>

            </form>

        </aside>


        <!-- MAIN AREA -->
        <div class="ml-64 min-h-screen">


            <!-- TOP NAVBAR -->
            <header class="h-20 border-b border-gray-800 bg-gray-950/95 backdrop-blur flex items-center justify-between px-10">

                <div>

                    <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">
                        Client Portal
                    </p>

                    <h1 class="text-xl font-bold text-white">
                        Documents & Contracts
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


                    <div class="w-10 h-10 rounded-full bg-red-600 flex items-center justify-center font-bold text-white">

                        {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}

                    </div>

                </div>

            </header>


            <!-- ORIGINAL CONTENT -->
            <div class="py-12 bg-dark-bg min-h-screen text-gray-200">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                    <h2 class="text-2xl font-bold text-white">
                        Project Documents & Contracts
                    </h2>


                    <div class="bg-dark-card p-6 rounded-2xl border border-dark-border overflow-x-auto">

                        <table class="w-full text-left border-collapse">

                            <thead>

                                <tr class="border-b border-dark-border text-gray-400 text-xs">

                                    <th class="py-3">
                                        Document Title
                                    </th>

                                    <th class="py-3">
                                        Type
                                    </th>

                                    <th class="py-3">
                                        Date Added
                                    </th>

                                    <th class="py-3">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="text-sm">

                                @forelse($documents ?? [] as $doc)

                                    <tr class="border-b border-dark-border/50">

                                        <td class="py-3 text-white font-bold">
                                            {{ $doc->title }}
                                        </td>


                                        <td class="py-3">

                                            <span class="px-2.5 py-1 rounded-md text-xs bg-accent/20 text-accent font-bold">
                                                {{ $doc->file_type }}
                                            </span>

                                        </td>


                                        <td class="py-3 text-gray-400">
                                            {{ $doc->created_at->format('d M Y') }}
                                        </td>


                                        <td class="py-3">

                                            <a href="{{ asset('storage/' . $doc->file_path) }}"
                                               download
                                               class="text-xs bg-accent text-white px-3 py-1.5 rounded-lg font-bold shadow-md shadow-accent/20 hover:opacity-90">

                                                Download

                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="py-6 text-center text-gray-500 text-xs">

                                            No documents found right now.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>