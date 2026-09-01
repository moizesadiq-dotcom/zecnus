```blade
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Service - ZACNUS Admin</title>

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

        ::-webkit-scrollbar-thumb:hover {
            background: #ef4444;
        }
    </style>
</head>

<body class="bg-gray-950 text-white font-sans">

<div class="flex min-h-screen">

    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside class="fixed left-0 top-0 bottom-0 w-64 bg-black p-6">

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
                    : 'text-gray-300 hover:bg-red-600 hover:text-white' }}"
            >
                Dashboard
            </a>


            <!-- CLIENTS -->

            <a
                href="{{ route('admin.clients') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.clients')
                    ? 'bg-red-600 text-white font-semibold'
                    : 'text-gray-300 hover:bg-red-600 hover:text-white' }}"
            >
                Manage Clients
            </a>


            <!-- PROJECTS -->

            <a
                href="{{ route('admin.projects') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.projects')
                    ? 'bg-red-600 text-white font-semibold'
                    : 'text-gray-300 hover:bg-red-600 hover:text-white' }}"
            >
                Manage Projects
            </a>


            <!-- SUPPORT TICKETS -->

            <a
                href="{{ route('admin.tickets') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.tickets')
                    ? 'bg-red-600 text-white font-semibold'
                    : 'text-gray-300 hover:bg-red-600 hover:text-white' }}"
            >
                Support Tickets
            </a>


            <!-- INVOICES -->

            <a
                href="{{ route('admin.invoices') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.invoices')
                    ? 'bg-red-600 text-white font-semibold'
                    : 'text-gray-300 hover:bg-red-600 hover:text-white' }}"
            >
                Invoices
            </a>


            <!-- PORTFOLIO -->

            <a
                href="{{ route('admin.portfolio') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.portfolio*')
                    ? 'bg-red-600 text-white font-semibold'
                    : 'text-gray-300 hover:bg-red-600 hover:text-white' }}"
            >
                Portfolio
            </a>


            <!-- SERVICES -->

            <a
                href="{{ route('admin.services.index') }}"
                class="block px-4 py-3 rounded-lg transition
                {{ request()->routeIs('admin.services.*')
                    ? 'bg-red-600 text-white font-semibold'
                    : 'text-gray-300 hover:bg-red-600 hover:text-white' }}"
            >
                Services
            </a>

        </nav>


        <!-- LOGOUT -->

        <div class="absolute bottom-6 left-6 right-6">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full text-left px-4 py-3
                           text-red-500
                           hover:bg-red-600/10
                           hover:text-red-400
                           rounded-lg
                           font-semibold
                           transition"
                >
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="flex-1 ml-64 p-10 overflow-y-auto">

        <!-- HEADER -->

        <div class="flex flex-col sm:flex-row
                    sm:items-center
                    sm:justify-between
                    gap-5
                    mb-10">

            <div>

                <p class="text-red-500
                          text-sm
                          font-semibold
                          uppercase
                          tracking-wider">

                    Website Management

                </p>

                <h2 class="text-3xl font-bold mt-1">
                    Add New Service
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Create a new service for your ZACNUS website.
                </p>

            </div>


            <!-- BACK BUTTON -->

            <a
                href="{{ route('admin.services.index') }}"
                class="inline-flex
                       items-center
                       justify-center
                       bg-gray-900
                       hover:bg-gray-800
                       border border-gray-800
                       px-5 py-3
                       rounded-lg
                       font-medium
                       transition"
            >
                ← Back to Services
            </a>

        </div>


        <!-- ========================================================= -->
        <!-- VALIDATION ERRORS -->
        <!-- ========================================================= -->

        @if($errors->any())

            <div class="mb-6
                        bg-red-500/10
                        border border-red-500/30
                        rounded-xl
                        p-5">

                <div class="flex items-center gap-3 mb-3">

                    <div class="w-8 h-8
                                rounded-lg
                                bg-red-600/20
                                flex items-center
                                justify-center
                                text-red-400">

                        !

                    </div>

                    <h3 class="font-semibold text-red-400">
                        Please fix the following errors:
                    </h3>

                </div>


                <ul class="space-y-1 text-sm text-red-300">

                    @foreach($errors->all() as $error)

                        <li>
                            • {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- ========================================================= -->
        <!-- CREATE SERVICE FORM -->
        <!-- ========================================================= -->

        <div class="max-w-4xl">

            <div class="bg-gray-900
                        border border-gray-800
                        rounded-2xl
                        overflow-hidden">


                <!-- FORM HEADER -->

                <div class="px-8 py-6
                            border-b border-gray-800
                            bg-gradient-to-r
                            from-red-950/40
                            to-gray-900">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12
                                    rounded-xl
                                    bg-red-600/10
                                    border border-red-600/20
                                    flex items-center
                                    justify-center
                                    text-red-500
                                    text-xl">

                            ✦

                        </div>

                        <div>

                            <h3 class="text-xl font-bold">
                                Service Information
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                Enter the details for your new service.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- FORM -->

                <form
                    action="{{ route('admin.services.store') }}"
                    method="POST"
                    class="p-8"
                >

                    @csrf


                    <!-- ================================================= -->
                    <!-- SERVICE TITLE -->
                    <!-- ================================================= -->

                    <div class="mb-6">

                        <label
                            for="title"
                            class="block text-sm
                                   font-semibold
                                   text-gray-300
                                   mb-2"
                        >
                            Service Title
                            <span class="text-red-500">*</span>
                        </label>


                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="e.g. Web Development"
                            required
                            class="w-full
                                   bg-gray-950
                                   border border-gray-800
                                   focus:border-red-600
                                   focus:ring-2
                                   focus:ring-red-600/20
                                   rounded-xl
                                   px-4 py-3
                                   text-white
                                   placeholder-gray-600
                                   outline-none
                                   transition"
                        >


                        @error('title')

                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <!-- ================================================= -->
                    <!-- DESCRIPTION -->
                    <!-- ================================================= -->

                    <div class="mb-6">

                        <label
                            for="description"
                            class="block text-sm
                                   font-semibold
                                   text-gray-300
                                   mb-2"
                        >
                            Description
                            <span class="text-red-500">*</span>
                        </label>


                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="Write a detailed description of this service..."
                            required
                            class="w-full
                                   bg-gray-950
                                   border border-gray-800
                                   focus:border-red-600
                                   focus:ring-2
                                   focus:ring-red-600/20
                                   rounded-xl
                                   px-4 py-3
                                   text-white
                                   placeholder-gray-600
                                   outline-none
                                   transition
                                   resize-y"
                        >{{ old('description') }}</textarea>


                        @error('description')

                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <!-- ================================================= -->
                    <!-- ICON -->
                    <!-- ================================================= -->

                    <div class="mb-6">

                        <label
                            for="icon"
                            class="block text-sm
                                   font-semibold
                                   text-gray-300
                                   mb-2"
                        >
                            Icon
                            <span class="text-gray-600 font-normal">
                                (Optional)
                            </span>
                        </label>


                        <input
                            type="text"
                            id="icon"
                            name="icon"
                            value="{{ old('icon') }}"
                            placeholder="e.g. fa fa-code"
                            class="w-full
                                   bg-gray-950
                                   border border-gray-800
                                   focus:border-red-600
                                   focus:ring-2
                                   focus:ring-red-600/20
                                   rounded-xl
                                   px-4 py-3
                                   text-white
                                   placeholder-gray-600
                                   outline-none
                                   transition"
                        >


                        <p class="text-gray-600 text-xs mt-2">
                            Enter your icon class or icon name.
                        </p>


                        @error('icon')

                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <!-- ================================================= -->
                    <!-- STATUS -->
                    <!-- ================================================= -->

                    <div class="mb-8">

                        <label
                            for="status"
                            class="block text-sm
                                   font-semibold
                                   text-gray-300
                                   mb-2"
                        >
                            Status
                            <span class="text-red-500">*</span>
                        </label>


                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full
                                   bg-gray-950
                                   border border-gray-800
                                   focus:border-red-600
                                   focus:ring-2
                                   focus:ring-red-600/20
                                   rounded-xl
                                   px-4 py-3
                                   text-white
                                   outline-none
                                   transition"
                        >

                            <option
                                value="active"
                                {{ old('status', 'active') === 'active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                {{ old('status') === 'inactive' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>


                        @error('status')

                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <!-- ================================================= -->
                    <!-- FORM ACTIONS -->
                    <!-- ================================================= -->

                    <div class="flex flex-col sm:flex-row
                                gap-3
                                pt-6
                                border-t border-gray-800">


                        <!-- CANCEL -->

                        <a
                            href="{{ route('admin.services.index') }}"
                            class="flex-1
                                   text-center
                                   bg-gray-800
                                   hover:bg-gray-700
                                   border border-gray-700
                                   px-5 py-3
                                   rounded-xl
                                   font-semibold
                                   transition"
                        >
                            Cancel
                        </a>


                        <!-- SAVE -->

                        <button
                            type="submit"
                            class="flex-1
                                   bg-red-600
                                   hover:bg-red-700
                                   px-5 py-3
                                   rounded-xl
                                   font-semibold
                                   transition"
                        >
                            + Create Service
                        </button>

                    </div>

                </form>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="mt-8 text-sm text-gray-600">
            ZACNUS Admin Panel · Service Management
        </div>

    </main>

</div>

</body>
</html>
```
