<!-- Header -->
<header id="home-header" class="home-section" @if( $section->hasMedia('sections-background') )style="background-image: url({{ $section->getFirstMedia('sections-background')->getUrl('bg') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="d-flex justify-content-center flex-column h-100">

            <div class="d-flex align-items-start flex-column">
                <h1 class="align-self-center">
                    @if( $section->hasCustomProperty('title') )
                        {{ $section->getCustomProperty('title') }}
                    @else
                        @lang('sections.header')
                    @endif
                </h1>
            </div>

            <div class="d-flex align-items-center flex-column">
                @if( $section->hasCustomProperty('subtitle') )
                    <h2 class="align-self-center">
                        {{ $section->getCustomProperty('subtitle') }}
                    </h2>
                @else
                    <h2 class="align-self-center">
                        @lang('sections.welcome')
                    </h2>
                @endif
            </div>

            <div class="d-flex align-items-end flex-column">
                @if( $section->hasCustomProperty('content_list') )
                    <h4 class="align-self-center text-center mt-3">
                        {!! $section->getCustomProperty('content_list') !!}
                    </h4>
                @endif
            </div>
        </div>
    </div>
</header>
