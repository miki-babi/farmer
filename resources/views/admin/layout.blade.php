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
    <div >
        @yield('content')
    </div>

</body>
</html>
