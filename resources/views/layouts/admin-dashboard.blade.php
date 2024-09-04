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
    <div class="flex flex-row  mt-20 p-5 gap-5">
        <!-- Sidebar -->
        <div class="block md:flex-col flex-row rounded-lg md:bg-white md:dark:bg-gray-800 md:p-5 md:shadow-lg h-fit">
            <ul class="flex md:flex-col flex-row overflow-x-scroll no-scrollbar space-x-3 md:space-x-0 md:space-y-3">
                <li class="sidebar-link">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                        <path
                            d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                        <path
                            d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
                    </svg>
                    <a href="{{ route('admin.articles') }}" class="ml-2">Articles</a>
                </li>
                <li class="sidebar-link">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                        <path fill-rule="evenodd"
                            d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('admin.publish-request') }}" class="ml-2">Publish Request</a>
                </li>
                <li class="sidebar-link">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path fill-rule="evenodd"
                            d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                            clip-rule="evenodd" />
                        <path
                            d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                    </svg>
                    <a href="{{ route('admin.users') }}" class="ml-2">Users</a>
                </li>
            </ul>
        </div>
        <!-- Content -->
        <main id="main-content" class="w-full">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
    $(document).ready(function() {
        let currentUrl = window.location.pathname;

        function loadContent(url) {
            if (url === currentUrl) {
                return; // Do nothing if the content is already loaded
            }
            $.ajax({
                url: url,
                method: 'GET',
                success: function(html) {
                    let tempDom = $('<div></div>').append($.parseHTML(html));
                    let newContent = tempDom.find('#main-content').html();
                    $('#main-content').html(newContent);

                    if (typeof flowbite !== 'undefined') {
                        flowbite.init(); // Re-initialize Flowbite components
                    }

                    history.pushState(null, '', url);
                    currentUrl = url;

                    // Reattach event listeners
                    attachListeners();
                    attachRowClickListeners();
                },
                error: function(xhr, status, error) {
                    console.error('There was a problem with the AJAX request:', error);
                }
            });
        }

        function attachListeners() {
            $('.ajax-link').off('click').on('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                const url = $(this).attr('href');
                loadContent(url);
            });
        }

        function handlePopState() {
            $(window).on('popstate', function(event) {
                const url = location.pathname;
                loadContent(url);
            });
        }

        // Initial setup
        attachListeners();
        handlePopState();
    });
    </script>
</body>

</html>