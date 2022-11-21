<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', env('APP_NAME'))</title>

    @vite(['resources/css/app.css', 'resources/sass/main.sass', 'resources/js/app.js'])

</head>
<body class="antialiased">
    {{--        @if(session()->has('message'))--}}
    {{--            {{ session('message') }}--}}
    {{--        @endif--}}
    @if( $message = flash()->get() )
        <div class="{{ $message->class() }} py-5">
            {{ $message->message() }}
        </div>
    @endif

<main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
    <div class="container">

        <!-- Page heading -->
        <div class="text-center">
            <a href="" class="inline-block" rel="home">
                {{--                       <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="w-[148px] md:w-[201px] h-[36px] md:h-[50px]" alt="CutCode">--}}
                <img src="{{ Vite::image('logo.svg') }}" class="w-[148px] md:w-[201px] h-[36px] md:h-[50px]" alt="CutCode">
            </a>
        </div>

        @yield('content')
    </div>
</main>
</body>
</html>
