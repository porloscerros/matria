@extends('layouts.app')

@section('content')
    <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.media')</h1>
    </div>

    @include('media/_list')
@endsection
