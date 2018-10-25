@extends('admin.layouts.app')

@section('content')

    {!! Form::model($medium, ['route' => ['admin.media.update', 'id' => $medium->id], 'method' =>'PUT']) !!}

        <div class="form-group">
            <img src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}" width="100">
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
            {!! Form::text('tags', $tags, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : '')]) !!}

            @if ($errors->has('tags'))
                <span class="invalid-feedback">{{ $errors->first('tags') }}</span>
            @endif
        </div>


    <div class="pull-left">
        {{ link_to_route('admin.media.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($medium, ['method' => 'DELETE', 'route' => ['admin.media.destroy', $medium], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.media.delete')]) !!}
    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('media.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}

@endsection
