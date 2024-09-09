@extends('layouts.author-page')
@section('content')
<div class="flex flex-col gap-5">
    <h2 class="heading2">Account Setting</h2>

    <div class="flex flex-row gap-5">
        <!-- Display -->
        <div class="w-1/3 flex flex-col gap-5">
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <!-- <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown"
                        class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                    <div id="dropdown"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                    Data</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div class="flex flex-col items-center py-10 gap-2 ">
                    @if(!$userDetail->image_url)
                    <div class="w-24 h-24 rounded-full shadow-lg bg-white dark:bg-gray-700 items-center align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="flex flex-wrap p-5 size-15">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    @else
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $userDetail->image_url }}"
                        alt="{{ $userDetail->name }}" />
                    @endif
                    <h5 class="heading5">{{ $userDetail->name }}</h5>
                    <p class="paragraph">{{ $userDetail->email }}</p>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Article Published :
                        {{ $publishedCount }}</span>
                </div>
            </div>

        </div>
        <!-- Edit Form -->
        <div class="flex flex-col w-full gap-5">
            <form id="editUserForm" action="{{ route('users.update', $userDetail->id) }}" method="POST"
                enctype="multipart/form-data" class="form flex flex-col w-full gap-5">
                @csrf
                @method('PUT')
                <!-- Full Name Input -->
                <div class="flex flex-col gap-2">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $userDetail->name) }}"
                        class="form-text-input" required>
                </div>

                <!-- Email Input -->
                <div class="flex flex-col gap-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $userDetail->email) }}"
                        class="form-text-input" required>
                </div>

                <!-- Image Upload -->
                <div class="flex flex-col items-start justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" name="user_image" class="hidden" />
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-5">
                    <button type="submit" id="saveButton" class="primary-button">Save Changes</button>
                    <a href="" class="secondary-button">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection