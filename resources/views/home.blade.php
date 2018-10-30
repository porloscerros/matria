@extends('layouts.home')

@section('content')
    @foreach($sections as $section)
        @include('home-sections.'.$section->name)
        <hr>
    @endforeach
@endsection
