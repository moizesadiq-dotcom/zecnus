<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Invoices - ZACNUS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    fontFamily: {
                        sans: [
                            'Plus Jakarta Sans',
                            'sans-serif'
                        ]
                    },

                    colors: {

                        accent: {
                            DEFAULT: '#E61C1C',
                            hover: '#C81313'
                        },

                        dark: {
                            bg: '#0D0F12',
                            card: '#16191E',
                            border: '#242830',
                            hero: '#121419'
                        }

                    }

                }

            }

        }

    </script>

</head>


<body class="bg-dark-bg text-gray-300 font-sans antialiased">


<div class="flex h-screen overflow-hidden">


    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside
        class="w-64 bg-dark-hero border-r border-dark-border hidden md:flex flex-col justify-between p-6"
    >

        <div class="space-y-8">


            <!-- LOGO -->

            <div class="flex items-center gap-3">

                <div
                    class="h-8 w-8 bg-accent rounded-lg flex items-center justify-center p-1 shadow-md shadow-accent/20"
                >

                    <img
                        src="{{ asset('image/logo-mark.png') }}"
                        alt="ZACNUS"
                        class="w-full h-full object-contain"
                    >

                </div>

                <span
                    class="text-lg font-extrabold tracking-wider text-white uppercase"
                >
                    ZACNUS Portal
                </span>

            </div>


            <!-- NAVIGATION -->

            <nav class="space-y-2 text-xs font-semibold">


                <!-- DASHBOARD -->

                <a
                    href="{{ route('client.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->routeIs('client.dashboard')
                        ? 'bg-accent text-white shadow-lg shadow-accent/20'
                        : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                >

                    <i class="fa-solid fa-chart-pie"></i>

                    Overview

                </a>


                <!-- PROJECTS -->

                <a
                    href="{{ route('client.projects') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->routeIs('client.projects', 'client.project.detail')
                        ? 'bg-accent text-white shadow-lg shadow-accent/20'
                        : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                >

                    <i class="fa-solid fa-code"></i>

                    My Projects

                </a>


                <!-- SERVICES -->

                <a
                    href="{{ route('client.services') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->routeIs('client.services')
                        ? 'bg-accent text-white shadow-lg shadow-accent/20'
                        : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                >

                    <i class="fa-solid fa-briefcase"></i>

                    Services

                </a>


                <!-- INVOICES ACTIVE -->

                <a
                    href="{{ route('client.invoices') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->routeIs('client.invoices')
                        ? 'bg-accent text-white shadow-lg shadow-accent/20'
                        : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                >

                    <i class="fa-solid fa-file-invoice-dollar"></i>

                    Invoices

                </a>


                <!-- SUPPORT -->

                <a
                    href="{{ route('client.support') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->routeIs('client.support')
                        ? 'bg-accent text-white shadow-lg shadow-accent/20'
                        : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                >

                    <i class="fa-solid fa-headset"></i>

                    Support Tickets

                </a>


                <!-- PROFILE -->

                <a
                    href="{{ route('client.profile') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->routeIs('client.profile')
                        ? 'bg-accent text-white shadow-lg shadow-accent/20'
                        : 'text-gray-400 hover:bg-dark-card hover:text-white transition' }}"
                >

                    <i class="fa-solid fa-user-gear"></i>

                    Profile Settings

                </a>

            </nav>

        </div>


        <!-- LOGOUT -->

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 text-xs font-semibold transition cursor-pointer"
            >

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </button>

        </form>

    </aside>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main
        class="flex-1 overflow-y-auto p-8 space-y-8"
    >


        <!-- HEADER -->

        <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b border-dark-border gap-4"
        >

            <div>

                <h1
                    class="text-2xl font-extrabold text-white"
                >
                    Billing & Invoices
                </h1>

                <p class="text-xs text-gray-400 mt-1">
                    View your invoices, payment status and due dates.
                </p>

            </div>


            <div class="flex items-center gap-3">

                <span
                    class="text-xs bg-dark-card border border-dark-border px-3 py-2 rounded-xl text-white font-medium flex items-center shadow-sm"
                >

                    <i
                        class="fa-solid fa-circle text-[8px] text-green-500 mr-2"
                    ></i>

                    {{ $user->name ?? 'Client' }}

                </span>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- SUCCESS MESSAGE -->
        <!-- ===================================================== -->

        @if(session('success'))

            <div
                class="bg-green-500/10 border border-green-500/30 text-green-400 px-5 py-4 rounded-xl"
            >

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            </div>

        @endif


        <!-- ===================================================== -->
        <!-- INVOICE SUMMARY -->
        <!-- ===================================================== -->

        <div
            class="grid grid-cols-1 md:grid-cols-3 gap-5"
        >


            <!-- TOTAL -->

            <div
                class="bg-dark-card border border-dark-border p-5 rounded-2xl"
            >

                <div class="flex justify-between items-center">

                    <span
                        class="text-xs text-gray-400 font-bold uppercase"
                    >
                        Total Invoices
                    </span>

                    <div
                        class="w-9 h-9 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-file-invoice"></i>

                    </div>

                </div>

                <div
                    class="text-2xl font-extrabold text-white mt-3"
                >
                    {{ $invoices->count() }}
                </div>

            </div>


            <!-- PAID -->

            <div
                class="bg-dark-card border border-dark-border p-5 rounded-2xl"
            >

                <div class="flex justify-between items-center">

                    <span
                        class="text-xs text-gray-400 font-bold uppercase"
                    >
                        Paid
                    </span>

                    <div
                        class="w-9 h-9 rounded-xl bg-green-500/10 text-green-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-check"></i>

                    </div>

                </div>

                <div
                    class="text-2xl font-extrabold text-white mt-3"
                >
                    {{ $invoices->where('status', 'Paid')->count() }}
                </div>

            </div>


            <!-- UNPAID -->

            <div
                class="bg-dark-card border border-dark-border p-5 rounded-2xl"
            >

                <div class="flex justify-between items-center">

                    <span
                        class="text-xs text-gray-400 font-bold uppercase"
                    >
                        Unpaid
                    </span>

                    <div
                        class="w-9 h-9 rounded-xl bg-yellow-500/10 text-yellow-400 flex items-center justify-center"
                    >

                        <i class="fa-solid fa-clock"></i>

                    </div>

                </div>

                <div
                    class="text-2xl font-extrabold text-white mt-3"
                >
                    {{ $invoices->whereIn('status', ['Unpaid', 'Pending'])->count() }}
                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- INVOICES TABLE -->
        <!-- ===================================================== -->

        <div
            class="bg-dark-card border border-dark-border rounded-2xl p-6 shadow-xl"
        >

            <div
                class="flex justify-between items-center mb-6"
            >

                <div>

                    <h3
                        class="text-sm font-bold text-white uppercase tracking-wider"
                    >
                        All Invoices
                    </h3>

                    <p
                        class="text-xs text-gray-500 mt-1"
                    >
                        Invoices generated by ZACNUS for your account.
                    </p>

                </div>

            </div>


            <div class="overflow-x-auto">

                <table
                    class="w-full text-left text-xs text-gray-300"
                >

                    <thead
                        class="bg-dark-bg text-gray-500 uppercase tracking-wider border-b border-dark-border"
                    >

                        <tr>

                            <th class="p-3.5">
                                Invoice #
                            </th>

                            <th class="p-3.5">
                                Amount
                            </th>

                            <th class="p-3.5">
                                Issue Date
                            </th>

                            <th class="p-3.5">
                                Due Date
                            </th>

                            <th class="p-3.5">
                                Status
                            </th>

                            <th class="p-3.5 text-right">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody
                        class="divide-y divide-dark-border"
                    >


                        @forelse($invoices as $invoice)

                            <tr
                                class="hover:bg-dark-bg/40 transition"
                            >


                                <!-- INVOICE NUMBER -->

                                <td
                                    class="p-4 font-bold text-white"
                                >

                                    {{ $invoice->invoice_number }}

                                </td>


                                <!-- AMOUNT -->

                                <td
                                    class="p-4 text-white font-bold"
                                >

                                    ${{ number_format((float) $invoice->amount, 2) }}

                                </td>


                                <!-- ISSUE DATE -->

                                <td
                                    class="p-4 text-gray-400"
                                >

                                    {{ $invoice->created_at ? $invoice->created_at->format('d M Y') : '-' }}

                                </td>


                                <!-- DUE DATE -->

                                <td
                                    class="p-4 text-red-400 font-medium"
                                >

                                    {{ $invoice->due_date ? $invoice->due_date->format('d M Y') : 'No deadline' }}

                                </td>


                                <!-- STATUS -->

                                <td class="p-4">

                                    @php

                                        $status = $invoice->status;

                                        $badgeClass = match ($status) {

                                            'Paid' =>
                                                'bg-green-500/10 text-green-400',

                                            'Pending',
                                            'Unpaid' =>
                                                'bg-yellow-500/10 text-yellow-400',

                                            'Overdue' =>
                                                'bg-red-500/10 text-red-400',

                                            default =>
                                                'bg-blue-500/10 text-blue-400',

                                        };

                                    @endphp


                                    <span
                                        class="px-2.5 py-1 rounded-md font-semibold text-[10px] {{ $badgeClass }}"
                                    >

                                        {{ $status }}

                                    </span>

                                </td>


                                <!-- ACTION -->

                                <td
                                    class="p-4 text-right"
                                >

                                    <button
                                        type="button"
                                        onclick="window.print()"
                                        class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-dark-bg border border-dark-border text-white hover:border-accent transition font-bold text-[11px]"
                                    >

                                        <i
                                            class="fa-solid fa-print text-accent"
                                        ></i>

                                        Print

                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="p-12 text-center"
                                >

                                    <div
                                        class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-dark-bg border border-dark-border flex items-center justify-center"
                                    >

                                        <i
                                            class="fa-solid fa-file-invoice text-gray-600 text-xl"
                                        ></i>

                                    </div>

                                    <h4
                                        class="text-white font-bold mb-1"
                                    >
                                        No Invoices Yet
                                    </h4>

                                    <p
                                        class="text-gray-500 text-xs"
                                    >
                                        No invoices have been generated for your account yet.
                                    </p>

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