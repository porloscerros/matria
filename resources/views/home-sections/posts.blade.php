<!-- Posts Section -->
<section id="home-posts" class="home-section" @if( $section->hasMedia('sections-background') )style="background-image: url({{ $section->getFirstMedia('sections-background')->getUrl('bg') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="d-flex justify-content-center flex-column h-100">
            <div class="d-flex align-items-start flex-column">
                <h3 class="align-self-center label1 pb-3">
                @if( $section->hasCustomProperty('title') )
                    {{ $section->getCustomProperty('title') }}
                @else
                    @lang('sections.posts')
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

        @if($posts->count())
            <div class="d-flex align-items-start flex-column">
                <div class="d-flex align-self-end">
                    <a href="{{ route('posts') }}" class="btn btn-nav" role="button">@lang('posts.view-all-posts')</a>
                </div>
            </div>
        @endif

            <div class="d-flex align-items-center flex-column">
            @foreach($posts as $post)
                <div class="card mb-3 text-dark">
                    <div class="card-body d-flex">
                    @if ($post->hasThumbnail())
                        <a href="{{ route('posts.show', $post)}}" class="">
                            {{ Html::image($post->thumbnail->getUrl('thumb'), $post->thumbnail->name, ['class' => 'd-none d-md-flex']) }}
                        </a>
                    @endif
                        <div class="p-3">
                            <div class="">
                                <h4 class="card-title d-block">{{ $post->title }}</h4>
                                <p class="card-text text-justify d-block">{!! $post->excerpt() !!}</p>
                            </div>

                            <a href="{{ route('posts.show', $post)}}" class="align-bottom d-block float-right">@lang('posts.continue-reading')</a>

                        </div>
                    </div>
                </div>
            @endforeach
                <div class="col d-flex justify-content-center">
                    {{ $posts->fragment('home-posts')->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
