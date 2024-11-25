<!-- resources/views/products/show.blade.php -->
@extends('layouts.main')

@section('content')
    <section class="mt-3">
        <div class="container" >
            <hr>
            <p class="mb-5 mt-3"><a href="{{ route('landing') }}"
                    style="text-decoration: none; color: inherit;">Beranda</a> / <a href="{{route('products.index')}}"
                    style="text-decoration: none; color: inherit; font-weight:bold;">Produk</a> </p>
            <div class="row">

                <!-- Kolom Pertama -->
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <ul class="mobile-padding-products" style="border: none; ">
                                <div class="d-md-none d-lg-none">
                                    <div class="text-center">
                                        <img src="{{ asset('main/gambar_produk/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" style="width: 100%; height: 300px; ">
                                    </div>                                    
                                </div>
                                <li class="list-group-item center-mobile">
                                    <h3>{{ $product->nama_produk }}</h3>
                                </li>
                                <li class="list-group-item d-md-none d-lg-none jarak-mobile"><h3>
                                    {{ $product->tersedia_dalam_kemasan }}</h3></li>
                                <li class="list-group-item mt-3 mb-3">
                                    <div class="custom-box-style text-tebal">{{ $product->kategori_produk }}</div>
                                </li>

                                <li class="list-group-item mb-3 mt-4 d-none d-md-block d-lg-block "><strong>Deskripsi</strong> </li>
                                <li class="list-group-item mb-4 font-size-description justify-text">{!! ($product->deskripsi) !!}</li>

                                <li class="list-group-item mt-3 mb-1 d-none d-md-block d-lg-block">Tersedia dalam Kemasan :</li>
                                <li class="list-group-item mb-5 d-none d-md-block d-lg-block"><strong>{{ $product->tersedia_dalam_kemasan }} </strong>
                                </li>
                                <li class="list-group-item mt-4 d-none d-md-block d-lg-block">
                                    <div class="share-icons ">
                                        <span class="share-text">Bagikan</span>
                                        <!-- Facebook Share -->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                            target="_blank" class="share-icon"><i class="fab fa-facebook"></i></a>

                                        <!-- Twitter Share -->
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($product->nama_produk) }}"
                                            target="_blank" class="share-icon"><i class="fab fa-twitter"></i></a>

                                        <!-- WhatsApp Share -->
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($product->nama_produk . ' ' . url()->current()) }}"
                                            target="_blank" class="share-icon"><i class="fab fa-whatsapp"></i></a>

                                        <!-- Email Share -->
                                        <a href="mailto:?subject=Check%20out%20this%20product&amp;body=I%20thought%20you%20might%20be%20interested%20in%20this%20product:%20{{ $product->nama_produk }}%0D%0A{{ url()->current() }}"
                                            class="share-icon"><i class="far fa-envelope"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 d-none d-md-block d-lg-block">
                            <div class="text-center">
                                <img src="{{ asset('main/gambar_produk/' . $product->gambar) }}"
                                    alt="{{ $product->nama_produk }}" class="ipad-products" style="width: 100%; height: 400px; object-fit:contain; ">
                                    <div class="mb-3">
                                    
                                       

                                       
                                        
                                    </div>
                                    
                                </div>
                        </div>
                    </div>

                </div>

                <!-- Kolom Ketiga -->
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <ul class="list-group">
                        <li class="list-group-item transparent-column">
                            <strong><span class="toggle-link" data-content="keunggulan-content" data-icon="keunggulan-icon">Keunggulan<i id="keunggulan-icon" class="fa fa-angle-down " ></i></span> </strong>
                            <hr>

                            <div id="keunggulan-content" class="toggle-content" style="font-size: 13.5px;">
                                <ul class="bold-bullet">
                                    @foreach(explode("\n", $product->keunggulan) as $point)
                                        <li>{{ $point }}</li>
                                    @endforeach
                                </ul>

                                {{-- {!! $product->keunggulan !!} --}}
                            </div>
                            
                        </li>
                        <li class="list-group-item transparent-column">
                            <strong><span class="toggle-link" data-content="spesifikasi-content" data-icon="spesifikasi-icon">Spesifikasi <i  id="spesifikasi-icon" class="fa fa-angle-down " ></i></span> </strong>
                            <hr>
                            <div id="spesifikasi-content" class="toggle-content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><strong>Bahan Aktif :</strong></td> 
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-justify">{!! optional($product->specifications)->bahan_aktif !!}</td>

                                        </tr>
                                       
                                        <tr>
                                            <td><strong>Formulasi :</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-justify">{!! optional($product->specifications)->formulasi !!}</td>

                                        </tr>
                                    </tbody>
                                </table>


{{-- 
                                <div class="row font-size-isi">
                                    <div class="col-4 col-md-3"><strong>Bahan Aktif </strong></div>
                                    <div class="col-8 col-md-9 text-start">: {!! optional($product->specifications)->bahan_aktif !!}</div>
                                </div>
                                <div class="row font-size-isi">
                                    <div class="col-4 col-md-3"><strong>Formulasi </strong></div>
                                    <div class="col-8 col-md-9 text-start">: {!! optional($product->specifications)->formulasi !!}</div>
                                </div> --}}
                            </div>

                        </li>

                        <li class="list-group-item transparent-column">
                            <strong>
                                <span class="toggle-link" data-content="petunjuk-content" data-icon="petunjuk-icon">Petunjuk Penggunaan <i id="petunjuk-icon" class="fa fa-angle-down" ></i></span>
                            </strong>
                            <hr>
                            <div id="petunjuk-content" class="toggle-content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><strong>Tanaman :</strong></td> 
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-justify">{!! optional($product->usage)->tanaman !!}</td>

                                        </tr>
                                        <tr>
                                            <td><strong>Hama Sasaran :</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-justify">{!! optional($product->usage)->hama_sasaran !!}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Dosis :</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">{!! optional($product->usage)->dosis !!}</td>

                                        </tr>
                                        <tr>
                                            <td><strong>Cara dan Waktu Aplikasi :</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-justify">{!! optional($product->usage)->cara_dan_waktu_aplikasi !!}</td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </li>
                        <div class="khususDesktopProduct KhususMobileProductBrosur">
                            @if ($product->berkas)
                                    <p><a href="#" class="btn btn-danger " onclick="openDownload('{{ route('products.download', $product->slug) }}')">Lihat Brosur</a></p>
                                @else
                                    <p>Tidak ada berkas terkait dengan produk ini.</p>
                                @endif
                        </div>
                        
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <script>
        function openDownload(url) {
            var newWindow = window.open(url, '_blank');

            alert("File akan segera diunduh.");
            // Membuat request unduhan otomatis
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.responseType = 'blob';
            xhr.onload = function () {
                var urlCreator = window.URL || window.webkitURL;
                var imageUrl = urlCreator.createObjectURL(this.response);
                var tag = document.createElement('a');
                tag.href = imageUrl;
                tag.download = "{{ $product->berkas }}"; // Nama file yang diunduh
                document.body.appendChild(tag);
                tag.click();
                document.body.removeChild(tag);
            };
            xhr.send();
        }
    </script>
@endsection
