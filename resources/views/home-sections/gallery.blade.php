
<section id="home-gallery" class="home-section"  @if( $section->hasCustomProperty('bg_img') )style="background-image: url({{ $section->getCustomProperty('bg_img') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="d-flex justify-content-center flex-column h-100">

            <div class="d-flex align-items-start flex-column">
                <h3 class="align-self-center p-3 label1">
                    @if( $section->hasCustomProperty('title') )
                        {{ $section->getCustomProperty('title') }}
                    @else
                        @lang('sections.gallery')
                    @endif
                 </h3>
            </div>

            @if( $section->hasCustomProperty('subtitle') )
                <div class="d-flex align-items-start flex-column">
                    <h2 class="align-self-center m-2">
                    {{ $section->getCustomProperty('subtitle') }}
                    </h2>
                </div>
            @endif

            @if($media->count())
                <div class="d-flex align-items-start flex-column">
                    <div class="d-flex align-self-end">
                        @include ('media/_search_form')
                        <a href="{{ route('media') }}" class="btn btn-nav ml-1" role="button">@lang('media.view-all-gallery')</a>
                    </div>
                </div>
            @endif

            <div class="d-flex align-items-center flex-column">
                <div class="align-self-center " id="gallery-deck">
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
                            <p>
                                <span class="badge badge-dark"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                @foreach($medium->tags as $tag)
                                    <a href="{{ route('media', ['q' => $tag->name]) }}">
                                        <span class="badge badge-dark">#{{ $tag->name }}</span>
                                    </a>
                                @endforeach
                            </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col d-flex justify-content-center" id="gallery-paginator">
                    {{ $media->fragment('home-gallery')->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
