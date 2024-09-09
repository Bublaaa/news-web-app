@extends('layouts.author-page')
@section('content')
<div class="flex flex-col gap-5">
    <!-- Heading -->
    <h2 class="heading2">Manages Your Articles</h2>
    <div class="flex flex-row gap-5">
        <!-- Articles -->
        <div class="flex flex-col w-full gap-5">
            <!-- Artcile Cards -->
            <div class="grid w-full md:grid-cols-2 grid-cols-1 gap-5 pt-5">
                @foreach($userArticles as $userArticle)
                <div class="w-full rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full h-32 object-cover rounded-lg" src="{{ $userArticle->image_url }}"
                        alt="News Image">
                    <div class="px-6 py-4">
                        <span
                            class="inline-block bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Technology</span>
                        <h3 class="heading3 my-2">{{ $userArticle->title }}</h3>
                        <p class="paragraph line-clamp-2">
                            {{ $userArticle->content }}
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row justify-between">
                        <div class="flex flex-row">
                            <img class="w-10 h-10 rounded-full mr-4" src="https://via.placeholder.com/400x200"
                                alt="Author Image">
                            <div class="text-sm">
                                <h6 class="heading6 leading-none">{{ $user->name }}</h6>
                                <p class="paragraph">
                                    {{ \Carbon\Carbon::parse($userArticle->created_at)->format('M j Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="inline-block mt-2 bg-gray-200 text-gray-800 text-xs font-semibold mr-2 px-3 py-1.5 rounded">
                                {{ ucwords($userArticle->status) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="flex flex-col w-full items-center">
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span
                        class="font-semibold text-gray-900 dark:text-white">10</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">100</span> Entries
                </span>
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    <button
                        class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Prev
                    </button>
                    <button
                        class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                    </button>
                </div>
            </div>
        </div>
        <!-- Create New Articlels -->
        <div class="w-fit flex flex-col rounded-lg shadow-sm  gap-5">
            <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 rounded-lg shadow-md p-5">
                <div class="flex flex-row gap-5">
                    <svg class=" w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                        <path
                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                    </svg>
                    <h4 class="heading4">
                        Create new article
                    </h4>
                </div>
                <p class="paragraph">You need admin permission to publish your article</p>
                <a href="{{ route('author.new.articles') }}" class="primary-button flex-wrap ajax-link">
                    <span class="ml-2">Write New Articles </span>
                </a>
            </div>
            <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 rounded-lg shadow-md p-5">
                <h4 class="heading4">
                    Find your article
                </h4>
                <!-- Searhbar -->
                <form class="w-full flex flex-row gap-5">
                    <input type="search" id="default-search" class="form-text-input"
                        placeholder="Search Mockups, Logos..." required />
                    <button type="submit" class="primary-button">Search</button>
                </form>
                <h4 class="heading4">
                    Sort by status
                </h4>
                <!-- Sory by status -->
                <ul class="flex flex-row overflow-x-scroll no-scrollbar gap-2">
                    <li
                        class="inline-flex w-auto text-gray-900 bg-white dark:bg-gray-700 hover:bg-gray-100 hover:dark:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center dark:text-white dark:focus:ring-gray-800 md:rounded-lg">
                        <a href="#">Draft</a>
                    </li>
                    <li
                        class="inline-flex w-auto text-gray-900 bg-white dark:bg-gray-700 hover:bg-gray-100 hover:dark:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center dark:text-white dark:focus:ring-gray-800 md:rounded-lg">
                        <a href="#">Published</a>
                    </li>
                    <li
                        class="inline-flex w-auto text-gray-900 bg-white dark:bg-gray-700 hover:bg-gray-100 hover:dark:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center dark:text-white dark:focus:ring-gray-800 md:rounded-lg">
                        <a href="#">Review</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection