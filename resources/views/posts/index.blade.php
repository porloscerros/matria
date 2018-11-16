@extends('layouts.app')

@section('page-title', ' | ' . __('sections.posts'))

@section('social-title', __('sections.posts'))
@section('social-description')@lang('sections.posts-description') @endsection

@if( $section->hasMedia('sections-background') )
    @section('body-styles', 'background-image:url(' . $section->getFirstMedia('sections-background')->getUrl('bg') . ');')
    @section('social-image', url( $section->getFirstMedia('sections-background')->getUrl('bg') ))
@endif

@section('content')
    <div class="row">
        <div class="col-6 d-block justify-content-start">
            <a href="{{route('home')}}/#home-posts" class="btn btn-nav" role="button">@lang('navigation.back')</a>
        </div>
    </div>

    <div class="container-fluid p-3 bg-translucent">

        <div class="col-6 d-flex align-items-start flex-column">
            <div class="py-4 px-3 label1">
                @if (request()->has('q'))
                    <h2>{{ trans_choice('posts.search_results', $posts->count(), ['query' => request()->input('q')]) }}</h2>
                @else
                    <h2>@lang('posts.last_posts')</h2>
                @endif
            </div>
        </div>

        @include ('posts/_list')
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            @include('shared.social-media.share-buttons', ['url' => secure_url('/posts')])
        </div>
    </div>
@endsection
