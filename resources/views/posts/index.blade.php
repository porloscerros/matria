@extends('layouts.app')

@section('page-title', ' | ' . __('sections.posts'))

@section('social-title', __('sections.posts'))
@section('social-description')@lang('sections.posts-description') @endsection

@if( $section->hasCustomProperty('bg_img') )
    @section('body-styles', 'background-image:url(' . $section->getCustomProperty('bg_img') . ');')
    @section('social-image', url( $section->getCustomProperty('bg_img') ))
@endif

@section('content')
    <div class="row">
        <div class="col-6 d-block justify-content-start">
            <a href="{{route('home')}}/#home-posts" class="btn btn-nav" role="button">@lang('navigation.back')</a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            @include('shared.social-media.share-buttons')
        </div>
    </div>

    <div class="container-fluid p-3 bg-translucent">

      <div class="d-flex justify-content-between">
        <div class="p-2">
          @if (request()->has('q'))
            <h2>{{ trans_choice('posts.search_results', $posts->count(), ['query' => request()->input('q')]) }}</h2>
          @else
            <h2>@lang('posts.last_posts')</h2>
          @endif
        </div>
      </div>

      @include ('posts/_list')
    </div>
@endsection
