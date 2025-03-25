<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Farmer Dashboard')</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"> --}}
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body >

    <nav class="text-white p-4">
        <div class="container mx-auto flex justify-between">
            {{-- <div class="mb-6 flex justify-between items-center bg-gradient-to-r from-gray-100 to-gray-200 p-4 rounded-lg "> --}}
                <div class="flex space-x-4">
            <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">Home</a>

                <a href="{{ route('products.index') }}" class="px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                    Manage Products
                </a>
                <a href="{{ route('stocks.index') }}" class="px-5 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-300">
                    Manage Stock
                </a>
                </div>
                <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-5 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition duration-300">
                    Logout
                    </button>
                </form>
                </div>
            {{-- </div> --}}
        </div>
    </nav>

    <div >
        @yield('content')
    </div>

</body>
</html>
