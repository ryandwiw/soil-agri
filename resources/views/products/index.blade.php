<!-- resources/views/products/index.blade.php -->
@extends(auth()->check() ? 'layouts.admin' : 'layouts.main')

@section('content')
@auth
<div class="mb-4">
    <p class="">
        <a href="{{ route('dashboard') }}" class="text-decoration-none" style="color:inherit;" onclick="pindahHalaman()">Dashboard</a> /
        <a class="text-decoration-none" style="cursor: text; color:inherit;" >Produk</a>
    </p>
    <h3 class="text-center">Admin Soilferti</h3>
</div>

    <div class="row">
        <div class="col-12">
        <h2>Daftar Produk</h2>
        </div>
        <div class="col-6 text-end">
  <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Tambah Produk</a>
            </div>
            <div class="col-6">
                @php
                $currentUrl = request()->url();
            @endphp
            
            @if(request()->is('product*'))
            
                                <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Lihat Lainnya
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-danger" href="{{route('products.index')}}">Semuanya</a></li>
                                        <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Padat']) }}">Pupuk Kimia Padat</a></li>
                                        <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Cair']) }}">Pupuk Kimia Cair</a></li>
                                        <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Fungisida']) }}">Fungisida</a></li>
                                        <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Insektisida']) }}">Insektisida</a></li>
                                        <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Pengatur Tumbuh Tanaman']) }}">Zat Pengatur Tumbuh Tanaman</a></li>
                                        <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Produk Organik']) }}">Produk Organik</a></li>
                                    </ul>
                                </div>
                                
                                  
                            
                    @else
                    None
            
            @endif
                </div>
    </div>

    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori Produk</th>
                    <th>Deskripsi</th>
                    <th>Tersedia dalam Kemasan</th>
                    <th>Keunggulan</th>
                    <th>Spesifikasi</th>
                    <th>Petunjuk Penggunaan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->kategori_produk }}</td>
                        <td>{!! $product->deskripsi !!}</td>
                        <td>{{ $product->tersedia_dalam_kemasan }}</td>
                        <td>{!! $product->keunggulan !!}</td>
                        <td><a href="{{route('products.edit',$product->slug)}}" onclick="pindahHalaman()" style="color: inherit; font-size:12px;" >Lihat Lebih Rinci .</a></td>
                        <td><a href="{{route('products.edit',$product->slug)}}" onclick="pindahHalaman()" style="color: inherit; font-size:12px;" >Lihat Lebih Rinci .</a></td>
                        <td>
                            @if ($product->gambar)
                                <img src="{{ asset('main/gambar_produk/' . $product->gambar) }}"
                                    alt="{{ $product->nama_produk }}" style="max-width: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                           
                            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-info btn-sm" onclick="pindahHalaman()"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('products.edit', $product->slug) }}" onclick="pindahHalaman()"
                                class="btn btn-warning btn-sm "><i class="fas fa-edit"></i></a>
                                <form action="{{ route('products.destroy', $product->slug) }}" method="POST" 
                                    class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@include('components.alert')

@else

<style>
    .card-body {
        height: 250px; /* Set a fixed height for the card body */
        overflow: hidden; /* Hide content that exceeds the fixed height */
    }

    .card-body p {
        overflow: hidden;
        text-overflow: ellipsis; /* Display ellipsis (...) for truncated text */
    }

    .card-footer {
        background-color:transparent !important; border:none; margin-top:-15px;
    }

    @media(max-width:767px){
        .mobile__card__footer__product{
        text-align: center !important;}
    }

</style>
    <div class="container mt-3 mb-3">
        <p class=" mt-3">
            <a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;">Beranda</a> /
            <a href="{{ route('products.index') }}" style="text-decoration: none; color: inherit; font-weight:bold;">Produk</a>
        </p>
        <hr class="mb-5">
        <div class="row">
            <h3 class="text-center mb-3">Produk Kami</h3>
            <!-- Filter Form -->
            @php
    $currentUrl = request()->url();
