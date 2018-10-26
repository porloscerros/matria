@extends('admin.layouts.app')

@section('content')
    <p>@lang('contacts.show') : {{ link_to_route('admin.contacts.show', route('admin.contacts.show', $contact), $contact) }}</p>

    {!! Form::model($contact, ['route' => ['admin.contacts.update', $contact], 'method' =>'PUT']) !!}
        @include('admin/contacts/_form')

        <div class="pull-left">
            {{ link_to_route('admin.contacts.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    {!! Form::model($contact, ['method' => 'DELETE', 'route' => ['admin.contacts.destroy', $contact], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.contacts.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('contacts.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endsection
