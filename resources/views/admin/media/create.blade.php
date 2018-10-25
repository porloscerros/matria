@extends('admin.layouts.app')

@section('content')
    <h1>@lang('media.create')</h1>

    {!! Form::open(['route' => ['admin.media.store'], 'method' =>'POST', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('image', __('media.attributes.image')) !!}
            {!! Form::file('image', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'required']) !!}

            @if ($errors->has('image'))
                <span class="invalid-feedback">{{ $errors->first('image') }}</span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('name', __('media.attributes.name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

            @if ($errors->has('name'))
                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('tags', __('media.attributes.tags')) !!}
            {!! Form::text('tags', null, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : '')]) !!}

            @if ($errors->has('tags'))
                <span class="invalid-feedback">{{ $errors->first('tags') }}</span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('publish', __('media.attributes.publish')) !!}
            {!! Form::hidden('publish', 0) !!}
            {!! Form::checkbox('publish', true, ['class' => 'form-control']) !!}
        </div>

        {{ link_to_route('admin.media.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
