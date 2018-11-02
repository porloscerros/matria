@extends('admin.layouts.app')

@section('content')
    <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.customize-site')</h1>
    </div>

    @include ('admin/customize-site/_list')
@endsection
