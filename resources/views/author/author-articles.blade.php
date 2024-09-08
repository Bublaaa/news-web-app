@extends('layouts.author-page')
@section('content')
<h2 class="heading2">Manages Your Articles</h2>
<div class="flex flex-row gap-5">
    <div class="grid w-full md:grid-cols-3 grid-cols-1 gap-5 pt-5">
        @foreach($userArticles as $userArticle)
        <div class="w-full rounded-lg overflow-hidden shadow-lg">
            <img class="w-full h-32 object-cover rounded-lg" src="{{ $userArticle->image_url }}" alt="News Image">
            <div class="px-6 py-4">
                <span
                    class="inline-block bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Technology</span>
                <h3 class="heading3 my-2">{{ $userArticle->title }}</h3>
                <p class="paragraph line-clamp-2">
                    {{ $userArticle->content }}
                </p>
            </div>
            <div class="px-6 py-4 flex items-center">
                <img class="w-10 h-10 rounded-full mr-4" src="https://via.placeholder.com/400x200" alt="Author Image">
                <div class="text-sm">
                    <h6 class="heading6 leading-none">{{ $user->name }}</h6>
                    <p class="paragraph">{{ $userArticle->created_at }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Create New Articlels -->
    <div class="w-fit flex flex-col rounded-lg shadow-sm  gap-5">
        <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 rounded-lg shadow-md p-5">
            <h4 class="heading4">
                Create new article
            </h4>
            <p class="paragraph">You need admin permission to publish your article</p>
            <a href="{{ route('author.new.articles') }}" class="primary-button flex-wrap ajax-link">
                <span class="ml-2">Write New Articles </span>
            </a>
        </div>

        <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 rounded-lg shadow-md p-5">
            <h4 class="heading4">
                Articles List
            </h4>
            <div class="flex-wrap space-y-2">
                @foreach($userArticles as $userArticle)
                <span
                    class="inline-block w-fit bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-3 py-2 rounded cursor-pointer edit-category">
                    {{ ucwords($userArticle->title) }}
                </span>
                @endforeach
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="editModal"
            class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
            <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 p-5 rounded-lg shadow-lg w-1/3 relative">
                <div class="flex flex-row justify-between w-full">
                    <!-- Modal Title -->
                    <h3 class="heading3">Edit Category</h3>
                    <!-- Close Button -->
                    <button id="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Content -->
                <form id="editCategoryForm" method="POST" action="" class="flex flex-col gap-5">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="categoryId" name="category_id" value="">
                    <div class="flex flex-row gap-5 items-end">
                        <div class="flex flex-col w-full gap-2">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" id="categoryName" name="name" class="form-text-input" required>
                        </div>
                        <!-- Delete button -->
                        <button type="button" id="openDeleteModal"
                            class="text-red-700 hover:bg-red-700 border-red-700 border-red-700 focus:ring-red-300 h-fit border hover:text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24 ">
                                <path fill-rule="evenodd"
                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Icon description</span>
                        </button>
                    </div>
                    <div class="flex gap-2">
                        <!-- Save Button -->
                        <button type="submit" class="primary-button">
                            Save
                        </button>
                    </div>
                </form>
                <!-- Delete Form -->
                <form method="POST" action="" id="deleteCategoryForm" class="flex flex-col gap-5 hidden">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteCategoryId" name="category_id" value="">
                    <div class="flex flex-col gap-2">
                        <label id="confirmCategoryNameLabel" for="confirmCategoryName" class="form-label">Type the
                            category name to confirm
                            deletion</label>
                        <input type="text" id="confirmCategoryName" name="confirm_name" class="form-text-input"
                            required>
                    </div>
                    <div class="flex gap-2">
                        <!-- Confirm Delete Button -->
                        <button type="submit"
                            class="text-red-700 hover:bg-red-700 border-red-700 border-red-700 focus:ring-red-300 h-fit border hover:text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
                            Confirm Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection