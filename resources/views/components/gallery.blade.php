<section id="galeri-landing" class=" bg-warning">
    <div class="container mt-5 mb-5 p-5">
        <h2 class="text-center mb-4">Galeri Pertanian</h2>
    
        <div class="row gallery">
            <!-- Gambar-gambar pertanian -->
            @foreach($gallerys as $gallery)
                @if($loop->iteration <= 6)
                    <div class="col-md-4 mb-4" style="height: 300px;"> 
                        <a href="{{ asset($gallery->image_path) }}" data-lightbox="gallery">
                            <img src="{{ asset($gallery->image_path) }}" alt="Gambar {{ $loop->iteration }}" class="img-fluid bordered-image" style="height: 100%;">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    
        <div class="text-center">
            <a href="{{route('gallery.index')}}" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
    </div>
    
    <style>
        .bordered-image {
            border: 5px solid white; /* Ubah ketebalan border sesuai kebutuhan */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Tambahkan shadow */
            transition: transform 0.3s ease-in-out; /* Efek transisi jika diinginkan */
        }

        .bordered-image:hover {
            transform: scale(1.05); /* Efek zoom ketika gambar dihover */
        }
    </style>
</section>
