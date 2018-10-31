@extends('layouts.app')

@section('body-tag')
    @if( $section->custom->hasBackground() )
        style="background-image: url({{ $section->background() }});"
    @endif
@endsection

@section('content')
    <div class="col d-flex justify-content-start">
        <a href="{{ url()->previous() }}" class="btn btn-default"><< Back</a>
    </div>

  <div class="bg-white p-3 post-card">
    @if ($post->hasThumbnail())
      {{ Html::image($post->thumbnail->getUrl(), $post->thumbnail->name, ['class' => 'card-img-top']) }}
    @endif

    <h1 v-pre>{{ $post->title }}</h1>

    <div class="mb-3">
      <small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->fullname, $post->author) }}</small>,
      <small class="text-muted">{{ humanize_date($post->posted_at) }}</small>
    </div>

    <div v-pre class="post-content">
      {!! $post->content !!}
    </div>
  </div>
@endsection
