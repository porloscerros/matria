@extends('layouts.app')

@section('page-title', ' | ' . __('sections.gallery'))

@section('social-title', __('sections.gallery'))
@section('social-description')@lang('sections.gallery-description') @endsection

@if( $section->hasMedia('sections-background') )
    @section('body-styles', 'background-image:url(' . $section->getFirstMedia('sections-background')->getUrl('bg') . ');')
    @section('social-image', url( $section->getFirstMedia('sections-background')->getUrl('bg') ))
@endif

@section('content')
    <div class="row">
        <div class="col-6 d-block justify-content-start">
            <a href="{{route('home')}}/#home-gallery" class="btn btn-nav" role="button">@lang('navigation.back')</a>
        </div>
    </div>
    <div class="container-fluid p-3 bg-translucent">
        <div class="page-header mb-1">
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex">
                    <div class="label0 align-items-center">
                        <h1>
                        @if($section->hasCustomProperty('title'))
                            {{$section->getCustomProperty('title')}}
                        @else
                            @lang('sections.gallery')
                        @endif
                        </h1>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                @if(url()->full() !== url()->current())
                    <small class="ml-2">Filtros: {!! $q !!}</small>
                    <a href="{{ route('media') }}" class="btn btn-nav mx-1" role="button">@lang('media.view-all-gallery')</a>
                @else
                    @include ('media/_search_form')
                @endif
                </div>
            </div>
        </div>
        @include('media/_list')
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-end align-items-center">
            @include('shared.social-media.share-buttons', ['url' => secure_url('/media')])
            @include('shared.social-media.share-script')
        </div>
    </div>
@endsection
