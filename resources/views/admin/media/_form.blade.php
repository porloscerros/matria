@php
    $tags = old('tags') ?? (isset($medium) ? $tags : null);
@endphp

<div class="form-group">
    {!! Form::label('name', __('media.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('tags', __('media.attributes.tags')) !!}
    {!! Form::text('tags', $tags, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('tags'))
        <span class="invalid-feedback">{{ $errors->first('tags') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('publish', __('media.attributes.publish')) !!}
    {!! Form::hidden('publish', 0) !!}
    {!! Form::checkbox('publish', true, ['class' => 'form-control']) !!}
</div>


<div class="pull-left">
    {{ link_to_route('admin.media.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
    {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
</div>
