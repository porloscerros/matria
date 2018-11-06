@extends('layouts.app')

@section('page-title', ' | ' . __('sections.gallery'))

@section('social-title', __('sections.gallery'))
@section('social-description')@lang('sections.gallery-description') @endsection

@if( $section->hasCustomProperty('bg_img') )
    @section('body-styles', 'background-image:url(' . $section->getCustomProperty('bg_img') . ');')
    @section('social-image', url( $section->getCustomProperty('bg_img') ))
@endif

@section('content')
    <div class="row">
        <div class="col-6 d-block justify-content-start">
            <a href="{{route('home')}}/#home-gallery" class="btn btn-outline-dark" role="button"><< @lang('navigation.back')</a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            @include('shared.social-media.share-buttons')
        </div>
    </div>
    <div class="container-fluid p-3 bg-translucent">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h1>
                        @if($section->hasCustomProperty('title'))
                            {{$section->getCustomProperty('title')}}
                        @else
                            @lang('sections.gallery')
                        @endif
                    </h1>
                </div>
                <div class="col-6">
                    <div class="row pull-right px-2">
                    @if(url()->full() !== url()->current())
                        <a href="{{ route('media') }}" class="btn btn-outline-dark mx-1" role="button">@lang('media.view-all-gallery')</a>
                    @endif
                    @include ('media/_search_form')
                    </div>
                </div>
            </div>
        </div>
        @include('media/_list')
    </div>
@endsection
