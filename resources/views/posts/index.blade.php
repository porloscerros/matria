@extends('layouts.app')

@section('body-tag')
    @if( $section->custom->hasBackground() )
        style="background-image: url({{ $section->background() }});"
    @endif
@endsection

@section('content')
    << Back
<div class="container-fluid p-3 bg-translucent">
    <!-- @include ('posts/_search_form') -->

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