@endphp

@if(request()->is('product*') && !str_contains($currentUrl, '/products/'))
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3 mt-2">
                <label for="categoryDropdown" class="form-label">Filter berdasarkan :</label>
            </div>
            <div class="col-md-5 mb-2">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Categories
                    </button>
                    <div class="dropdown-menu" aria-labelledby="categoryDropdownButton">
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input category-checkbox" type="checkbox" value="{{ $category }}">
                                <label class="form-check-label" for="categoryCheckbox_{{ $category }}">
                                    {{ $category }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    @if(request()->is('product*') && str_contains($currentUrl, '/products/'))
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lihat Lainnya
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-danger" href="{{route('products.index')}}">Semuanya</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Padat']) }}">Pupuk Kimia Padat</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Cair']) }}">Pupuk Kimia Cair</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Fungisida']) }}">Fungisida</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Insektisida']) }}">Insektisida</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Pengatur Tumbuh Tanaman']) }}"> Zat Pengatur Tumbuh Tanaman</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ route('produk.category', ['kategori_produk' => 'Produk Organik']) }}">Produk Organik</a></li>
                        </ul>
                    </div>
                    
                      
                </div>
                
                <div class="col-md-9 mb-2">
                </div>
            </div>
        </div>
    @endif
@endif

            </div>

            <hr class="mb-5">

            
            <!-- Display Products -->
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-6 col-sm-12 mb-4 product-item padding-desktop" data-categories="{{ $product->kategori_produk }}">
                            <div class="card">
                                <div class="row g-0 product-mobile">
                                    <div class="col-md-5 ">
                                        <img src="{{ asset('main/gambar_produk/' . $product->gambar) }}"
                                            class=" product-mobile-image" alt="{{ $product->nama_produk }}" style="width: 100%; height:100%; object-fit:contain">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <a href="{{ route('products.show', $product->slug) }}" style="text-decoration: none; color:inherit;">
                                                <h5 class="card-title fw-bold center-mid left-mobile" >{{ $product->nama_produk }}</h5>
                                                <p class="text-start">{{ $product->kategori_produk }}</p>
                                                <p class="card-text center-mid left-mobile fw-bold mt-3">Bahan Aktif :</p>
                                                <p class="card-text center-mid left-mobile text-justify">{!! Str::limit($product->specifications->bahan_aktif ?? 'N/A', 100) !!}
                                                </p>
                                            </a>
                                        </div>
                                        <div class="card-footer mobile__card__footer__product" >
                                            <a href="{{ route('products.show', $product->slug) }}" style="text-decoration: none; color:inherit;">
                                           <button class="btn btn-sm btn-danger d-none d-md-block d-lg-block">Lihat Selengkapnya</button>
                                           <button class="btn btn-md btn-danger d-md-none d-lg-none">Lihat Selengkapnya</button>
                                            </a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


       
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
            const productItems = document.querySelectorAll('.product-item');
    
            function updateProductDisplay() {
                const selectedCategories = Array.from(categoryCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
    
                // Mengambil parameter URL untuk kategori
                const urlParams = new URLSearchParams(window.location.search);
                const urlCategories = urlParams.getAll('categories[]');
    
                productItems.forEach(function (item) {
                    const itemCategories = item.dataset.categories.split(',');
    
                    // Memeriksa apakah kategori terpilih dari URL ada dalam kategori produk
                    if (urlCategories.length > 0 && !urlCategories.some(category => itemCategories.includes(category))) {
                        item.style.display = 'none';
                    } else if (selectedCategories.length === 0 || selectedCategories.some(category => itemCategories.includes(category))) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
    
            categoryCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', updateProductDisplay);
            });
    
            // Panggil fungsi updateProductDisplay pada awalnya
            updateProductDisplay();
        });
    </script>







@endauth
    
@endsection
