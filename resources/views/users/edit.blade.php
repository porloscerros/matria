@extends('users.layout', ['tab' => 'profile'])

@section('main_content')
    <div class="card">
        @if ($user->getMedia('avatar')->count())
            <div class="card-img-top text-center avatar-thumb">
                {{ Html::image($user->getMedia('avatar')->first()->getUrl('thumb'), $user->name, ['class' => 'card-img-top']) }}
            </div>
        @endif
        <div class="card-body">
            <h1>@lang('users.profile')</h1>
            <hr class="my-4">

            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update'], 'files' => true]) !!}

            <div class="form-group row">
                {!! Form::label('name', __('users.attributes.name'), ['class' => 'col-sm-3 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.name'), 'required']) !!}

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('email', __('users.attributes.email'), ['class' => 'col-sm-3 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.email'), 'required']) !!}

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('avatar', __('users.attributes.avatar'), ['class' => 'col-sm-3 col-form-label']) !!}
                <div class="col-sm-5">
                    {!! Form::file('avatar', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('avatar') ? ' is-invalid' : '')]) !!}

                    @if ($errors->has('avatar'))
                        <span class="invalid-feedback">{{ $errors->first('avatar') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('extract', __('users.attributes.extract'), ['class' => 'col-sm-3 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::textarea('extract', null, ['class' => 'form-control' . ($errors->has('extract') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.extract')]) !!}

                    @if ($errors->has('extract'))
                        <span class="invalid-feedback">{{ $errors->first('extract') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group col-sm-8">
                <div class="pull-right">
                    {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
