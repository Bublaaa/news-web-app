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
            <h6 class="heading6">{{ ucwords($articleDetail->status) }}</h6>
        </div>
    </div>
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