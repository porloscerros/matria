
<section id="home-gallery" class="home-section"  @if( $section->hasCustomProperty('bg_img') )style="background-image: url({{ $section->getCustomProperty('bg_img') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h3 class="m-0 display-4">
                    @if( $section->hasCustomProperty('title') )
                        {{ $section->getCustomProperty('title') }}
                    @else
                        @lang('sections.gallery')
                    @endif
                 </h3>
                @if( $section->hasCustomProperty('subtitle') )
                    <h2 class="m-2">
                    {{ $section->getCustomProperty('subtitle') }}
                    </h2>
                @endif
            </div>

            @if($media->count())
            <div class="col d-flex justify-content-end">
                @include ('media/_search_form')
                <a href="{{ route('media') }}" class="btn btn-outline-dark ml-1" role="button">@lang('media.view-all-gallery')</a>
            </div>
            @endif

            <div class="col-12" id="gallery-deck">
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
</section>
