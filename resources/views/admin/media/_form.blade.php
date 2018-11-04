@push('inline-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@php
    $tags = isset($medium) ? $tags : null;
    $description = isset($medium) ? $medium->getCustomProperty('description') : '';
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
    <select class="form-control" name="tags[]" id="tag_input" multiple="multiple">
        @if(!empty($tags))
            @foreach($tags as $tag)
                <option selected="selected">{{ $tag }}</option>
            @endforeach
        @endif
        @if(!empty($tags_list))
            @foreach($tags_list as $tag)
                <option>{{ $tag }}</option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    {!! Form::label('description', __('media.attributes.description')) !!}
    {!! Form::textarea('description', strip_tags($description), ['class' => 'form-control', 'maxlength'=> 255, 'rows' => 2, 'style' => 'resize:none;' . ($errors->has('description') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('public', __('media.attributes.public')) !!}
    {!! Form::hidden('public', 0) !!}
    {!! Form::checkbox('public', true, ['class' => 'form-control']) !!}
</div>


<div class="pull-left">
    {{ link_to_route('admin.media.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
    {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
</div>

@push('inline-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tag_input').select2({
                tags: true
            });
        });
    </script>
@endpush
