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
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="site-wrapper">
    @include('layouts.navigation')
    @include('layouts.loader')
    @hasSection('header')
        <div class="page-header-blended m-0 text-center">
            @yield('header')
        </div>
    @endif

    <main class="page-main">
        <div class="container">
            @yield('content')
        </div>
        @include('layouts.loader')
    </main>
    @hasSection('scripts')
        @yield('scripts')
    @endif
</div>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function startLoader() {
        document.getElementById("page-loader").classList.add("active");
    }

    function stopLoader(callback) {

        const loader = document.getElementById("page-loader");

        loader.classList.remove("active");

        // wait for CSS transition to finish
        setTimeout(function () {

            if (callback) {
                callback();
            }

        }, 300); // must match CSS transition time
    }
</script>
</body>
</html>
