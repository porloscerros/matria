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
        @include('home-sections/navbar')

        @yield('content')

        @include('shared/footer')
        @include('shared/porloscerros-footer')
        <!-- Scripts -->
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ mix('/js/home.js') }}"></script>
        @stack('inline-scripts')

        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- Load Twitter Share JavaScript -->
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>
</html>
