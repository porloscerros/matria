<!-- Open Graph data -->
<meta property="og:locale" content="{{ app()->getLocale() }}" />
<meta property="og:title" content="@yield('social-title', config('app.name'))" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="@yield('social-description', 'Description of your content here')" />
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
<meta property="og:image" content="@yield('social-image', asset('img/logo.svg'))" />
<meta property="fb:admins" content="{{ env('FB_ADMINS') }}" />
<!--  Non-Essential, But Required for Analytics -->
<meta property="fb:app_id" content="{{ env('FB_APP_ID') }}" />


<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="{{ env('TWITTER_ID') }}"/>
<meta name="twitter:title" content="@yield('social-title', config('app.name', 'Laravel'))"/>
<meta name="twitter:description" content="@yield('social-description', 'Description of your content here')"/>
<meta name="twitter:creator" content="{{ env('TWITTER_ID') }}"/>
<!-- Twitter Summary card images must be at least 200x200px -->
<meta name="twitter:image" content="@yield('social-image', asset('img/logo.svg'))"/>
<meta name="twitter:image:alt" content="@yield('social-img-alt', config('app.name', 'Laravel'))">
