<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    <title>{{config('app.name')}}@yield('page-title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="keywords" content="matria, carteles, tallado, tallado madera, madera, pintado, artesana, artesanias, letrista, las chacras, traslasierra, cordoba, argentina">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('inline-styles')

    <!-- Google Analytics script -->
    @include('shared.google-analytics.gtag')

    <!-- Social Media meta tags -->
    @include('shared.social-media.meta-tags')
</head>
<body class="bg-light" style="@yield('body-styles')">
    <div id="app">
        @include('shared/navbar')

        <div class="container">
            @include('shared/alerts')

            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>

        <div class="bg-translucent">
            @include('shared/footer')
            @include('shared/porloscerros-footer')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('inline-scripts')
</body>
</html>
