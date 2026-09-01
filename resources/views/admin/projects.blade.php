
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Projects - ZACNUS ADMIN</title>

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

    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

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
                class="w-full text-left px-4 py-3 text-red-500 hover:bg-red-600/20 rounded-lg transition"
            >
                Logout
            </button>
        </form>

    </aside>


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main class="flex-1 ml-64 p-10 overflow-y-auto">

        <!-- PAGE HEADER -->

        <div class="mb-8">

            <h2 class="text-3xl font-bold">
                Manage Client Projects
            </h2>

            <p class="text-gray-400 mt-2">
                Create and manage projects assigned to your clients.
            </p>

        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="mb-6 bg-green-900/50 border border-green-700 text-green-300 px-5 py-3 rounded-lg">
                {{ session('success') }}
            </div>

        @endif


        <!-- VALIDATION ERRORS -->

        @if($errors->any())

            <div class="mb-6 bg-red-900/50 border border-red-700 text-red-300 px-5 py-4 rounded-lg">

                <p class="font-bold mb-2">
                    Form mein ye problem hai:
                </p>

                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =====================================================
             CREATE PROJECT
        ====================================================== -->

        <div class="bg-gray-900 p-6 rounded-xl border border-gray-800 mb-8">

            <h3 class="text-xl font-bold mb-5">
                Assign New Project to Client
            </h3>


            <form
                action="{{ route('admin.projects.store') }}"
                method="POST"
                class="grid grid-cols-1 md:grid-cols-2 gap-5"
            >

                @csrf


                <!-- PROJECT TITLE -->

                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Project Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                        placeholder="Website Development"
                    >

                </div>


                <!-- CLIENT -->

                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Select Client
                    </label>

                    <select
                        name="client_id"
                        required
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                    >

                        <option value="">
                            Select Client
                        </option>

                        @foreach($clients as $client)

                            <option
                                value="{{ $client->id }}"
                                {{ old('client_id') == $client->id ? 'selected' : '' }}
                            >
                                {{ $client->name }} - {{ $client->email }}
                            </option>

                        @endforeach

                    </select>

                    <p class="text-xs text-gray-500 mt-2">
                        Project isi client ke account mein show hoga jo yahan select hoga.
                    </p>

                </div>


                <!-- CATEGORY -->

                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category') }}"
                        required
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                        placeholder="Web Development"
                    >

                </div>


                <!-- LOCATION -->

                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Project Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ old('location') }}"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                        placeholder="Karachi, Pakistan"
                    >

                </div>


                <!-- BUDGET -->

                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Budget
                    </label>

                    <input
                        type="number"
                        name="budget"
                        value="{{ old('budget') }}"
                        min="0"
                        step="0.01"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                        placeholder="1000"
                    >

                </div>


                <!-- DEADLINE -->

                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Deadline
                    </label>

                    <input
                        type="date"
                        name="deadline"
                        value="{{ old('deadline') }}"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                    >

                </div>


                <!-- DESCRIPTION -->

                <div class="md:col-span-2">

                    <label class="block text-sm text-gray-400 mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                        placeholder="Project details"
                    >{{ old('description') }}</textarea>

                </div>


                <!-- BUTTON -->

                <div class="md:col-span-2">

                    <button
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-medium transition"
                    >
                        Create & Link Project
                    </button>

                </div>

            </form>

        </div>


        <!-- =====================================================
             EXISTING PROJECTS
        ====================================================== -->

        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">

            <h3 class="text-xl font-bold mb-5">
                Existing Projects
            </h3>


            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead>

                        <tr class="border-b border-gray-700 text-gray-400 text-sm">

                            <th class="py-3 px-2">
                                Project
                            </th>

                            <th class="py-3 px-2">
                                Client
                            </th>

                            <th class="py-3 px-2">
                                Location
                            </th>

                            <th class="py-3 px-2">
                                Budget
                            </th>

                            <th class="py-3 px-2">
                                Deadline
                            </th>

                            <th class="py-3 px-2">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($projects as $project)

                        <tr class="border-b border-gray-700/50 hover:bg-gray-800/50 transition">

                            <!-- PROJECT -->

                            <td class="py-4 px-2">

                                <div class="font-medium">
                                    {{ $project->title }}
                                </div>

                                <div class="text-xs text-gray-500">
                                    {{ $project->category }}
                                </div>

                            </td>


                            <!-- CLIENT -->

                            <td class="py-4 px-2 text-gray-400">

                                {{ $project->client->name ?? 'N/A' }}

                                @if($project->client)

                                    <div class="text-xs text-gray-600">
                                        {{ $project->client->email }}
                                    </div>

                                @endif

                            </td>


                            <!-- LOCATION -->

                            <td class="py-4 px-2 text-gray-400">

                                @if($project->location)

                                    <div class="flex items-center gap-2">

                                        <span class="text-red-500">
                                            📍
                                        </span>

                                        <span>
                                            {{ $project->location }}
                                        </span>

                                    </div>

                                @else

                                    <span class="text-gray-600">
                                        Not set
                                    </span>

                                @endif

                            </td>


                            <!-- BUDGET -->

                            <td class="py-4 px-2 text-gray-400">

                                @if($project->budget !== null)

                                    ${{ number_format((float) $project->budget, 2) }}

                                @else

                                    Not set

                                @endif

                            </td>


                            <!-- DEADLINE -->

                            <td class="py-4 px-2 text-gray-400">

                                @if($project->deadline)

                                    {{ $project->deadline->format('d M Y') }}

                                @else

                                    No deadline

                                @endif

                            </td>


                            <!-- STATUS -->

                            <td class="py-4 px-2">

                                <span class="px-3 py-1 bg-blue-500/10 text-blue-400 rounded text-xs">
                                    {{ $project->status }}
                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="py-8 text-center text-gray-500"
                            >
                                No projects found.
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
