<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Service - ZACNUS Admin</title>

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

            <!-- SERVICES -->
            <a href="{{ route('admin.services.index') }}"
               class="block px-4 py-3 rounded-lg bg-red-600 text-white font-semibold transition">
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
        <div class="mb-8">

            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-3xl font-bold">
                        Edit Service
                    </h2>

                    <p class="text-gray-400 mt-2">
                        Update service information
                    </p>
                </div>

                <a href="{{ route('admin.services.index') }}"
                   class="px-5 py-3 rounded-lg bg-gray-800 hover:bg-gray-700 transition">
                    ← Back to Services
                </a>

            </div>

        </div>


        <!-- VALIDATION ERRORS -->
        @if ($errors->any())

            <div class="mb-6 p-5 rounded-xl bg-red-950 border border-red-800">

                <h3 class="font-semibold text-red-400 mb-2">
                    Please fix the following errors:
                </h3>

                <ul class="list-disc list-inside text-red-300 text-sm space-y-1">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORM -->
        <div class="max-w-4xl">

            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">

                <form action="{{ route('admin.services.update', $service->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')


                    <!-- TITLE -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            Service Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $service->title) }}"
                            required
                            class="w-full px-4 py-3 rounded-lg bg-gray-950 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-red-600"
                            placeholder="Enter service title">

                    </div>


                    <!-- DESCRIPTION -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            required
                            class="w-full px-4 py-3 rounded-lg bg-gray-950 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-red-600"
                            placeholder="Enter service description">{{ old('description', $service->description) }}</textarea>

                    </div>


                    <!-- ICON -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            Icon
                        </label>

                        <input
                            type="text"
                            name="icon"
                            value="{{ old('icon', $service->icon) }}"
                            class="w-full px-4 py-3 rounded-lg bg-gray-950 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-red-600"
                            placeholder="Example: fas fa-code">

                        <p class="text-gray-500 text-sm mt-2">
                            Enter Font Awesome icon class if required.
                        </p>

                    </div>


                    <!-- STATUS -->
                    <div class="mb-8">

                        <label class="block text-sm font-medium text-gray-300 mb-2">
                            Status
                        </label>

                        <select
                            name="status"
                            required
                            class="w-full px-4 py-3 rounded-lg bg-gray-950 border border-gray-700 text-white focus:outline-none focus:border-red-600">

                            <option value="active"
                                {{ old('status', $service->status) === 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive"
                                {{ old('status', $service->status) === 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>


                    <!-- BUTTONS -->
                    <div class="flex items-center gap-4">

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold transition">

                            Update Service

                        </button>

                        <a
                            href="{{ route('admin.services.index') }}"
                            class="px-6 py-3 rounded-lg bg-gray-800 hover:bg-gray-700 text-gray-300 transition">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>

</body>
</html>