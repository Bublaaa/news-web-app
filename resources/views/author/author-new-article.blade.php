@extends('layouts.author-page')
@section('content')
<div class="w-full p-5 flex flex-col gap-5  rounded-lg shadow-lg dark:bg-gray-800">
    <!-- Form Start -->
    <form id="newArticleForm" action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col gap-5 p-10">
        @csrf
        <!-- Title Input -->
        <div class="flex flex-col gap-2">
            <!-- <label for="title" class="form-label">Title</label> -->
            <h1 id="title" class="heading1 editable w-fit" contenteditable="true">
                Title
            </h1>
            <input type="hidden" id="titleInput" name="title">
        </div>
        <!-- Image Upload -->
        <div class="flex items-center justify-center w-full">
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" type="file" name="banner_image" class="hidden" />
            </label>
        </div>
        <!-- Content Input -->
        <div class="flex flex-col gap-2">
            <!-- <label for="title" class="form-label">Title</label> -->
            <p id="articleContent" class="paragraph editable w-fit" contenteditable="true">
                Lorem ipsum odor amet, consectetuer adipiscing elit. Himenaeos vulputate mattis accumsan dui tincidunt
                semper. Egestas leo egestas class accumsan commodo lorem justo tortor. Nullam adipiscing lacus ridiculus
                sollicitudin porttitor interdum proin malesuada. Ridiculus natoque rhoncus enim vivamus lobortis
                maecenas nam. Taciti vel tristique tempus etiam sed; velit dui integer. Consequat etiam praesent
                vehicula odio nascetur accumsan tellus. Feugiat gravida ipsum tincidunt; lacinia class ex.
                Netus velit curae nisi ac sagittis. Turpis urna nisi litora sollicitudin montes varius taciti mollis.
                Diam mattis enim fusce tristique praesent aliquam. Ligula feugiat praesent nunc condimentum ut. Auctor
                morbi integer primis laoreet sollicitudin. Mi vel sit sit penatibus varius condimentum bibendum eros.
                Nam ultricies ac hendrerit congue vestibulum quis elementum risus non. Aenean fusce neque habitant
                elementum, est efficitur aptent. Lectus sapien mattis eros nibh neque porta conubia. Urna auctor tortor
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
    <!-- Form End -->
</div>
@endsection