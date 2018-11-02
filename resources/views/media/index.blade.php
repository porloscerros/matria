@extends('layouts.app')

@section('body-tag')
    @if( $section->custom->hasBackground() )
        style="background-image: url({{ $section->background() }});"
    @endif
@endsection

@section('content')
    <div class="d-flex justify-content-start">
        <a href="{{route('home')}}/#home-gallery" class="btn btn-outline-dark" role="button"><< @lang('navigation.back')</a>
    </div>
    <div class="container-fluid p-3 bg-translucent">
        <div class="page-header d-flex justify-content-between">
          <h1>
              @if($section->custom->title)
                  {{$section->custom->title}}
              @else
                  @lang('sections.gallery')
              @endif
          </h1>
        </div>
        @include('media/_list')
    </div>
@endsection
