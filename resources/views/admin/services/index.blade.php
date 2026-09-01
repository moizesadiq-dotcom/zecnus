<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Services - ZACNUS Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white min-h-screen">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-black border-r border-gray-800 fixed left-0 top-0 bottom-0">

        <div class="p-6 border-b border-gray-800">
            <h1 class="text-2xl font-bold text-red-600">
                ZACNUS
            </h1>

            <p class="text-gray-500 text-sm mt-1">
                Admin Panel
            </p>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition">
                Dashboard
            </a>

            <a href="{{ route('admin.clients') }}"
               class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition">
                Manage Clients
            </a>

            <a href="{{ route('admin.projects') }}"
               class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition">
                Manage Projects
            </a>

            <a href="{{ route('admin.tickets') }}"
               class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition">
                Support Tickets
            </a>

            <a href="{{ route('admin.invoices') }}"
               class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition">
                Invoices
            </a>

            <a href="{{ route('admin.portfolio') }}"
               class="block px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition">
                Portfolio
            </a>

            <!-- ACTIVE SERVICES -->
            <a href="{{ route('admin.services.index') }}"
               class="block px-4 py-3 rounded-lg bg-red-600 text-white font-semibold">
                Services
            </a>

        </nav>

        <!-- LOGOUT -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800">

            <form action="{{ route('admin.logout') }}" method="POST">

                @csrf

                <button type="submit"
                        class="w-full px-4 py-3 rounded-lg bg-gray-900 text-gray-300 hover:bg-red-600 hover:text-white transition">
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="ml-64 flex-1 p-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-8">

            <div>
                <h2 class="text-3xl font-bold">
                    Services
                </h2>

                <p class="text-gray-400 mt-2">
                    Manage all ZACNUS services
                </p>
            </div>

            <a href="{{ route('admin.services.create') }}"
               class="px-5 py-3 bg-red-600 hover:bg-red-700 rounded-lg font-semibold transition">
                + Add Service
            </a>

        </div>


        <!-- SUCCESS MESSAGE -->
        @if(session('success'))

            <div class="mb-6 bg-green-950 border border-green-800 text-green-300 px-5 py-4 rounded-xl">
                {{ session('success') }}
            </div>

        @endif


        <!-- ERROR MESSAGE -->
        @if(session('error'))

            <div class="mb-6 bg-red-950 border border-red-800 text-red-300 px-5 py-4 rounded-xl">
                {{ session('error') }}
            </div>

        @endif


        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <!-- TOTAL -->
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">

                <p class="text-gray-400 text-sm">
                    Total Services
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $services->count() }}
                </h3>

            </div>


            <!-- ACTIVE -->
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">

                <p class="text-gray-400 text-sm">
                    Active Services
                </p>

                <h3 class="text-3xl font-bold mt-2 text-green-500">
                    {{ $services->where('status', 'active')->count() }}
                </h3>

            </div>


            <!-- INACTIVE -->
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">

                <p class="text-gray-400 text-sm">
                    Inactive Services
                </p>

                <h3 class="text-3xl font-bold mt-2 text-red-500">
                    {{ $services->where('status', 'inactive')->count() }}
                </h3>

            </div>

        </div>


        <!-- SERVICES TABLE -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-black border-b border-gray-800">

                        <tr>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">
                                #
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">
                                Title
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">
                                Description
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">
                                Icon
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">
                                Status
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-800">

                        @forelse($services as $service)

                            <tr class="hover:bg-gray-800/50 transition">

                                <!-- ID -->
                                <td class="px-6 py-5 text-gray-400">
                                    {{ $service->id }}
                                </td>


                                <!-- TITLE -->
                                <td class="px-6 py-5">

                                    <div class="font-semibold text-white">
                                        {{ $service->title }}
                                    </div>

                                </td>


                                <!-- DESCRIPTION -->
                                <td class="px-6 py-5">

                                    <div class="text-gray-400 max-w-md">
                                        {{ \Illuminate\Support\Str::limit($service->description, 80) }}
                                    </div>

                                </td>


                                <!-- ICON -->
                                <td class="px-6 py-5">

                                    @if($service->icon)

                                        <span class="text-gray-300">
                                            {{ $service->icon }}
                                        </span>

                                    @else

                                        <span class="text-gray-600">
                                            No Icon
                                        </span>

                                    @endif

                                </td>


                                <!-- STATUS -->
                                <td class="px-6 py-5">

                                    @if($service->status === 'active')

                                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-green-950 text-green-400 border border-green-800">
                                            Active
                                        </span>

                                    @else

                                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-red-950 text-red-400 border border-red-800">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                <!-- ACTIONS -->
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-2">

                                        <!-- EDIT -->
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                           class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg text-sm font-semibold transition">
                                            Edit
                                        </a>


                                        <!-- DELETE -->
                                        <form action="{{ route('admin.services.destroy', $service->id) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this service?');">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-semibold transition">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-12 text-center">

                                    <div class="text-gray-500 text-lg">
                                        No services found.
                                    </div>

                                    <a href="{{ route('admin.services.create') }}"
                                       class="inline-block mt-4 px-5 py-3 bg-red-600 hover:bg-red-700 rounded-lg text-white">
                                        Add Your First Service
                                    </a>

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