<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <nav class="top-nav navbar navbar-dark bg-dark py-0">
                <div class="container">
                    <a class="navbar-brand px-3" href="{{ url('/') }}">
                        MARKETPLACE
                        {{-- <img src="https://aboudcrm.com/store/wp-content/uploads/2020/04/olive-country.png"
                            alt="Olive Country" width="100"> --}}
                    </a>
                    <ul class="nav ml-auto justify-content-end">
                        @include('layouts.topnav')
                    </ul>
                </div>
            </nav>
        </header>
        <main class="py-4" style="min-height:85vh;">
            @yield('content')
        </main>
        <footer class="bg-dark p-3">
            <div class="container">
                <div class="row justify-content-center">
                    <span class="text-white">
                        Copyright 2020 @ MARKETPLACE
                    </span>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>