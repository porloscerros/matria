@extends('layouts.app')

@section('page-title', ' | ' . __('sections.gallery'))

@section('social-title', __('sections.gallery'))
@section('social-description', strip_tags($medium->getCustomProperty('description')))
@section('social-url', secure_url('/media-card/' . $medium->id))
@section('social-image', secure_url($medium->getUrl()))

@section('content')
    <div class="row">
        <div class="col-6 d-block justify-content-start">
            <a href="{{ route('media') }}" class="btn btn-nav ml-1" role="button">@lang('media.view-all-gallery')</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <img src="{{ $medium->getUrl() }}" alt="{{ $medium->name }}" class="card-img-top">

            <div class="card-body">
                <p class="card-text text-center text-dark">
                    <small class="text-muted">
                        <i class="fa fa-tag" aria-hidden="true"></i>
                        @foreach($medium->tags as $tag)
                            <a href="{{ route('media', ['q' => $tag->name]) }}">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    </small>

                    {!! $medium->getCustomProperty('description') !!}
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end align-items-center">
                @include('shared.social-media.share-buttons', ['url' => secure_url('/media-card/'. $medium->id)])
                @include('shared.social-media.share-script')
            </div>
        </div>
    </div>
@endsection
