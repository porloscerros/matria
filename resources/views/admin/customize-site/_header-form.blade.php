
<div class="form-group">
    {!! Form::textarea('content_list', null, ['class' => 'form-control' . ($errors->has('content_list') ? ' is-invalid' : ''), 'placeholder' => __('customize-site.section-attributes.content-list'), 'rows' => 4]) !!}

    @if ($errors->has('content_list'))
        <span class="invalid-feedback">{{ $errors->first('content-list') }}</span>
    @endif
</div>
