
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account - ZACNUS</title>

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

        body {
            background:
                radial-gradient(
                    circle at top right,
                    rgba(220, 38, 38, 0.10),
                    transparent 30%
                ),
                radial-gradient(
                    circle at bottom left,
                    rgba(127, 29, 29, 0.12),
                    transparent 30%
                ),
                #030712;
        }
    </style>

</head>

<body class="min-h-screen bg-gray-950 text-white font-sans">

<div class="min-h-screen flex items-center justify-center px-5 py-10">

    <div class="w-full max-w-md">

        <!-- REGISTER CARD -->

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 shadow-2xl shadow-black/50">

            <!-- BRAND -->

            <div class="text-center mb-8">

                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-red-600/10 border border-red-600/30 mb-5">

                    <span class="text-2xl font-extrabold text-red-600">
                        Z
                    </span>

                </div>

                <h1 class="text-3xl font-extrabold tracking-wide">
                    ZACNUS
                </h1>

                <p class="text-xs text-gray-500 mt-2 tracking-[0.25em]">
                    CLIENT PORTAL
                </p>

            </div>


            <!-- TITLE -->

            <div class="mb-7">

                <h2 class="text-xl font-bold">
                    Create Account
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Create your ZACNUS client account.
                </p>

            </div>


            <!-- ERRORS -->

            @if($errors->any())

                <div class="mb-5 bg-red-900/30 border border-red-700/50 text-red-400 rounded-xl px-4 py-3 text-sm">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <!-- REGISTER FORM -->

            <form
                action="{{ route('register.post') }}"
                method="POST"
                class="space-y-5"
            >

                @csrf


                <!-- NAME -->

                <div>

                    <label
                        for="name"
                        class="block text-sm font-semibold text-gray-300 mb-2"
                    >
                        Full Name
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        placeholder="Enter your full name"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600"
                    >

                </div>


                <!-- EMAIL -->

                <div>

                    <label
                        for="email"
                        class="block text-sm font-semibold text-gray-300 mb-2"
                    >
                        Email Address
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="Enter your email"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600"
                    >

                </div>


                <!-- PHONE -->

                <div>

                    <label
                        for="phone"
                        class="block text-sm font-semibold text-gray-300 mb-2"
                    >
                        Phone Number
                    </label>

                    <input
                        id="phone"
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        autocomplete="tel"
                        placeholder="Enter your phone number"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600"
                    >

                </div>


                <!-- COMPANY -->

                <div>

                    <label
                        for="company_name"
                        class="block text-sm font-semibold text-gray-300 mb-2"
                    >
                        Company Name
                    </label>

                    <input
                        id="company_name"
                        type="text"
                        name="company_name"
                        value="{{ old('company_name') }}"
                        autocomplete="organization"
                        placeholder="Enter company name"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600"
                    >

                </div>


                <!-- PASSWORD -->

                <div>

                    <label
                        for="password"
                        class="block text-sm font-semibold text-gray-300 mb-2"
                    >
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Create a password"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600"
                    >

                </div>


                <!-- CONFIRM PASSWORD -->

                <div>

                    <label
                        for="password_confirmation"
                        class="block text-sm font-semibold text-gray-300 mb-2"
                    >
                        Confirm Password
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm your password"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600"
                    >

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 active:bg-red-800 py-3.5 rounded-xl font-semibold text-white transition duration-200 shadow-lg shadow-red-600/20 hover:-translate-y-0.5"
                >
                    Create Account
                </button>

            </form>


            <!-- LOGIN -->

            <div class="text-center mt-7">

                <p class="text-sm text-gray-500">

                    Already have an account?

                    <a
                        href="{{ route('login') }}"
                        class="text-red-500 hover:text-red-400 font-semibold transition"
                    >
                        Login
                    </a>

                </p>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="text-center mt-6">

            <p class="text-xs text-gray-600">
                © 2026 ZACNUS. All rights reserved.
            </p>

        </div>

    </div>

</div>

</body>

</html>
```
