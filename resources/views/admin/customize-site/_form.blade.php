
<div class="form-group">
    {!! Form::label('title', __('customize-site.section-attributes.title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('subtitle', __('customize-site.section-attributes.subtitle')) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control' . ($errors->has('subtitle') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('subtitle'))
        <span class="invalid-feedback">{{ $errors->first('subtitle') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('bg_img_id', __('customize-site.section-attributes.bg-img')) !!}
    {!! Form::select('bg_img_id', $media, null, ['class' => 'form-control', 'placeholder' => 'Pick a image...' . ($errors->has('bg_img_id') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('bg_img_id'))
        <span class="invalid-feedback">{{ $errors->first('bg_img_id') }}</span>
    @endif
</div>
