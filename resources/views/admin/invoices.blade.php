
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Invoices - ZACNUS ADMIN</title>

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
                Manage Invoices
            </h2>

            <p class="text-gray-400 text-sm mt-2">
                Create and manage client invoices.
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


        <!-- CREATE INVOICE -->
        <div class="bg-gray-900 p-6 rounded-xl border border-gray-800 mb-8">

            <h3 class="text-xl font-bold mb-5">
                Generate New Invoice
            </h3>


            <form
                action="{{ route('admin.invoices.store') }}"
                method="POST"
                class="grid grid-cols-1 md:grid-cols-2 gap-5"
            >

                @csrf


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

                </div>


                <!-- INVOICE NUMBER -->
                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Invoice Number
                    </label>

                    <input
                        type="text"
                        name="invoice_number"
                        value="{{ old('invoice_number') }}"
                        required
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                        placeholder="INV-001"
                    >

                </div>


                <!-- AMOUNT -->
                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Amount
                    </label>

                    <input
                        type="number"
                        name="amount"
                        value="{{ old('amount') }}"
                        required
                        min="0"
                        step="0.01"
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                        placeholder="1000"
                    >

                </div>


                <!-- DUE DATE -->
                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Due Date
                    </label>

                    <input
                        type="date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                        required
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                    >

                </div>


                <!-- STATUS -->
                <div>

                    <label class="block text-sm text-gray-400 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        required
                        class="w-full bg-gray-950 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                    >

                        <option
                            value="Unpaid"
                            {{ old('status', 'Unpaid') == 'Unpaid' ? 'selected' : '' }}
                        >
                            Unpaid
                        </option>

                        <option
                            value="Paid"
                            {{ old('status') == 'Paid' ? 'selected' : '' }}
                        >
                            Paid
                        </option>

                    </select>

                </div>


                <!-- BUTTON -->
                <div class="md:col-span-2">

                    <button
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-medium transition"
                    >
                        Generate Invoice
                    </button>

                </div>

            </form>

        </div>


        <!-- INVOICES TABLE -->
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">

            <div class="flex justify-between items-center mb-5">

                <h3 class="text-xl font-bold">
                    Existing Invoices
                </h3>

                <span class="text-sm text-gray-500">
                    {{ $invoices->count() }} Invoices
                </span>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead>

                        <tr class="border-b border-gray-700 text-gray-400 text-sm">

                            <th class="py-3 px-2">
                                Invoice
                            </th>

                            <th class="py-3 px-2">
                                Client
                            </th>

                            <th class="py-3 px-2">
                                Amount
                            </th>

                            <th class="py-3 px-2">
                                Due Date
                            </th>

                            <th class="py-3 px-2">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($invoices as $invoice)

                        <tr class="border-b border-gray-700/50 hover:bg-gray-800/50 transition">

                            <!-- INVOICE -->
                            <td class="py-4 px-2 font-medium">
                                {{ $invoice->invoice_number }}
                            </td>


                            <!-- CLIENT -->
                            <td class="py-4 px-2 text-gray-400">

                                {{ $invoice->client->name ?? 'N/A' }}

                                @if($invoice->client)

                                    <div class="text-xs text-gray-600">
                                        {{ $invoice->client->email }}
                                    </div>

                                @endif

                            </td>


                            <!-- AMOUNT -->
                            <td class="py-4 px-2 font-medium">
                                ${{ number_format((float) $invoice->amount, 2) }}
                            </td>


                            <!-- DUE DATE -->
                            <td class="py-4 px-2 text-gray-400">

                                {{ $invoice->due_date }}

                            </td>


                            <!-- STATUS -->
                            <td class="py-4 px-2">

                                @if($invoice->status === 'Paid')

                                    <span class="px-3 py-1 rounded text-xs bg-green-500/10 text-green-400">
                                        {{ $invoice->status }}
                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded text-xs bg-yellow-500/10 text-yellow-400">
                                        {{ $invoice->status }}
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="py-8 text-center text-gray-500"
                            >
                                No invoices found.
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
