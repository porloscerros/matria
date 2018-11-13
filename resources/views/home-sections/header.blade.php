<!-- Header -->
<header id="home-header" class="home-section"  @if( $section->hasCustomProperty('bg_img') )style="background-image: url({{ $section->getCustomProperty('bg_img') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="d-flex justify-content-center flex-column h-100">
            <div class="d-flex align-items-start flex-column">
                <h3 class="align-self-center p-3 label1">
                    @if( $section->hasCustomProperty('title') )
                        {{ $section->getCustomProperty('title') }}
                    @else
                        @lang('sections.header')
                    @endif
                </h3>
            </div>

            <div class="d-flex align-items-center flex-column">
                <h1 class="align-self-center m-3 display-4">
                    {{ config('app.name') }}
                </h1>
            </div>

            <div class="d-flex align-items-end flex-column">
                @if( $section->hasCustomProperty('subtitle') )
                    <h2 class="align-self-center m-2">
                        {{ $section->getCustomProperty('subtitle') }}
                    </h2>
                @else
                    <h2 class="align-self-center m-2">
                        @lang('sections.welcome')
                    </h2>
                @endif
            </div>
        </div>
    </div>
</header>
