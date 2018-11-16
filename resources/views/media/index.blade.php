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
        <div class="page-header">
            <div class="row">
                <div class="col-6 d-flex align-items-start flex-column">
                    <div class="p-3 label1">
                        <h1>
                            @if($section->hasCustomProperty('title'))
                                {{$section->getCustomProperty('title')}}
                            @else
                                @lang('sections.gallery')
                            @endif
                        </h1>
                    </div>
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
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            @include('shared.social-media.share-buttons', ['url' => secure_url('/media')])
        </div>
    </div>
@endsection
