<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Farmer Dashboard')</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>

    <nav class="bg-gray-800 text-white p-4" x-data="{ open: false }">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">Home</a>
                <a href="{{ route('products.index') }}" class="hidden md:inline-block px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                    Manage Products
                </a>
                <a href="{{ route('stocks.index') }}" class="hidden md:inline-block px-5 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-300">
                    Manage Stock
                </a>
            </div>
            <div class="md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
            <div class="hidden md:block">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-5 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition duration-300">
                        Logout
                    </button>
                </form>
            </div>
        </div>
        <div x-show="open" class="md:hidden mt-4 space-y-2">
            <a href="{{ route('products.index') }}" class="block px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                Manage Products
            </a>
            <a href="{{ route('stocks.index') }}" class="block px-5 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-300">
                Manage Stock
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full px-5 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition duration-300">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div>
        @yield('content')
    </div>

</body>
</html>
