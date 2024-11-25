<!-- resources/views/article/edit.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <p class="">
            <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit; " onclick="pindahHalaman()">Dashboard</a> /
            <a href="{{ route('articles.index') }}" style="text-decoration: none; color: inherit; ">Artikel</a> /
            <a style="text-decoration: none; color: inherit; font-weight:bold;">Edit</a>
        </p>
        <h3 class="text-center">Admin Soilferti</h3>
    </div>

    <div class="container">
        <hr style="color:white;">
        <h1>Edit Artikel</h1>

        <form action="{{ route('articles.update', $article->slug) }}" method="post" enctype="multipart/form-data"
            id="editForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ $article->judul }}"
                    required>
            </div>
            <div class="mb-3">

                @if ($article->gambar_1)
                    <img src="{{ asset($article->gambar_1) }}" alt="{{ $article->gambar_1 }}" class="img-fluid mb-3 mt-3"
                        style="max-width: 300px; max-height:300px;">
                @endif

                <label for="gambar_1" class="form-label">Gambar Utama :</label>
                <input type="file" class="form-control-file @error('gambar_1') is-invalid @enderror" id="gambar_1"
                    name="gambar_1">
                @error('gambar_1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror


            </div>

            <div id="gambar-inputs-container">
                <!-- Container untuk menampung input gambar -->
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" name="penulis" id="penulis" class="form-control" value="{{ $article->penulis }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $article->kategori }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Artikel:</label>
                <div id="editor" style="height: 600px;" class="form-control">{!! $article->isi !!}</div>
                <input type="hidden" name="isi" id="hidden-editor-input" value="{{ $article->isi }}" required>
            </div>
           

            <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Simpan Perubahan</button>
        </form>
    </div>




    <script>
        function confirmUpdate() {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Hal Ini Akan Mengubah Datanya",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Update '
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan "Yes", submit form
                    document.getElementById('editForm').submit();
                } 
            });
        }

  
    // Initialize Quill.js on the element with ID 'editor'
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            imageResize: {
                displaySize: true
            },
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['link', 'image', 'video'],
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'indent': '-1' }, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'font': ['serif', 'monospace'] }],
                ['clean'],
                [{ 'align': ['left', 'center', 'right', 'justify'] }],
            ],
        }
    });

    // Handle changes in Quill.js and save its content in the hidden input
    quill.on('text-change', function() {
        var hiddenInput = document.getElementById('hidden-editor-input');
        hiddenInput.value = quill.root.innerHTML;
    });
    </script>
@endsection
