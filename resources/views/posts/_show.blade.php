<div class="card text-dark">
    @if ($post->hasThumbnail())
        <a href="{{ route('posts.show', $post)}}">
            {{ Html::image($post->thumbnail->getUrl('thumb'), $post->thumbnail->name, ['class' => 'card-img-top']) }}
        </a>
    @endif

    <div class="card-body">
        <h4 v-pre class="card-title">{{ $post->title }}</h4>
        <p class="card-text text-justify">{!! $post->excerpt() !!}</p>


        <a href="{{ route('posts.show', $post)}}" class="align-bottom float-right">@lang('posts.continue-reading')</a>
    </div>
</div>
