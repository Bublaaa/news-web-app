<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-white dark:bg-gray-700">
    @include('./components/nav-bar')
    <!-- Content -->
    <main id="main-content" class="w-full mt-20 p-5 gap-5">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>