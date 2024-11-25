<!-- resources/views/artikel/create.blade.php -->

@extends('layouts.admin')

@section('content')

<style>
    .ql-toolbar.ql-snow{
        background: #fdfd5f;
    }
</style>
    <div class="mb-4">
        <p class="">
            <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit; " onclick="pindahHalaman()">Dashboard</a> /
            <a href="{{ route('articles.index') }}" style="text-decoration: none; color: inherit; " onclick="pindahHalaman()">Artikel</a> /
            <a class="fw-bold" style="text-decoration: none; color: inherit; cursor:text; ">Create</a>
        </p>
        <h3 class="text-center">Admin Soilferti</h3>
    </div>


    <div class="container mt-5">
        <h3>Tambah Artikel Baru</h3>

        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data" id="inputForm">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>         
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Utama:</label>
                <input type="file" name="gambar_1" id="gambar_1" class="form-control">
            </div>
            <div id="gambar-inputs-container">
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" name="penulis" id="penulis" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <input type="text" name="kategori" id="kategori" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Artikel:</label>
                <div id="editor" style="height: 600px;" class="form-control"></div>
                
                <input type="hidden" name="isi" id="hidden-editor-input" required>
            </div>

                <!-- Container untuk menampung input gambar -->
            </div>
            <button type="button" class="btn btn-primary" onclick="confirmInput()">Simpan Artikel</button>
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

    @include('components.alert')
@endsection
