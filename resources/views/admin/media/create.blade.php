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

        @include('admin.media._form')

    {!! Form::close() !!}
@endsection
