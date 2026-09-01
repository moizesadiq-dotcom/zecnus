
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Support Tickets - ZACNUS ADMIN</title>

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

        <!-- PAGE HEADER -->
        <div class="mb-8">

            <h2 class="text-3xl font-bold">
                Client Support Tickets
            </h2>

            <p class="text-gray-400 text-sm mt-2">
                View and manage support requests from ZACNUS clients.
            </p>

        </div>


        <!-- SUCCESS MESSAGE -->
        @if(session('success'))

            <div class="mb-6 bg-green-900/50 border border-green-700 text-green-300 px-5 py-3 rounded-lg">
                {{ session('success') }}
            </div>

        @endif


        <!-- TICKETS TABLE -->
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">

            <div class="flex justify-between items-center mb-5">

                <h3 class="text-xl font-bold">
                    All Support Tickets
                </h3>

                <span class="text-sm text-gray-500">
                    {{ $tickets->count() }} Tickets
                </span>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left border-collapse">

                    <thead>

                        <tr class="border-b border-gray-700 text-gray-400 text-sm">

                            <th class="py-3 px-2">
                                Subject
                            </th>

                            <th class="py-3 px-2">
                                Client
                            </th>

                            <th class="py-3 px-2">
                                Message
                            </th>

                            <th class="py-3 px-2">
                                Status
                            </th>

                            <th class="py-3 px-2">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($tickets as $ticket)

                        <tr class="border-b border-gray-700/50 hover:bg-gray-800/50 transition">

                            <!-- SUBJECT -->
                            <td class="py-4 px-2 font-medium">
                                {{ $ticket->subject }}
                            </td>


                            <!-- CLIENT -->
                            <td class="py-4 px-2 text-gray-400 text-sm">

                                {{ $ticket->client->name ?? 'N/A' }}

                                @if($ticket->client)

                                    <div class="text-xs text-gray-600">
                                        {{ $ticket->client->email }}
                                    </div>

                                @endif

                            </td>


                            <!-- MESSAGE -->
                            <td class="py-4 px-2 text-gray-400 text-sm max-w-md">

                                <div class="truncate">
                                    {{ $ticket->message }}
                                </div>

                            </td>


                            <!-- STATUS -->
                            <td class="py-4 px-2">

                                @if($ticket->status == 'Resolved')

                                    <span class="px-3 py-1 bg-green-500/10 text-green-400 rounded text-xs">
                                        {{ $ticket->status }}
                                    </span>

                                @elseif($ticket->status == 'In Progress')

                                    <span class="px-3 py-1 bg-blue-500/10 text-blue-400 rounded text-xs">
                                        {{ $ticket->status }}
                                    </span>

                                @else

                                    <span class="px-3 py-1 bg-yellow-500/10 text-yellow-400 rounded text-xs">
                                        {{ $ticket->status }}
                                    </span>

                                @endif

                            </td>


                            <!-- ACTION -->
                            <td class="py-4 px-2">

                                <form
                                    action="{{ route('admin.ticket.status', $ticket->id) }}"
                                    method="POST"
                                    class="flex items-center gap-2"
                                >

                                    @csrf

                                    <select
                                        name="status"
                                        class="bg-gray-950 border border-gray-700 rounded-lg px-3 py-2 text-sm text-white focus:border-red-600 focus:outline-none"
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
                                        class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-xs font-semibold transition"
                                    >
                                        Update
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
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
```
