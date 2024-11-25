@extends('layouts.main')

@section('content')

{{-- @include('components.bakcupa') --}}
    @include('components.carousel')

    @include('components.whychoose')

    @include('components.product')

    @include('components.ambildata')
    @include('components.gallery')
    @include('components.blog')


    @include('components.contact-us')


    @include('components.weather')

@endsection

