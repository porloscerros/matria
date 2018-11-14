<!-- Posts Section -->
<section id="home-posts" class="home-section" @if( $section->hasMedia('sections-background') )style="background-image: url({{ $section->getFirstMedia('sections-background')->getUrl('bg') }}) !important;"@endif>
    <div class="container h-100 bg-translucent">
        <div class="d-flex justify-content-center flex-column h-100">

            <div class="d-flex align-items-start flex-column">
                <h3 class="align-self-center p-3 label1">
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
                <div class="align-self-center" >
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
                <div class="col d-flex justify-content-center">
                    {{ $posts->fragment('home-posts')->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
