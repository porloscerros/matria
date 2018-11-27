@extends('layouts.home')

@section('social-image','https://matriatallados.com.ar/storage/146/portada.png')

@section('content')
    @foreach($sections as $section)
        @include('home-sections.'.$section->name)
        <hr>
    @endforeach
@endsection
