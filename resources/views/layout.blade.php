<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notaris-Digital</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

</head>
<body>
    <div class="flex">
        <div class="fixed w-64 bg-gray-800 h-full">
            @include('components.sidebar')
        </div>
        <div class="ml-64 w-full">
            @yield('content', 'tidak ada konten')
        </div>
    </div>
</body>
</html>