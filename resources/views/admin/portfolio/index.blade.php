```blade
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Portfolio - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#e11d48',
                        darkbrand: '#be123c'
                    }
                }
            }
        }
    </script>

    <style>
        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #e11d48;
            border-radius: 10px;
        }
    </style>

</head>


<body class="bg-slate-950 text-white min-h-screen">

<div class="flex min-h-screen">


    <!-- SIDEBAR / NAVBAR -->

    <aside class="fixed left-0 top-0 bottom-0 w-64 bg-black border-r border-slate-800 p-6 flex flex-col justify-between">

        <div>

            <!-- BRAND -->

            <div class="mb-10">

                <h1 class="text-2xl font-bold text-rose-500">
                    ZACNUS
                </h1>

                <p class="text-xs text-slate-500 mt-1">
                    Admin Panel
                </p>

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

    <main class="ml-64 flex-1 min-h-screen">


        <!-- HEADER -->

        <header class="sticky top-0 z-20 bg-slate-950/95 backdrop-blur border-b border-slate-800">

            <div class="px-8 py-5 flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-bold">
                        Portfolio
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Manage your portfolio projects
                    </p>

                </div>


                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="px-5 py-3 rounded-xl border border-slate-700 hover:border-rose-500 hover:text-rose-400 transition"
                >
                    View Website
                </a>

            </div>

        </header>



        <!-- CONTENT -->

        <section class="p-8">


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400">

                    {{ session('success') }}

                </div>

            @endif



            <!-- ERROR MESSAGE -->

            @if(session('error'))

                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400">

                    {{ session('error') }}

                </div>

            @endif



            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400">

                    <ul class="list-disc ml-5">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- ADD PORTFOLIO -->

            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-7 mb-10">

                <div class="mb-7">

                    <h3 class="text-xl font-bold">
                        Add New Portfolio
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Add a new project to your portfolio.
                    </p>

                </div>


                <form
                    action="{{ route('admin.portfolio.store') }}"
                    method="POST"
                    class="space-y-6"
                >

                    @csrf


                    <!-- TITLE + CATEGORY -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <label class="block text-sm text-slate-300 mb-2">
                                Project Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                placeholder="Zacnus Website"
                                class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 outline-none focus:border-rose-500"
                            >

                        </div>


                        <div>

                            <label class="block text-sm text-slate-300 mb-2">
                                Category
                            </label>

                            <input
                                type="text"
                                name="category"
                                value="{{ old('category') }}"
                                placeholder="Web Development"
                                class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 outline-none focus:border-rose-500"
                            >

                        </div>

                    </div>



                    <!-- DESCRIPTION -->

                    <div>

                        <label class="block text-sm text-slate-300 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            placeholder="Project description..."
                            class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 outline-none focus:border-rose-500"
                        >{{ old('description') }}</textarea>

                    </div>



                    <!-- IMAGE -->

                    <div>

                        <label class="block text-sm text-slate-300 mb-2">
                            Image URL
                        </label>

                        <input
                            type="text"
                            name="image"
                            value="{{ old('image') }}"
                            placeholder="https://example.com/project.jpg"
                            class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 outline-none focus:border-rose-500"
                        >

                    </div>



                    <!-- PROJECT URL -->

                    <div>

                        <label class="block text-sm text-slate-300 mb-2">
                            Project URL
                        </label>

                        <input
                            type="text"
                            name="project_url"
                            value="{{ old('project_url') }}"
                            placeholder="https://example.com"
                            class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 outline-none focus:border-rose-500"
                        >

                    </div>



                    <!-- TECHNOLOGIES -->

                    <div>

                        <label class="block text-sm text-slate-300 mb-2">
                            Technologies
                        </label>

                        <input
                            type="text"
                            name="technologies"
                            value="{{ old('technologies') }}"
                            placeholder="Laravel, PHP, MySQL, Tailwind CSS"
                            class="w-full bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 outline-none focus:border-rose-500"
                        >

                    </div>



                    <!-- FEATURED -->

                    <div class="flex items-center gap-3">

                        <input
                            type="checkbox"
                            name="is_featured"
                            value="1"
                            id="is_featured"
                            class="w-5 h-5 accent-rose-600"
                        >

                        <label
                            for="is_featured"
                            class="text-sm text-slate-300"
                        >
                            Mark as Featured Project
                        </label>

                    </div>



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="px-7 py-3 rounded-xl bg-rose-600 hover:bg-rose-700 font-semibold transition"
                    >
                        + Add Portfolio
                    </button>

                </form>

            </div>



            <!-- PORTFOLIO LIST -->

            <div>

                <div class="mb-6">

                    <h3 class="text-xl font-bold">
                        Portfolio Projects
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        {{ $portfolios->count() }} project(s)
                    </p>

                </div>



                @if($portfolios->count() > 0)

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">


                        @foreach($portfolios as $portfolio)

                            <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">

                                <!-- IMAGE -->

                                @if($portfolio->image)

                                    <div class="h-52 bg-slate-800">

                                        <img
                                            src="{{ $portfolio->image }}"
                                            alt="{{ $portfolio->title }}"
                                            class="w-full h-full object-cover"
                                            loading="lazy"
                                        >

                                    </div>

                                @else

                                    <div class="h-52 bg-slate-800 flex items-center justify-center">

                                        <span class="text-5xl text-slate-600">
                                            +
                                        </span>

                                    </div>

                                @endif



                                <!-- CARD CONTENT -->

                                <div class="p-6">

                                    @if($portfolio->category)

                                        <span class="inline-block px-3 py-1 rounded-full bg-rose-500/10 text-rose-400 text-xs mb-3">
                                            {{ $portfolio->category }}
                                        </span>

                                    @endif


                                    <h4 class="text-xl font-bold mb-2">
                                        {{ $portfolio->title }}
                                    </h4>


                                    @if($portfolio->description)

                                        <p class="text-sm text-slate-500 mb-4">
                                            {{ $portfolio->description }}
                                        </p>

                                    @endif


                                    @if($portfolio->technologies)

                                        <p class="text-xs text-slate-400 mb-5">

                                            <span class="text-slate-600">
                                                Tech:
                                            </span>

                                            {{ $portfolio->technologies }}

                                        </p>

                                    @endif


                                    @if($portfolio->is_featured)

                                        <div class="mb-5">

                                            <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 text-xs">
                                                ★ Featured
                                            </span>

                                        </div>

                                    @endif



                                    <!-- ACTIONS -->

                                    <div class="flex gap-3">

                                        @if($portfolio->project_url)

                                            <a
                                                href="{{ $portfolio->project_url }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="flex-1 text-center px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-sm transition"
                                            >
                                                View Project
                                            </a>

                                        @endif


                                        <form
                                            action="{{ route('admin.portfolio.destroy', $portfolio->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this portfolio?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-4 py-2.5 rounded-xl bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white text-sm transition"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <!-- EMPTY -->

                    <div class="bg-slate-900 border border-dashed border-slate-700 rounded-2xl p-16 text-center">

                        <div class="text-5xl text-slate-600 mb-5">
                            +
                        </div>

                        <h4 class="text-xl font-bold mb-2">
                            No Portfolio Projects
                        </h4>

                        <p class="text-slate-500">
                            Add your first portfolio project using the form above.
                        </p>

                    </div>

                @endif

            </div>

        </section>

    </main>

</div>

</body>

</html>
```
