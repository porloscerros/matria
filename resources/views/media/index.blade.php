@extends('layouts.app')

@section('body-tag')
    @if( $section->custom->hasBackground() )
        style="background-image: url({{ $section->background() }});"
    @endif
@endsection

@section('content')
    <div class="container-fluid p-3 bg-translucent">
        <div class="page-header d-flex justify-content-between">
          <h1>@lang('dashboard.media')</h1>
        </div>
        @include('media/_list')
    </div>
@endsection
