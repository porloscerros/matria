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

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('inline-styles')

    <!-- Social Media meta tags -->
    @include('shared.social-media.meta-tags')
</head>
<body class="bg-light" @yield('body-tag')>
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
    @if (Request::is('posts/*'))
        <script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
    @endif
    <script src="{{ mix('/js/app.js') }}"></script>
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
