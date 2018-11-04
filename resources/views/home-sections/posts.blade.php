<!-- Posts Section -->
<section id="home-posts" class="home-section"  @if( $section->custom->hasBackground() )style="background-image: url({{ $section->background() }});"@endif>
    <div class="container h-100 bg-translucent">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h3 class="m-0 display-4">
                    @if($section->custom->title)
                        {{$section->custom->title}}
                    @else
                        @lang('sections.posts')
                    @endif
                </h3>
                @if($section->custom->subtitle)
                    <h2 class="m-2">
                        {{$section->custom->subtitle}}
                    </h2>
                @endif
            </div>

            @if($posts->count())
            <div class="col d-flex justify-content-end">
                <a href="{{ route('posts') }}" class="btn btn-outline-dark" role="button">@lang('posts.view-all-posts')</a>
            </div>
            @endif

            <div class="container">
            <div class="card-deck">
                @foreach($posts as $post)
                    <div class="card col-md-12 p-3 mb-3 text-dark">
                        <div class="row ">
                            <div class="col-md-4">
                                @if ($post->hasThumbnail())
                                    <a href="{{ route('posts.show', $post)}}" class="">
                                        {{ Html::image($post->thumbnail->getUrl('thumb'), $post->thumbnail->name, ['class' => 'w-100']) }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="h-75">
                                    <h4 class="card-title">{{ $post->title }}</h4>
                                    <p class="card-text text-justify">{!! str_limit($post->content, 100) !!}</p>
                                </div>

                                <a href="{{ route('posts.show', $post)}}" class="align-bottom float-right">@lang('posts.continue-reading')</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
            <div class="col d-flex justify-content-center">
                {{ $posts->fragment('home-posts')->links() }}
            </div>
        </div>
    </div>
</section>
