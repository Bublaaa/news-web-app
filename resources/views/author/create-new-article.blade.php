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
        <div class="flex flex-col gap-2">
            <!-- <label for="banner_image" class="form-label">Banner Image</label> -->
            <div class="mt-2">
                <img src="https://via.placeholder.com/600x400" alt="No image available"
                    class="w-full max-h-80 object-cover rounded-lg">
            </div>
            <input type="file" id="banner_image" name="banner_image" class="form-file-input">

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