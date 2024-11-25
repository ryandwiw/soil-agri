@extends('layouts.main')

@section('content')
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
@endsection
