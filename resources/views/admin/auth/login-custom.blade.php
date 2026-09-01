<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Secret Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0f19] text-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-[#111827] border border-gray-800 p-8 rounded-xl shadow-2xl w-full max-w-md">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-red-500">Admin Portal</h1>
            <p class="text-xs text-gray-400 mt-1">Restricted Access Only</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 bg-red-950/50 border border-red-800 text-red-200 px-4 py-3 rounded-lg text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" required value="{{ old('email') }}" 
                    class="w-full px-4 py-2 bg-[#0b0f19] border border-gray-700 rounded-lg focus:outline-none focus:border-red-500 text-white text-sm">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required 
                    class="w-full px-4 py-2 bg-[#0b0f19] border border-gray-700 rounded-lg focus:outline-none focus:border-red-500 text-white text-sm">
            </div>

            <button type="submit" 
                class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2.5 rounded-lg transition duration-200 text-sm shadow-lg shadow-red-600/20">
                Login
            </button>
        </form>

    </div>

</body>
</html>