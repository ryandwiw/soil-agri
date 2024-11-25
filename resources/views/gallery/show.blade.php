<!-- resources/views/gallery/show.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <p class="">
            <a href="{{ route('dashboard') }}" class="text-decoration-none" onclick="pindahHalaman()">Dashboard</a> /
            <a href="{{ route('gallery.index') }}" class="text-decoration-none"  onclick="pindahHalaman()">Galeri</a> /
            <a class="text-decoration-none fw-bold" style="cursor: text;">Show</a> 
        </p>
        <h3 class="text-center">Admin Soilferti</h3>
    </div>

    <h3>Detail Gambar</h3>

    <div>
        <!-- Display image details -->
        <img src="{{ asset($gallery->image_path) }}" alt="Image" style="max-width: 300px;">
        <p>Created At: {{ $gallery->created_at }}</p>
        <!-- Add more details if needed -->
    </div>

    @include('components.alert')
@endsection
