<!-- Header -->
<header id="home-header" class="home-section"  @if( $section->hasCustomProperty('bg_img') )style="background-image: url({{ $section->getCustomProperty('bg_img') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h3 class="m-1">
                    @if( $section->hasCustomProperty('title') )
                        {{ $section->getCustomProperty('title') }}
                    @else
                        @lang('sections.header')
                    @endif
                </h3>
                <h1 class="m-3 display-4">
                    {{ config('app.name') }}
                </h1>
                @if( $section->hasCustomProperty('subtitle') )
                    <h2 class="m-2">
                        {{ $section->getCustomProperty('subtitle') }}
                    </h2>
                @else
                    <h2 class="m-2">
                        @lang('sections.welcome')
                    </h2>
                @endif
            </div>
        </div>
    </div>
</header>
