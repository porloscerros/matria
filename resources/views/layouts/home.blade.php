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
      <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @stack('styles')

    <!-- Facebook meta tags -->
    <meta property="og:url"                content="http://204.48.25.115/" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Matria | Tallados" />
    <meta property="og:description"        content="carteles tallados en madera" />
    <meta property="og:image"              content="http://204.48.25.115/css/img/matria-logo.png" />
    <meta property="fb:app_id"             content="322948551558828" />
  </head>

  <body id="page-top">
    @include('home-sections/navbar')

    @yield('content')

    @include('home-sections/footer')
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ asset('/js/home.js') }}"></script>
    @stack('inline-scripts')
  </body>
</html>
