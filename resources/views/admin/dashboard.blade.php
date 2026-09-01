<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - ZACNUS</title>

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
                action="{{ route('admin.logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="text-red-600 hover:text-red-500 font-semibold transition"
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

        <div class="flex justify-between items-center mb-10">

            <div>

                <p class="text-red-500 text-sm font-semibold uppercase tracking-wider">
                    Welcome Back
                </p>

                <h2 class="text-3xl font-bold mt-1">
                    Admin Control Panel
                </h2>

            </div>


            <!-- ADMIN -->

            <div class="bg-gray-900 border border-gray-800 px-4 py-3 rounded-xl">

                <p class="text-xs text-gray-500">
                    Logged in as
                </p>

                <p class="text-red-400 font-semibold">
                    {{ $admin->name ?? 'Super Admin' }}
                </p>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- PORTFOLIO QUICK ACTION -->
        <!-- ========================================================= -->

        <div class="bg-gradient-to-r from-red-950/60 to-gray-900
                    border border-red-900/50
                    rounded-2xl
                    p-6
                    mb-8
                    flex
                    items-center
                    justify-between">

            <div>

                <p class="text-red-500 text-sm font-semibold uppercase">
                    Website Portfolio
                </p>

                <h3 class="text-xl font-bold mt-1">
                    Manage Your Portfolio
                </h3>

                <p class="text-gray-400 text-sm mt-1">
                    Add and manage projects displayed on the public website.
                </p>

            </div>


            <div class="flex gap-3">

                <a
                    href="{{ route('admin.portfolio') }}"
                    class="bg-gray-800 hover:bg-gray-700
                           border border-gray-700
                           px-5 py-3
                           rounded-lg
                           font-medium
                           transition"
                >
                    View Portfolio
                </a>


                <a
                    href="{{ route('admin.portfolio.create') }}"
                    class="bg-red-600 hover:bg-red-700
                           px-5 py-3
                           rounded-lg
                           font-semibold
                           transition"
                >
                    + Add Portfolio
                </a>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- STATS GRID -->
        <!-- ========================================================= -->

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">


            <!-- CLIENTS -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800
                        hover:border-red-600/50
                        transition">

                <p class="text-gray-500 text-sm">
                    Total Clients
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $totalClients ?? 0 }}
                </h3>

            </div>


            <!-- ACTIVE PROJECTS -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800
                        hover:border-red-600/50
                        transition">

                <p class="text-gray-500 text-sm">
                    Active Projects
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $activeProjects ?? 0 }}
                </h3>

            </div>


            <!-- COMPLETED -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800
                        hover:border-red-600/50
                        transition">

                <p class="text-gray-500 text-sm">
                    Completed Projects
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $completedProjects ?? 0 }}
                </h3>

            </div>


            <!-- REVENUE -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800
                        hover:border-red-600/50
                        transition">

                <p class="text-gray-500 text-sm">
                    Paid Revenue
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    ${{ number_format($paidRevenue ?? 0, 2) }}
                </h3>

            </div>


            <!-- PENDING -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800">

                <p class="text-gray-500 text-sm">
                    Pending Invoices
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $pendingInvoices ?? 0 }}
                </h3>

            </div>


            <!-- OVERDUE -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800">

                <p class="text-gray-500 text-sm">
                    Overdue Invoices
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $overdueInvoices ?? 0 }}
                </h3>

            </div>


            <!-- OPEN TICKETS -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800">

                <p class="text-gray-500 text-sm">
                    Open Tickets
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $openTickets ?? 0 }}
                </h3>

            </div>


            <!-- TOTAL PROJECTS -->

            <div class="bg-gray-900
                        p-6
                        rounded-xl
                        border border-gray-800">

                <p class="text-gray-500 text-sm">
                    Total Projects
                </p>

                <h3 class="text-3xl font-bold mt-2">
                    {{ $totalProjects ?? 0 }}
                </h3>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- SUPPORT TICKETS -->
        <!-- ========================================================= -->

        <div class="bg-gray-900
                    rounded-xl
                    p-6
                    border border-gray-800">

            <div class="flex justify-between items-center mb-6">

                <div>

                    <h3 class="text-xl font-bold">
                        Client Support Tickets
                    </h3>

                    <p class="text-gray-500 text-sm mt-1">
                        Manage latest client support requests.
                    </p>

                </div>


                <a
                    href="{{ route('admin.tickets') }}"
                    class="text-red-500 hover:text-red-400 text-sm font-medium"
                >
                    View All →
                </a>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead>

                        <tr class="border-b border-gray-800 text-gray-500 text-sm">

                            <th class="py-4 pr-4">
                                Subject
                            </th>

                            <th class="py-4 pr-4">
                                Message
                            </th>

                            <th class="py-4 pr-4">
                                Status
                            </th>

                            <th class="py-4">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($tickets as $ticket)

                        <tr class="border-b border-gray-800/70 hover:bg-gray-800/30">

                            <td class="py-4 pr-4 font-medium">
                                {{ $ticket->subject }}
                            </td>


                            <td class="py-4 pr-4 text-gray-400 text-sm max-w-md">

                                {{ \Illuminate\Support\Str::limit($ticket->message, 80) }}

                            </td>


                            <td class="py-4 pr-4">

                                <span
                                    class="px-3 py-1
                                    bg-yellow-500/10
                                    text-yellow-500
                                    rounded-full
                                    text-xs"
                                >
                                    {{ $ticket->status }}
                                </span>

                            </td>


                            <td class="py-4">

                                <form
                                    action="{{ route('admin.ticket.status', $ticket->id) }}"
                                    method="POST"
                                    class="flex items-center gap-2"
                                >

                                    @csrf

                                    <select
                                        name="status"
                                        class="bg-gray-950
                                               border border-gray-700
                                               rounded-lg
                                               px-3 py-2
                                               text-sm
                                               text-white"
                                    >

                                        <option
                                            value="Pending"
                                            {{ $ticket->status == 'Pending' ? 'selected' : '' }}
                                        >
                                            Pending
                                        </option>

                                        <option
                                            value="In Progress"
                                            {{ $ticket->status == 'In Progress' ? 'selected' : '' }}
                                        >
                                            In Progress
                                        </option>

                                        <option
                                            value="Resolved"
                                            {{ $ticket->status == 'Resolved' ? 'selected' : '' }}
                                        >
                                            Resolved
                                        </option>

                                    </select>


                                    <button
                                        type="submit"
                                        class="bg-red-600
                                               hover:bg-red-700
                                               px-4 py-2
                                               rounded-lg
                                               text-xs
                                               font-semibold"
                                    >
                                        Update
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="4"
                                class="py-10 text-center text-gray-500"
                            >
                                No support tickets found.
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