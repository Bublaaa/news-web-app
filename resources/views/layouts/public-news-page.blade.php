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
    <div class="flex md:flex-row flex-col mt-20 p-5 gap-5">
        <!-- Side bar -->
        <div class="flex md:flex-col flex-row rounded-lg md:bg-white md:dark:bg-gray-800 md:p-5 md:shadow-lg">
            <h3 class="heading3 p-2 md:block hidden">
                Category
            </h3>
            <ul class="flex md:flex-col flex-row overflow-x-scroll no-scrollbar">
                <li
                    class="flex items-start px-3 py-2 font-medium text-gray-900 md:rounded-lg rounded-full dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <a href="#" class="">
                        <p class="">category 1</p>
                    </a>
                </li>
                <li
                    class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">
                    <a href="#" class="">
                        <p class="">category 2</p>
                    </a>
                </li>
                <li
                    class="flex items-start px-3 py-2 font-medium text-gray-900 md:rounded-lg rounded-full dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <a href="#" class="">
                        <p class="">category 3</p>
                    </a>
                </li>
                <li class="category">
                    <a href="#" class="">
                        <p class="">category 3</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <main id="main-content" class="w-full">
            <h1 class="heading1">Content</h1>
            @yield('content')
            <div class="grid md:grid-cols-3 grid-cols-1 gap-5 pt-5">
                @include('./components/news-card')
                @include('./components/news-card')
                @include('./components/news-card')
                @include('./components/news-card')
                @include('./components/news-card')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>