<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4 gap-4 pb-10">
    @include('parts.header')
    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
    @yield('content')
</div>
@vite(['resources/js/app.js'])
</body>
</html>