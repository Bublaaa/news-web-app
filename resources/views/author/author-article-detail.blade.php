@extends('layouts.author-page')
@section('content')
<div class="flex flex-col gap-5">
    <div class="flex flex-row gap-5">
        <div class="inline-flex flex-col w-fit px-6 py-3 gap-2 rounded-lg shadow-lg dark:bg-gray-800">
            <p class="paragraph">Status</p>
            <h6 class="heading6">{{ ucwords($articleDetail->status) }}</h6>
        </div>
        <div class="inline-flex flex-col w-fit px-6 py-3 gap-2 rounded-lg shadow-lg dark:bg-gray-800">
            <p class="paragraph">Created</p>
            <h6 class="heading6">{{ \Carbon\Carbon::parse($articleDetail->created_at)->format('M j Y') }}
            </h6>
        </div>
        <div class="inline-flex flex-col w-fit px-6 py-3 gap-2 rounded-lg shadow-lg dark:bg-gray-800">
            <p class="paragraph">Published</p>
            <h6 class="heading6">{{ \Carbon\Carbon::parse($articleDetail->updated_at)->format('M j Y') }}</h6>
        </div>
        <div class="inline-flex flex-col w-fit px-6 py-3 gap-2 rounded-lg shadow-lg dark:bg-gray-800">
            <p class="paragraph">Version</p>
            <h6 class="heading6">v.{{ ucwords($latestVersion) }}</h6>
        </div>
    </div>
    <div class="flex flex-row gap-5 w-full">
        <form id="newArticleForm" action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full p-10 flex flex-col gap-5 rounded-lg shadow-lg dark:bg-gray-800">
            @csrf
            <!-- Title Input -->
            <div class="flex flex-col gap-2">
                <!-- <label for="title" class="form-label">Title</label> -->
                <h1 id="title" class="heading1 editable w-fit" contenteditable="false">
                    {{ $articleDetail->title }}
                </h1>
                <input type="hidden" id="titleInput" name="title">
            </div>
            <!-- Image View -->
            <img class="h-80 w-full object-cover" src="{{ $articleDetail->image_url }}" alt="image description">

            <!-- Content Input -->
            <div class="flex flex-row gap-5">
                <div class="flex flex-row w-1/4">
                    <img class="w-10 h-10 rounded-full mr-4 object-cover" src="{{ $userDetail->image_url }}"
                        alt="Author Image">
                    <div class="text-sm">
                        <h6 class="heading6 leading-none">{{ $userDetail->name }}</h6>
                        <p class="paragraph">
                            {{ \Carbon\Carbon::parse($articleDetail->created_at)->format('M j Y') }}
                        </p>
                    </div>
                </div>
                <!-- <label for="title" class="form-label">Title</label> -->
                <p id="articleContent" class="paragraph editable w-3/4" contenteditable="false">
                    Lorem ipsum odor amet, consectetuer adipiscing elit. Himenaeos vulputate mattis accumsan dui
                    tincidunt
                    semper. Egestas leo egestas class accumsan commodo lorem justo tortor. Nullam adipiscing lacus
                    ridiculus
                    sollicitudin porttitor interdum proin malesuada. Ridiculus natoque rhoncus enim vivamus lobortis
                    maecenas nam. Taciti vel tristique tempus etiam sed; velit dui integer. Consequat etiam praesent
                    vehicula odio nascetur accumsan tellus. Feugiat gravida ipsum tincidunt; lacinia class ex.
                    Netus velit curae nisi ac sagittis. Turpis urna nisi litora sollicitudin montes varius taciti
                    mollis.
                    Diam mattis enim fusce tristique praesent aliquam. Ligula feugiat praesent nunc condimentum ut.
                    Auctor
                    morbi integer primis laoreet sollicitudin. Mi vel sit sit penatibus varius condimentum bibendum
                    eros.
                    Nam ultricies ac hendrerit congue vestibulum quis elementum risus non. Aenean fusce neque habitant
                    elementum, est efficitur aptent. Lectus sapien mattis eros nibh neque porta conubia. Urna auctor
                    tortor
                    morbi felis dolor lobortis maximus porttitor ipsum.
                </p>
                <input type="hidden" id="contentInput" name="content">
            </div>
            <!-- Submit Button -->
            <div class="flex gap-2">
                <button id="saveButton" type="submit" class="primary-button">Save</button>
                <a href="" class="secondary-button">Cancel</a>
            </div>
        </form>
        <!-- Publish request & article Action -->
        <div class="w-fit h-fit flex flex-col gap-5">
            <!-- Send publish request -->
            <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 rounded-lg shadow-md p-5">
                <div class="flex flex-row gap-5 items-center">
                    <svg class=" w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                    </svg>
                    <h4 class="heading4">
                        Send publish request
                    </h4>
                </div>
                <p class="paragraph">Send your draft article for admin to review</p>
                <form action="{{ route('article-request.store') }}" method="POST">
                    @csrf
                    <!-- Assuming these hidden inputs are necessary -->
                    <input type="text" hidden name="article_id" value="{{ $articleDetail->id }}">
                    <button type="submit" class="primary-button">Send</button>
                </form>
            </div>
            <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 rounded-lg shadow-md p-5">
                <h4 class="heading4">
                    Edit your article
                </h4>
                <ul>
                    <li class="">
                        <a href="#" class="sidebar-link ajax-link group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path
                                    d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>
                            <span class="ml-2">Edit</span>
                        </a>
                    </li>
                    <li>
                        <button id="deleteArticleButton" class="sidebar-link group" data-id="{{ $articleDetail->id }}">
                            <svg class="w-5 h-5 transition duration-75 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" />
                            </svg>
                            <span class="ml-2 text-red-500">Delete</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="deleteArticleModal"
        class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="flex flex-col gap-5 bg-white dark:bg-gray-800 p-5 rounded-lg shadow-lg w-1/3 relative">
            <div class="flex flex-row justify-between w-full">
                <!-- Modal Title -->
                <h3 class="heading3">Delete Article</h3>
                <!-- Close Button -->
                <button id="closeModal"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Delete Form -->
            <form method="POST" action="{{ route('articles.destroy', ['article' => $articleDetail->id]) }}"
                id="deleteArticleForm" class="flex flex-col gap-5">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deleteArticleId" name="article_id" value="">
                <div class="flex flex-col gap-2">
                    <label id="confirmArticleLabel" for="confirmArticleTitle" class="form-label">Type the article name
                        to confirm deletion</label>
                    <input type="text" id="confirmArticleTitle" name="confirm_id" class="form-text-input" required>
                </div>
                <div class="flex gap-2">
                    <!-- Confirm Delete Button -->
                    <button type="submit" id="deleteButton"
                        class="text-red-700 hover:bg-red-700 border-red-700 focus:ring-red-300 border hover:text-white focus:ring-4 font-medium rounded-lg text-sm p-2.5 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
                        Confirm Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection