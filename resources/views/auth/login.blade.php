@extends('layouts.public-news-page')
@section('content')
<div class="form-container">
    <div class="flex flex-row max-w-2xl w-full md:mx-auto mx-4 bg-white rounded-2xl shadow-md dark:bg-gray-800 ">
        <form method="POST" action="{{ route('login') }}" class="form w-full">
            <!-- Header -->
            <div class=" flex flex-col">
                <h3 class="heading3">
                    //signIn
                </h3>
                <div class="flex flex-row gap-2">
                    <p class="paragraph">
                        don't have an account yet?
                    </p>
                    <a type="button" href="{{ route('register') }}"
                        class="ajax-link font-medium text-blue-600 dark:text-blue-500 hover:underline">Sign Up</a>
                </div>
            </div>
            <div class="flex flex-col gap-3">
                @csrf
                <!-- Email -->
                <div class="">
                    <label for="email" class="form-label">{{ __('Your email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                    <span class="text-red-500 text-sm mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Password -->
                <div class="">
                    <label for="password" class="form-label">{{ __('Your password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-500 @enderror">
                    @error('password')
                    <span class="text-red-500 text-sm mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Remember Me -->
                <div class="flex items-start ">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                    </div>
                    <label for="remember"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Remember me') }}</label>
                </div>
                @if (Route::has('password.request'))
                <div class="mt-4 text-sm">
                    <a class="text-blue-600 hover:underline dark:text-blue-400" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
                @endif
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('Sign In') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection