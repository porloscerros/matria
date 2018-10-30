
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
    {!! Form::label('bg_img', __('customize-site.section-attributes.bg-img')) !!}
    {!! Form::select('bg_img', $media, null, ['class' => 'form-control' . ($errors->has('bg_img') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('bg_img'))
        <span class="invalid-feedback">{{ $errors->first('bg_img') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('text_color', __('customize-site.section-attributes.text-color')) !!}
    <select name="text_color" class="form-control">
        @foreach($colors as $k => $v)
        <option value="{{$k}}" class="{{$k}} bg-translucent" @if($k === $section->text_color) selected @endif>{{$v}}</option>
        @endforeach
    </select>
</div>
