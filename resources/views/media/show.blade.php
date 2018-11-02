@extends('layouts.app')

@section('social-image', $medium->getUrl())
@section('social-description')@foreach($medium->tags as $tag)#{{ $tag->name }} @endforeach @endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <img src="{{ $medium->getUrl() }}" alt="{{ $medium->name }}" class="card-img-top">

        <div class="card-body">
            <p class="card-text text-center">
                <small class="text-muted">
                    <i class="fa fa-tag" aria-hidden="true"></i>
                        @foreach($medium->tags as $tag)
                            <a href="{{ route('media', ['q' => $tag->name]) }}">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                </small>
            </p>
        </div>
    </div>
</div>
<div class="container-fluid p-3">
    <div class="col d-flex justify-content-end">
        <div class="row align-content-center">
            @include('shared.social-media.share-buttons')
        </div>
    </div>
</div>
@endsection
