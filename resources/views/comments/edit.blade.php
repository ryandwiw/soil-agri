<!-- resources/views/comments/edit.blade.php -->

@extends('layouts.admin')

@section('content')

    <h1>Edit Komentar</h1>

    @include('components.alert')

    <form action="{{ route('comments.update', $comment->id) }}" method="post" id="editForm">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" value="{{ $comment->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" value="{{ $comment->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isi_komentar" class="form-label">Komentar:</label>
            <textarea name="isi_komentar" rows="4" class="form-control" required>{{ $comment->isi_komentar }}</textarea>
        </div>

        <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Perbarui Komentar</button>
    </form>

@endsection
