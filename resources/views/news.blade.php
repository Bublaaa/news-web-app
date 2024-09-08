@extends('layouts.public-news-page')
@section('content')
<div class="flex md:flex-row flex-col gap-5">
    <!-- Side bar -->
    <div class="block md:flex-col flex-row rounded-lg md:bg-white md:dark:bg-gray-800 md:p-5 md:shadow-lg h-fit">
        <h3 class="heading3 p-2 md:block hidden">
            Category
        </h3>
        <ul class="flex md:flex-col flex-row overflow-x-scroll no-scrollbar space-x-3 md:space-x-0 md:space-y-3">
            @foreach($categories as $category)
            <li class="category">
                <a href="#">{{ ucwords($category->name) }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div>
        <h1 class="heading1">Content</h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-5 pt-5">
            @foreach($articles as $artilce)
            <div class="w-full rounded-lg overflow-hidden shadow-lg">
                <img class="w-full h-32 object-cover rounded-lg" src="{{ $artilce->image_url }}" alt="News Image">
                <div class="px-6 py-4">
                    <span
                        class="inline-block bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Technology</span>
                    <h3 class="heading3 my-2">{{ $artilce->title }}</h3>
                    <p class="paragraph line-clamp-2">
                        {{ $artilce->content }}
                    </p>
                </div>
                <div class="px-6 py-4 flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="https://via.placeholder.com/400x200"
                        alt="Author Image">
                    <div class="text-sm">
                        <h6 class="heading6 leading-none">{{ $artilce->user_id }}</h6>
                        <p class="paragraph">{{ $artilce->created_at }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection