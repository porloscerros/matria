@extends('layouts.home')

@section('content')
    @include('home-sections.header')
    <hr>
    @include('home-sections.gallery')
    <hr>
    @include('home-sections.posts')
    <hr>
    @include('home-sections.contact-us')
@endsection
