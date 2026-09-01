
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile Settings - ZACNUS</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
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

        <!-- =========================================================
             SIDEBAR
        ========================================================== -->
        <aside
            class="w-64 bg-dark-hero border-r border-dark-border hidden md:flex flex-col justify-between p-6"
        >

            <div class="space-y-8">

                <!-- LOGO -->
                <div class="flex items-center gap-3">

                    <div class="h-8 w-8 bg-accent rounded-lg flex items-center justify-center p-1 shadow-md shadow-accent/20">

                        <img
                            src="{{ asset('image/logo-mark.png') }}"
                            alt="ZACNUS"
                            class="w-full h-full object-contain"
                        >

                    </div>

                    <span class="text-lg font-extrabold tracking-wider text-white uppercase">
                        ZACNUS Portal
                    </span>

                </div>


                <!-- NAVIGATION -->
                <nav class="space-y-2 text-xs font-semibold">

                    <!-- OVERVIEW -->
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


                    <!-- MY PROJECTS -->
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


                    <!-- INVOICES -->
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
            <form method="POST" action="{{ route('logout') }}">

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


        <!-- =========================================================
             MAIN CONTENT
        ========================================================== -->
        <main class="flex-1 overflow-y-auto p-8 space-y-8">

            <!-- HEADER -->
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center pb-6 border-b border-dark-border gap-4"
            >

                <div>

                    <h1 class="text-2xl font-extrabold text-white">
                        Profile Settings
                    </h1>

                    <p class="text-xs text-gray-400 mt-1">
                        Manage your account information, security credentials, and company preferences.
                    </p>

                </div>


                <div class="flex items-center gap-3">

                    <span
                        class="text-xs bg-dark-card border border-dark-border px-3 py-2 rounded-xl text-white font-medium flex items-center shadow-sm"
                    >
                        <i class="fa-solid fa-circle text-[8px] text-green-500 mr-2"></i>
                        Client Account
                    </span>

                </div>

            </div>


            <!-- PROFILE FORM -->
            <form
                action="{{ route('client.profile.update') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6 max-w-4xl"
            >

                @csrf
                @method('PATCH')


                <!-- SUCCESS MESSAGE -->
                @if(session('success'))

                    <div
                        class="p-4 bg-green-500/10 border border-green-500/20 text-green-400 text-xs rounded-xl font-medium"
                    >
                        {{ session('success') }}
                    </div>

                @endif


                <!-- ERRORS -->
                @if($errors->any())

                    <div
                        class="p-4 bg-red-500/10 border border-red-500/20 text-red-400 text-xs rounded-xl font-medium"
                    >

                        <ul class="list-disc list-inside">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- =================================================
                     PROFILE PICTURE
                ================================================== -->
                <div
                    class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl flex items-center gap-6"
                >

                    <div
                        class="w-16 h-16 rounded-2xl bg-accent/20 border border-accent/30 text-accent flex items-center justify-center font-extrabold text-xl shadow-inner overflow-hidden"
                    >

                        @if(!empty($user->profile_photo))

                            <img
                                src="{{ asset($user->profile_photo) }}"
                                alt="Profile"
                                class="w-full h-full object-cover"
                            >

                        @else

                            {{ substr($user->name ?? 'M', 0, 2) }}

                        @endif

                    </div>


                    <div>

                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">
                            Profile Picture
                        </h3>

                        <p class="text-[11px] text-gray-500 mt-0.5">
                            Upload a new avatar. Supported formats: JPG, PNG, GIF (Max size: 800KB).
                        </p>

                        <label
                            class="mt-3 inline-block px-3.5 py-1.5 bg-dark-bg border border-dark-border hover:border-accent text-white rounded-xl text-xs font-bold transition cursor-pointer"
                        >

                            <span>
                                Change Photo
                            </span>

                            <input
                                type="file"
                                name="profile_photo"
                                accept="image/jpeg,image/png,image/gif"
                                class="hidden"
                            >

                        </label>

                    </div>

                </div>


                <!-- =================================================
                     PERSONAL INFORMATION
                ================================================== -->
                <div
                    class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl space-y-4"
                >

                    <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-2">
                        Personal Information
                    </h3>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- NAME -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name ?? '') }}"
                                required
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                            >

                        </div>


                        <!-- EMAIL -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email ?? '') }}"
                                required
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                            >

                        </div>


                        <!-- PHONE -->
                        <div class="md:col-span-2">

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone', $user->phone ?? '') }}"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                                placeholder="+92 300 1234567"
                            >

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     COMPANY INFORMATION
                ================================================== -->
                <div
                    class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl space-y-4"
                >

                    <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-2">
                        Company Information
                    </h3>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- COMPANY NAME -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Company Name
                            </label>

                            <input
                                type="text"
                                name="company_name"
                                value="{{ old('company_name', $user->company_name ?? '') }}"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                                placeholder="ZACNUS Enterprise"
                            >

                        </div>


                        <!-- WEBSITE -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Website (Optional)
                            </label>

                            <input
                                type="text"
                                name="website"
                                value="{{ old('website', $user->website ?? '') }}"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                                placeholder="https://zacnus.com"
                            >

                        </div>


                        <!-- ADDRESS -->
                        <div class="md:col-span-2">

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Business Address
                            </label>

                            <input
                                type="text"
                                name="address"
                                value="{{ old('address', $user->address ?? '') }}"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                                placeholder="Karachi, Sindh, Pakistan"
                            >

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     SECURITY & PASSWORD
                ================================================== -->
                <div
                    class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl space-y-4"
                >

                    <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-2">
                        Security & Password
                    </h3>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- CURRENT PASSWORD -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Current Password
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                placeholder="••••••••"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                            >

                        </div>


                        <!-- NEW PASSWORD -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                New Password
                            </label>

                            <input
                                type="password"
                                name="new_password"
                                placeholder="••••••••"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                            >

                        </div>


                        <!-- CONFIRM PASSWORD -->
                        <div>

                            <label
                                class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1"
                            >
                                Confirm New Password
                            </label>

                            <input
                                type="password"
                                name="new_password_confirmation"
                                placeholder="••••••••"
                                class="w-full bg-dark-bg border border-dark-border rounded-xl px-3.5 py-2.5 text-xs text-white focus:border-accent outline-none transition"
                            >

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     ACCOUNT INFORMATION
                ================================================== -->
                <div
                    class="bg-dark-card border border-dark-border p-6 rounded-2xl shadow-xl space-y-4"
                >

                    <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-2">
                        Account Information
                    </h3>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">

                        <!-- STATUS -->
                        <div
                            class="p-3 bg-dark-bg rounded-xl border border-dark-border"
                        >

                            <span class="text-gray-500 block uppercase text-[10px] font-bold">
                                Status
                            </span>

                            <span class="text-green-400 font-bold mt-1 inline-flex items-center">
                                <i class="fa-solid fa-circle text-[6px] mr-1.5"></i>
                                Active
                            </span>

                        </div>


                        <!-- ROLE -->
                        <div
                            class="p-3 bg-dark-bg rounded-xl border border-dark-border"
                        >

                            <span class="text-gray-500 block uppercase text-[10px] font-bold">
                                Role
                            </span>

                            <span class="text-white font-bold mt-1 block">
                                Client
                            </span>

                        </div>


                        <!-- MEMBER SINCE -->
                        <div
                            class="p-3 bg-dark-bg rounded-xl border border-dark-border"
                        >

                            <span class="text-gray-500 block uppercase text-[10px] font-bold">
                                Member Since
                            </span>

                            <span class="text-white font-bold mt-1 block">
                                {{ optional($user)->created_at ? $user->created_at->format('d M Y') : '15 Aug 2026' }}
                            </span>

                        </div>

                    </div>

                </div>


                <!-- SAVE BUTTON -->
                <div class="flex justify-end">

                    <button
                        type="submit"
                        class="px-6 py-3 bg-accent hover:bg-accent-hover text-white rounded-xl font-bold text-xs shadow-lg shadow-accent/25 transition cursor-pointer"
                    >
                        Save Changes
                    </button>

                </div>

            </form>

        </main>

    </div>

</body>
</html>
```
