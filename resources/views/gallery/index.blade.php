@extends(auth()->check() ? 'layouts.admin' : 'layouts.main')

@section('content')

@auth
<div class="mb-4">
    <p class="">
        <a href="{{ route('dashboard') }}" class="text-decoration-none" style="color:inherit;" onclick="pindahHalaman()">Dashboard</a> /
        <a class="text-decoration-none fw-bold" style="cursor: text; color:inherit;">Galeri</a> 
    </p>
    <h3 class="text-center">Admin Soilferti</h3>
</div>

<div class="container mt-3">
    <h3>Galleri Foto </h3>

    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#gambarModal">
        Upload Gambar
      </button>

      @include('gallery.create')
    {{-- <a href="{{ route('gallery.create') }}" class="btn btn-success mb-3 mt-3" onclick="pindahHalaman()">Upload Foto Baru</a> --}}
      
    <div class="row " style="background-color: #c9c9c9; border-radius:15px;">
        @foreach ($gallerys as $gallery)
            <div class="col-md-3 mb-3 mt-3">
                <div class="card">
                    <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->image_path }}" class="card-img-top" style="max-width: 100%; max-height:300px; height:200px;">
                    <div class="card-body text-center">
                        <a href="{{ route('gallery.show', $gallery->id) }}" class="btn btn-info btn-sm" onclick="pindahHalaman()">Detail</a>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$gallery->id}}">
                            Edit
                          </button>
                          @include('gallery.edit')
                        {{-- <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline" id="deleteGambar">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteGallery()">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($gallerys->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $gallerys->previousPageUrl() }}">Previous</a>
                    </li>
                @endif

                @for ($i = 1; $i <= $gallerys->lastPage(); $i++)
                    <li class="page-item {{ $i == $gallerys->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $gallerys->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($gallerys->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $gallerys->nextPageUrl() }}">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>

@include('components.alert')

    
@else
<div class="container mt-5 mb-5 custom-container">
    <h2 class="text-center mb-4">Galeri Pertanian</h2>

    <div class="row gallery mx-auto ">
        <!-- Gambar-gambar pertanian -->
        @foreach($gallerys as $gallery)
                <div class="col-md-4 mb-4" style="height: 300px;"> 
                    <a href="{{ asset($gallery->image_path) }}" data-lightbox="gallery">
                        <img src="{{ asset($gallery->image_path) }}" alt="Gambar {{ $loop->iteration }}" class="img-fluid" style="height: 100%;">
                    </a>
                </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">

        <nav aria-label="Page navigation example mt-5">
            <ul class="pagination">
                @if ($gallerys->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $gallerys->previousPageUrl() }}">Previous</a>
                    </li>
                @endif

                @for ($i = 1; $i <= $gallerys->lastPage(); $i++)
                    <li class="page-item {{ $i == $gallerys->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $gallerys->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($gallerys->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $gallerys->nextPageUrl() }}">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>


</div>

<script>
    lightbox.option({
      'resizeDuration': 100,
      'imageFadeDuration' : 100,
      'wrapAround': false,
    })
</script>
@endauth

@endsection
