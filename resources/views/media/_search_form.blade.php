<div class="d-flex">
    {!! Form::open(['route' => 'media', 'class' => 'd-flex', 'method' => 'GET']) !!}
        {!! Form::text('q', null, ['class' => 'form-control  align-self-center', 'placeholder' => __('media.search')]) !!}
        <button type="submit" class="btn btn-action align-self-start">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    {!! Form::close() !!}
</div>
