<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Farmer Dashboard')</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"> --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body >

    <nav class="text-white p-4 " x-data={}>
        {{-- <div class=" flex items-center border rounded">
            <button id="menu-toggle" class="text-black focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                  </svg>
            </button>
        </div> --}}
        <div class="sm:hidden bg-gray-100 p-4 rounded-lg shadow-md" x-data="{ open: false }">
            <div class="flex justify-between items-center">
                <div class="w-full flex justify-start">
                    <button @click="open = !open" class="text-black focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                        </svg>
                    </button>
                </div>
            
            
            </div>
            <div x-show="open" class="mt-4">
                <div class="w-full flex justify-end m-4">
                
                    <button @click="open = false" class="text-black focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
            <ul class="space-y-2">
                <li>
                <a href="{{ route('dashboard') }}" class="block px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">Home</a>
                </li>
                <li>
                <a href="{{ route('products.index') }}" class="block px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                    Manage Product
                </a>
                </li>
                <li>
                <a href="{{ route('stocks.index') }}" class="block px-5 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-300">
                    Manage Stock
                </a>
                </li>
                <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full px-5 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition duration-300">
                    Logout
                    </button>
                </form>
                </li>
            </ul>
            </div>
        </div>
        <div class=" hidden sm:flex mx-auto  justify-between">
            {{-- <div class="mb-6 flex justify-between items-center bg-gradient-to-r from-gray-100 to-gray-200 p-4 rounded-lg "> --}}
                <div class="flex space-x-4">
            <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">Home</a>

                <a href="{{ route('products.index') }}" class="px-5 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                    Manage Product
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
