@extends('layouts.app')

@section('page-title', ' | ' . __('sections.gallery'))

@section('social-title', __('sections.gallery'))
@section('social-description')@foreach($medium->tags as $tag)#{{ $tag->name }} @endforeach @endsection
@section('social-url', url('/media-card/' . $medium->id))
@section('social-image', $medium->getUrl())

@section('content')
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
            <div class="col-6 d-block justify-content-start">
                <a href="{{ route('media') }}" class="btn btn-nav ml-1" role="button">@lang('media.view-all-gallery')</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                @include('shared.social-media.share-buttons')
            </div>
        </div>
    </div>
@endsection
@push('inline-scripts')
@endpush
