@extends('layouts.app')

@section('page-title', ' | ' . $post->title)

@section('social-title', $post->title)
@section('social-description', strip_tags($post->excerpt()))

@if ($post->hasThumbnail())
    @section('social-image', url( $post->thumbnail->getUrl() ))
@endif

@section('content')
    <div class="row">
        <div class="col-6 d-block justify-content-start">
            <a href="{{route('posts')}}" class="btn btn-nav" role="button">@lang('navigation.back')</a>
        </div>
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
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            @include('shared.social-media.share-buttons', ['url' => route('posts.show', $post)])
            @include('shared.social-media.share-script')
        </div>
    </div>
@endsection
