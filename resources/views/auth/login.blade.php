<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - ECSR MAHULU</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app" class="flex h-screen w-screen flex justify-center items-center">
        <div
            class="flex h-2/3 w-full max-w-sm mx-auto overflow-hidden bg-red-200 bg-white rounded-lg shadow-lg  lg:max-w-4xl drop-shadow-2xl">
            <div class="hidden bg-cover lg:block lg:w-1/2"
                style="background-image: url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80');">
            </div>

            <div class="w-full px-6 py-3 md:px-8 lg:w-1/2 flex flex-col justify-center">
                <div class="flex justify-center mx-auto">
                    {{-- <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt=""> --}}
                </div>

                <p class="text-xl text-center text-gray-600  mb-8">
                    SELAMAT DATANG
                </p>

                <form method="POST" action="{{ route('login') }}" class="flex h-2/3 flex-col justify-between">
                    @csrf

                    <div class="row mb-2 ">
                        <label for="email"
                            class="block mb-1 text-base font-medium text-gray-600 ">{{ __('Alamat Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-500 rounded-lg    focus:border-blue-400 focus:ring-opacity-40  focus:outline-none focus:ring focus:ring-blue-300 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="password"
                            class="block mb-1 text-base font-medium text-gray-600 ">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-500 rounded-lg    focus:border-blue-400 focus:ring-opacity-40  focus:outline-none focus:ring focus:ring-blue-300 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row mb-2">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit"
                                class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                                {{ __('MASUK') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                        </div>
                    </div>
                </form>

                {{-- <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b  md:w-1/4"></span>

                <a href="#" class="text-xs text-gray-500 uppercase  hover:underline">or sign up</a>

                <span class="w-1/5 border-b  md:w-1/4"></span>
            </div> --}}
            </div>
        </div>
    </div>
