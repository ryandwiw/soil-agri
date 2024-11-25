<!-- resources/views/comments/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <p class="">
            <a href="{{ route('dashboard') }}" class="text-decoration-none" style="color:inherit;"
                onclick="pindahHalaman()">Dashboard</a> /
            <a class="text-decoration-none" style="cursor: text; color:inherit;">Komentar</a>
        </p>
        <h3 class="text-center">Admin Soilferti</h3>
    </div>
    <h2>Daftar Komentar</h2>
    @include('components.alert')

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Isi Komentar</th>
                    <th>Artikel</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($comments as $comment)
                    <tr>
                        <td>{{ $comment->nama }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->isi_komentar }}</td>
                        <td>
                            <a href="{{ route('articles.show', $comment->article_id) }}">
                                {{ $comment->article->judul }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post" class="d-inline"
                                id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="deleteContent()">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada komentar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
