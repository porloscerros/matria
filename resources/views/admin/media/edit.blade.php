@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-6"
            <div class="card">
                <img src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}" class="card-img-top">
            </div>
        </div>
    </div>

    {!! Form::model($medium, ['route' => ['admin.media.update', 'id' => $medium->id], 'method' =>'PUT']) !!}

        @include('admin.media._form', ['tags' => $tags, 'tags_list' => $tags_list])

    {!! Form::close() !!}

    <div class="pull-right">
        {!! Form::model($medium, ['method' => 'DELETE', 'route' => ['admin.media.destroy', $medium], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.media.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('media.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    </div>
@endsection
