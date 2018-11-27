@extends('layouts.home')

@section('social-image','https://matriatallados.com.ar/storage/146/portada.png')
@section('social-description', 'Sitio Web para mostrar mis trabajos.')

@section('content')
    @foreach($sections as $section)
        @include('home-sections.'.$section->name)
        <hr>
    @endforeach
@endsection
