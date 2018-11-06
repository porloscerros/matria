@php
    $posted_at = old('posted_at') ?? (isset($post) ? $post->posted_at->format('Y-m-d\TH:i') : null);
@endphp

<div class="form-group">
    {!! Form::label('title', __('posts.attributes.title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('author_id', __('posts.attributes.author')) !!}
        {!! Form::select('author_id', $users, null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'required']) !!}

        @if ($errors->has('author_id'))
            <span class="invalid-feedback">{{ $errors->first('author_id') }}</span>
        @endif
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('posted_at', __('posts.attributes.posted_at')) !!}
        <input type="datetime-local" name="posted_at" class="form-control {{ ($errors->has('posted_at') ? ' is-invalid' : '') }}" required value="{{ $posted_at ? : \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">

        @if ($errors->has('posted_at'))
            <span class="invalid-feedback">{{ $errors->first('posted_at') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('thumbnail_id', __('posts.attributes.thumbnail')) !!}
    {!! Form::select('thumbnail_id', $media, null, ['placeholder' => __('posts.placeholder.thumbnail'), 'class' => 'form-control' . ($errors->has('thumbnail_id') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('thumbnail_id'))
        <span class="invalid-feedback">{{ $errors->first('thumbnail_id') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('content', __('posts.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('public', __('media.attributes.publish')) !!}
    {!! Form::hidden('public', 0) !!}
    {!! Form::checkbox('public', true, isset($post) ? $post->public : false) !!}
</div>
