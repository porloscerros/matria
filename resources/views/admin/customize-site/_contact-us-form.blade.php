
<div class="form-group">
    {!! Form::label('phone', __('contact-us.phone')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('phone'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('email', __('contact-us.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('email'))
        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('location', __('contact-us.location')) !!}
    {!! Form::text('location', null, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('location'))
        <span class="invalid-feedback">{{ $errors->first('location') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('fb_page', __('contact-us.fb_page')) !!}
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">facebook.com/</div>
        </div>
        {!! Form::text('fb_page', null, ['class' => 'form-control', 'placeholder' => 'your-page' . ($errors->has('fb_page') ? ' is-invalid' : '')]) !!}
    </div>

    @if ($errors->has('fb_page'))
        <span class="invalid-feedback">{{ $errors->first('fb_page') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('instagram', __('contact-us.instagram')) !!}
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'username' . ($errors->has('instagram') ? ' is-invalid' : '')]) !!}
    </div>
    @if ($errors->has('instagram'))
        <span class="invalid-feedback">{{ $errors->first('instagram') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('twitter', __('contact-us.twitter')) !!}
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'username' . ($errors->has('twitter') ? ' is-invalid' : '')]) !!}
    </div>

    @if ($errors->has('twitter'))
        <span class="invalid-feedback">{{ $errors->first('twitter') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('google_plus', __('contact-us.google_plus')) !!}
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">plus.google.com/u/0/</div>
        </div>
        {!! Form::text('google_plus', null, ['class' => 'form-control', 'placeholder' => 'user-id' . ($errors->has('google_plus') ? ' is-invalid' : '')]) !!}
    </div>

    @if ($errors->has('google_plus'))
        <span class="invalid-feedback">{{ $errors->first('google_plus') }}</span>
    @endif
</div>
