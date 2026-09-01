
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Manage Clients - ZACNUS ADMIN</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #111827;
        }

        ::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-950 text-white font-sans">

<div class="flex min-h-screen">

    <!-- SIDEBAR / NAVBAR -->
    <aside class="fixed left-0 top-0 bottom-0 w-64 bg-black border-r border-gray-800 p-6 flex flex-col justify-between">

        <div>

            <!-- BRAND -->
            <div class="mb-10">
                <h1 class="text-xl font-bold text-red-600">
                    ZACNUS ADMIN
                </h1>
            </div>

            <!-- NAVIGATION -->
            <nav class="space-y-2">

                <!-- DASHBOARD -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-red-600 text-white font-semibold'
                        : 'text-gray-300 hover:bg-gray-800' }}"
                >
                    Dashboard
                </a>

                <!-- CLIENTS -->
                <a
                    href="{{ route('admin.clients') }}"
                    class="block px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('admin.clients')
                        ? 'bg-red-600 text-white font-semibold'
                        : 'text-gray-300 hover:bg-gray-800' }}"
                >
                    Manage Clients
                </a>

                <!-- PROJECTS -->
                <a
                    href="{{ route('admin.projects') }}"
                    class="block px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('admin.projects')
                        ? 'bg-red-600 text-white font-semibold'
                        : 'text-gray-300 hover:bg-gray-800' }}"
                >
                    Manage Projects
                </a>

                <!-- SUPPORT TICKETS -->
                <a
                    href="{{ route('admin.tickets') }}"
                    class="block px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('admin.tickets')
                        ? 'bg-red-600 text-white font-semibold'
                        : 'text-gray-300 hover:bg-gray-800' }}"
                >
                    Support Tickets
                </a>

                <!-- INVOICES -->
                <a
                    href="{{ route('admin.invoices') }}"
                    class="block px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('admin.invoices')
                        ? 'bg-red-600 text-white font-semibold'
                        : 'text-gray-300 hover:bg-gray-800' }}"
                >
                    Invoices
                </a>

                <!-- PORTFOLIO -->
                <a
                    href="{{ route('admin.portfolio') }}"
                    class="block px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('admin.portfolio*')
                        ? 'bg-red-600 text-white font-semibold'
                        : 'text-gray-300 hover:bg-gray-800' }}"
                >
                    Portfolio
                </a>

                <!-- SERVICES -->
                <a
                    href="{{ route('admin.services.index') }}"
                    class="block px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('admin.services.*')
                        ? 'bg-red-600 text-white font-semibold'
                        : 'text-gray-300 hover:bg-gray-800' }}"
                >
                    Services
                </a>

            </nav>

        </div>

        <!-- LOGOUT -->
        <form
            action="{{ route('admin.logout') }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="w-full text-left px-4 py-3 text-red-500 hover:bg-red-600/20 rounded-lg font-medium transition"
            >
                Logout
            </button>
        </form>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="flex-1 ml-64 p-10 overflow-y-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h2 class="text-3xl font-bold">
                    Manage Clients
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    View and manage all registered ZACNUS clients.
                </p>
            </div>

            <span class="bg-red-900/50 border border-red-800 text-red-300 px-4 py-2 rounded-full text-sm">
                Admin: Super Admin
            </span>

        </div>


        <!-- STATS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <!-- TOTAL -->
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-800">

                <p class="text-gray-400 text-sm">
                    Total Clients
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $clients->count() }}
                </h3>

            </div>


            <!-- ACTIVE -->
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-800">

                <p class="text-gray-400 text-sm">
                    Active Clients
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $clients->count() }}
                </h3>

            </div>


            <!-- INACTIVE -->
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-800">

                <p class="text-gray-400 text-sm">
                    Inactive Clients
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    0
                </h3>

            </div>

        </div>


        <!-- CLIENTS TABLE -->
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">

            <div class="flex justify-between items-center mb-5">

                <h3 class="text-xl font-bold">
                    All Clients
                </h3>

                <span class="text-sm text-gray-500">
                    {{ $clients->count() }} Clients
                </span>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead>

                        <tr class="border-b border-gray-700 text-gray-400 text-sm">

                            <th class="py-3 px-2">
                                #
                            </th>

                            <th class="py-3 px-2">
                                Client
                            </th>

                            <th class="py-3 px-2">
                                Email
                            </th>

                            <th class="py-3 px-2">
                                Phone
                            </th>

                            <th class="py-3 px-2">
                                Company
                            </th>

                            <th class="py-3 px-2">
                                Role
                            </th>

                            <th class="py-3 px-2">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($clients as $index => $client)

                        <tr class="border-b border-gray-700/50 hover:bg-gray-800/50 transition">

                            <!-- NUMBER -->
                            <td class="py-4 px-2 text-gray-400 text-sm">
                                {{ $index + 1 }}
                            </td>


                            <!-- CLIENT -->
                            <td class="py-4 px-2 font-medium">
                                {{ $client->name }}
                            </td>


                            <!-- EMAIL -->
                            <td class="py-4 px-2 text-gray-400 text-sm">
                                {{ $client->email }}
                            </td>


                            <!-- PHONE -->
                            <td class="py-4 px-2 text-gray-400 text-sm">
                                {{ $client->phone ?? 'N/A' }}
                            </td>


                            <!-- COMPANY -->
                            <td class="py-4 px-2 text-gray-400 text-sm">
                                {{ $client->company ?? 'N/A' }}
                            </td>


                            <!-- ROLE -->
                            <td class="py-4 px-2">

                                <span class="px-3 py-1 bg-blue-500/10 text-blue-400 rounded text-xs">
                                    {{ ucfirst($client->role) }}
                                </span>

                            </td>


                            <!-- ACTION -->
                            <td class="py-4 px-2">

                                <span class="px-3 py-1 bg-green-500/10 text-green-400 rounded text-xs">
                                    Active
                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="py-8 text-center text-gray-500"
                            >
                                No clients found.
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
