<div class="form-group">
    {!! Form::label('name', __('contacts.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('email', __('contacts.attributes.email')) !!}
    {!! Form::text('email',  isset($email) ? $email : '', ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
    {!! Form::hidden('default', true) !!}

    @if ($errors->has('email'))
        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
    @endif
</div>
