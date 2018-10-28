
<section id="home-gallery" class="home-section">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h3 class="m-0 display-4">@lang('home.gallery')</h3>
            </div>

            <div class="col d-flex justify-content-end">
                {{ link_to_route('media', __('home.view-all-gallery')) }}
            </div>

            <div class="col-12" id="gallery-deck">
                @foreach($media as $medium)
                    <div class="row">
                        <div class="col d-flex justify-content-center" id="gallery-deck">
                            <a href="#gallery-modal" data-toggle="modal">
                                <img class="img-thumbnail" src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}">
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center" id="gallery-deck">
                        <p>
                            @foreach($medium->tags as $tag)
                                #{{ $tag->name }}
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

<!-- The Gallery Modal -->
@include('home-sections.partials.gallery-modal')
