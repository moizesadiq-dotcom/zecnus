<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Add Portfolio Project - ZACNUS ADMIN</title>

<script src="https://cdn.tailwindcss.com"></script>
```

</head>

<body class="bg-gray-950 text-white">

```
<div class="min-h-screen p-6 md:p-10">

    <div class="max-w-4xl mx-auto">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div>
                <h1 class="text-3xl font-bold">
                    Add Portfolio Project
                </h1>

                <p class="text-gray-400 mt-2">
                    Ye project Home Page ke Project Showcase mein show hoga.
                </p>
            </div>

            <a
                href="{{ route('admin.portfolio') }}"
                class="inline-block bg-gray-700 hover:bg-gray-600 px-5 py-3 rounded-lg transition"
            >
                ← Back
            </a>

        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-900/40 border border-green-700 text-green-300 px-5 py-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-900/50 border border-red-700 text-red-300 px-5 py-4 rounded-lg">

                <ul class="list-disc ml-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <form
            action="{{ route('admin.portfolio.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-gray-900 border border-gray-800 rounded-xl p-6 md:p-8 space-y-6"
        >

            @csrf

            <div>
                <label class="block text-sm text-gray-400 mb-2">
                    Project Title *
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    placeholder="E-Commerce Website"
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                >
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">
                    Project Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/jpeg,image/png,image/webp"
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-white"
                >

                <p class="text-xs text-gray-500 mt-2">
                    JPG, PNG ya WEBP — maximum 2MB.
                </p>
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">
                    Category
                </label>

                <input
                    type="text"
                    name="category"
                    value="{{ old('category') }}"
                    placeholder="Web Development"
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                >
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">
                    Location
                </label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location') }}"
                    placeholder="Karachi, Pakistan"
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                >
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">
                    Live Website URL
                </label>

                <input
                    type="url"
                    name="live_url"
                    value="{{ old('live_url') }}"
                    placeholder="https://example.com"
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                >
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    placeholder="Project ke baare mein details..."
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-white focus:border-red-600 focus:outline-none"
                >{{ old('description') }}</textarea>
            </div>

            <div class="flex flex-wrap gap-3 pt-2">

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 px-7 py-3 rounded-lg font-semibold transition"
                >
                    Add Portfolio Project
                </button>

                <a
                    href="{{ route('admin.portfolio') }}"
                    class="bg-gray-700 hover:bg-gray-600 px-7 py-3 rounded-lg transition"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>
```

</body>
</html>
