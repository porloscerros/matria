<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @auth
            <meta name="api-token" content="{{ auth()->user()->api_token }}">
        @endauth

        <meta name="description" content="Carteles Tallados en Madera">
        <meta name="keywords" content="traslasierra, cordoba, argentina">
        <meta name="author" content="porloscerros">
        @yield('meta')

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

        <!-- Styles -->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        @stack('styles')

        <!-- Social Media meta tags -->
        @include('shared.social-media.meta-tags')
    </head>

    <body id="page-top">
    <div id="app">
        @include('home-sections/navbar')

        @yield('content')

        @include('shared/footer')
        @include('shared/porloscerros-footer')
    </div>
        <!-- Scripts -->
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ mix('/js/home.js') }}"></script>
        @stack('inline-scripts')
    </body>
</html>
