<!-- resources/views/gallery/create.blade.php -->

{{-- @extends('layouts.admin')

@section('content')
<div class="mb-4">
    <p class="">
        <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark" onclick="pindahHalaman()">Dashboard</a> /
        <a href="{{ route('gallery.index') }}" class="text-decoration-none text-dark"  onclick="pindahHalaman()">Galeri</a> /
        <a class="text-decoration-none text-dark fw-bold" style="cursor: text;">Create</a> 
    </p>

    <h3 class="text-center">Admin Soilferti</h3>
</div>

<div class="container mt-3">
    <h3>Unggah Gambar</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Pilih Gambar:</label>
            <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Unggah</button>
    </form>
</div>

@include('components.alert')
@endsection --}}

<div class="modal fade" id="gambarModal" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="gambarModalLabel">Unggah Gambar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="image">Pilih Gambar:</label>
                    <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </div>