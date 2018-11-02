@extends('admin.layouts.app')

@section('content')
    <h1>@lang('contacts.create')</h1>

    {!! Form::open(['route' => ['admin.contacts.store'], 'method' =>'POST']) !!}
        @include('admin/contacts/_form')

        {{ link_to_route('admin.contacts.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
