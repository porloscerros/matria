@extends('admin.layouts.app')

@section('content')
    <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.users')</h1>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm align-self-center">
                <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
            </a>
        @endif
    </div>

    @include ('admin/users/_list')
@endsection
