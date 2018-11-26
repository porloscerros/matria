
<section id="home-gallery" class="home-section"  @if( $section->hasMedia('sections-background') )style="background-image: url({{ $section->getFirstMedia('sections-background')->getUrl('bg') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="d-flex justify-content-center flex-column h-100">

            <div class="d-flex align-items-start flex-column">
                <h3 class="align-self-center label0 mb-0">
                @if( $section->hasCustomProperty('title') )
                    {{ $section->getCustomProperty('title') }}
                @else
                    @lang('sections.gallery')
                @endif
                 </h3>
            </div>

            @if( $section->hasCustomProperty('subtitle') )
            <div class="d-flex align-items-start flex-column">
                <h2 class="align-self-center m-2 label2 my-0">
                {{ $section->getCustomProperty('subtitle') }}
                </h2>
            </div>
            @endif

            @if($media->count())
            <div class="d-flex flex-column">
                <div class="d-flex align-self-end align-items-center my-0">
                    @include ('media/_search_form')
                    <a href="{{ route('media') }}" class="btn btn-nav ml-1" role="button">@lang('media.view-all-gallery')</a>
                </div>
            </div>
            @endif

            <div class="d-flex align-items-center flex-column">
                <div class="align-self-center mt-1" id="gallery-deck">
                @foreach($media as $medium)
                    <div class="row">
                        <div class="col d-flex justify-content-center" id="gallery-deck">
                            <a href="#gallery-modal-home" data-toggle="modal">
                                <img class="img-thumbnail" src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}">
                            </a>
                            <!-- The Gallery Modal -->
                            @include('shared.modals.media', ['modal' => 'home', 'url' => $medium->getUrl(), 'name' => $medium->name])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center" id="gallery-deck">
                        <p class="text-center">
                            <span class="badge"><i class="fa fa-tag" aria-hidden="true"></i></span>
                            @foreach($medium->tags as $tag)
                                <a href="{{ route('media', ['q' => $tag->name]) }}" class="h4">
                                    <span class="badge bg-translucent font-weight-light">#{{ $tag->name }}</span>
                                </a>
                            @endforeach
                        </p>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="col d-flex justify-content-center my-0" id="gallery-paginator">
                    {{ $media->fragment('home-gallery')->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
