@extends('layouts.app')

@section('content')
    <h1>@lang('contact-us.contact')</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="">
                <p>
                    <span class="fa fa-whatsapp"></span>  Tel/Wapp:
                    <a href="tel:+5493454085001"> +54-9-345-4085001</a>
                </p>
            </div>
            <div class="">
                <p>
                    <span class="fa fa-envelope"></span> Email:
                    <a href="mailto:talladoscarteles@gmail.com"> talladoscarteles@gmail.com</a>
                </p>
            </div>
            <div class="">
                <p>
                    <span class="fa fa-map-marker"></span> Las Chacras, Traslasierra
                </p>
            </div>
            <hr>

            <div class="map">
                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108306.15217938386!2d-65.05211983752602!3d-31.972634719983464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzHCsDU4JzIxLjUiUyA2NMKwNTgnNTUuNSJX!5e0!3m2!1ses!2sar!4v1515765912096"></iframe>
                <br/>
                <small>
                    <a href=""></a>
                </small>
            </div>
        </div>

        <div class="col-md-8">
            {!! Form::open(['route' => 'contact.store']) !!}

            <div class="form-group">
                {!! Form::label('name', __('contact-us.name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('email', __('contact-us.email')) !!}
                {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('msg', __('contact-us.message')) !!}
                {!! Form::textarea('msg', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('msg') ? ' is-invalid' : ''), 'required' => 'required']) !!}

                @if ($errors->has('msg'))
                    <span class="invalid-feedback">{{ $errors->first('msg') }}</span>
                @endif
            </div>

            {!! Form::submit(__('forms.actions.send'), ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection


