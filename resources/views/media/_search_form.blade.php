
<div class="d-flex align-content-center">
    {!! Form::open(['route' => 'media', 'class' => 'd-flex', 'method' => 'GET']) !!}
        <div class="input-group">
            {!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => __('media.search')]) !!}
        </div>

        <button type="submit" class="btn btn-action">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    {!! Form::close() !!}
</div>
