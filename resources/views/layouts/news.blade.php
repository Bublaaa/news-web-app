@extends('layouts.public-news-page')
@section('content')
<div class="flex md:flex-row flex-col mt-20 p-5 gap-5">
    <!-- Side bar -->
    <div class="block md:flex-col flex-row rounded-lg md:bg-white md:dark:bg-gray-800 md:p-5 md:shadow-lg h-fit">
        <h3 class="heading3 p-2 md:block hidden">
            Category
        </h3>
        <ul class="flex md:flex-col flex-row overflow-x-scroll no-scrollbar space-x-3 md:space-x-0 md:space-y-3">
            <li class="category">
                <a href="#">category 1</a>
            </li>
            <li class="category">
                <a href="#">category 2</a>
            </li>
            <li class="category">
                <a href="#">category 3</a>
            </li>
        </ul>
    </div>
    <div>
        <h1 class="heading1">Content</h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-5 pt-5">
            @include('./components/news-card')
            @include('./components/news-card')
            @include('./components/news-card')
            @include('./components/news-card')
            @include('./components/news-card')
        </div>
    </div>
</div>
@endsection