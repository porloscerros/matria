@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1>@lang('users.create')</h1>

            {!! Form::open(['route' => 'admin.users.store', 'role' => 'form', 'method' => 'POST', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', __('validation.attributes.name'), ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}

                @if ($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('email', __('validation.attributes.email'), ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password', __('validation.attributes.password'), ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', __('validation.attributes.password_confirmation'), ['class' => 'control-label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('avatar', __('users.avatar')) !!}
                {!! Form::file('avatar', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('avatar') ? ' is-invalid' : '')]) !!}

                @if ($errors->has('avatar'))
                    <span class="invalid-feedback">{{ $errors->first('avatar') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::submit(__('forms.save'), ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
