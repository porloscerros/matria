<!-- Open Graph data -->
<meta property="og:locale" content="{{ app()->getLocale() }}" />
<meta property="og:title" content="@yield('social-title', config('app.name', 'Laravel'))" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:description" content="@yield('social-description', 'Description of your content here')" />
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
<meta property="og:image" content="@yield('social-image', asset('img/logo.svg'))" />
<meta property="fb:admins" content="ID numérico de Facebook" />
<!--  Non-Essential, But Required for Analytics -->
<meta property="fb:app_id" content="your_app_id" />


<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="@yourusername"/>
<meta name="twitter:title" content="@yield('social-title', config('app.name', 'Laravel'))"/>
<meta name="twitter:description" content="@yield('social-description', 'Description of your content here')"/>
<meta name="twitter:creator" content="@yourusername"/>
<!-- Twitter Summary card images must be at least 200x200px -->
<meta name="twitter:image" content="@yield('social-image', asset('img/logo.svg'))"/>
<meta name="twitter:image:alt" content="Alt text for image">
