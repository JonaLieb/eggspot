<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eggspot') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grids.css') }}">
    <link rel="stylesheet" href="{{ asset('css/surrounded.css') }}">
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="site-wrapper">
    @include('layouts.navigation')
    @hasSection('header')
        <div class="page-header-blended m-0 text-center">
            @yield('header')
        </div>
    @endif

    <main class="page-main">
        <div class="container">
            @yield('content')
        </div>
    </main>
    @hasSection('scripts')
        @yield('scripts')
    @endif
</div>
</body>
</html>
