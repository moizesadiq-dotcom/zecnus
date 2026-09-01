
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - ZACNUS</title>

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

        <!-- LOGIN CARD -->

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
                    CLIENT LOGIN
                </p>

            </div>


            <!-- WELCOME -->

            <div class="mb-7">

                <h2 class="text-xl font-bold">
                    Welcome Back
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Login to access your account and dashboard.
                </p>

            </div>


            <!-- LOGIN FORM -->

            <form
                action="{{ route('login.post') }}"
                method="POST"
            >

                @csrf


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


                <!-- SUCCESS -->

                @if(session('success'))

                    <div class="mb-5 bg-green-900/30 border border-green-700/50 text-green-400 rounded-xl px-4 py-3 text-sm">

                        {{ session('success') }}

                    </div>

                @endif


                <!-- EMAIL -->

                <div class="mb-5">

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
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600 hover:border-gray-700"
                    >

                </div>


                <!-- PASSWORD -->

                <div class="mb-5">

                    <div class="flex items-center justify-between mb-2">

                        <label
                            for="password"
                            class="text-sm font-semibold text-gray-300"
                        >
                            Password
                        </label>

                        <a
                            href="#"
                            class="text-xs text-red-500 hover:text-red-400 transition"
                        >
                            Forgot Password?
                        </a>

                    </div>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-3.5 text-white placeholder-gray-600 outline-none transition focus:border-red-600 focus:ring-1 focus:ring-red-600 hover:border-gray-700"
                    >

                </div>


                <!-- REMEMBER -->

                <div class="flex items-center mb-6">

                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                        value="1"
                        class="w-4 h-4 rounded bg-gray-950 border-gray-700 text-red-600 focus:ring-red-600"
                    >

                    <label
                        for="remember"
                        class="ml-2 text-sm text-gray-400 cursor-pointer"
                    >
                        Remember me
                    </label>

                </div>


                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 active:bg-red-800 py-3.5 rounded-xl font-semibold text-white transition duration-200 shadow-lg shadow-red-600/20 hover:shadow-red-600/30 hover:-translate-y-0.5"
                >
                    Login to Account
                </button>

            </form>


            <!-- DIVIDER -->

            <div class="flex items-center gap-4 my-7">

                <div class="flex-1 h-px bg-gray-800"></div>

                <span class="text-xs text-gray-600">
                    OR
                </span>

                <div class="flex-1 h-px bg-gray-800"></div>

            </div>


            <!-- REGISTER -->

            <div class="text-center">

                <p class="text-sm text-gray-500">

                    Don't have an account?

                    <a
                        href="{{ route('register') }}"
                        class="text-red-500 hover:text-red-400 font-semibold transition"
                    >
                        Create Account
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
