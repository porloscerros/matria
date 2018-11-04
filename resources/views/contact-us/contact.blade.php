@extends('layouts.app')

@section('content')
    <h1>@lang('contact-us.contact')</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="">
                <p>
                    <span class="fa fa-whatsapp"></span>  Tel/Wapp:
                    <a href="tel:+66666666666"> +54-9-666-6666666</a>
                </p>
            </div>
            <div class="">
                <p>
                    <span class="fa fa-envelope-o"></span> Email:
                    <a href="mailto:darthvader@deathstar.ds"> darthvader@deathstar.ds</a>
                </p>
            </div>
            <div class="">
                <p>
                    <span class="fa fa-map-marker"></span> Porloscerros
                </p>
            </div>

            <div class="map">
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0" allowfullscreen src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2724.6085702970468!2d-65.04691868534806!3d-32.23118798114022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzLCsDEzJzUyLjMiUyA2NcKwMDInNDEuMCJX!5e1!3m2!1ses!2sar!4v1540584711225"></iframe>
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


