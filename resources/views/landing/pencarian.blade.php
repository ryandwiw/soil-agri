@extends('layouts.main')

@section('content')
<style>
    .product-description {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
    <div class="container mt-3 mb-3">
        <h3 class="text-center">Pencarian</h3>
        <div class="mb-3 mt-3">
            @if (request()->has('query'))
                <h5 class="text-center">Hasil pencarian untuk kata kunci: <strong>{{ request('query') }}</strong></h5>
            @endif
        </div>

                <hr>
                <h3 class="mb-3 mt-3">Produk</h3>
                @forelse($products as $product)
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <img src="{{ asset('main/gambar_produk/' . $product->gambar) }}" alt="{{ $product->nama_produk }}"
                                class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h5>{{ $product->nama_produk }}</h5>
                            <p class="product-description">{!! Str::limit($product->deskripsi, 400) !!}</p>


                            <a href="{{ route('products.show', $product->slug) }}" class="fw-bold"
                                style=" font-size:15px ; text-decoration: none; color:inherit;">Baca selengkapnya ></a>
                        </div>
                    </div>
                    <hr>
                @empty
                    <p>Tidak ada hasil pencarian yang sesuai untuk Produk.</p>
                @endforelse


                <hr>
                <h3 class="mb-3 mt-3">Artikel</h3>
                @forelse ($articles as $article)
                <div class="row mb-3">
                    <div class="col-md-4">
                        <img src="{{ asset($article->gambar_1) }}" class="card-img" alt="{{ $article->judul }}">
                    </div>
                    <div class="col-md-8">
                        <h5>{{$article->judul}}</h5>
                        <p class="product-description">{!! Str::limit($article->isi, 400) !!}</p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="fw-bold"
                            style=" font-size:15px ; text-decoration: none; color:inherit;">Baca selengkapnya ></a>
                    </div>
                </div>
                <hr>
                @empty
                    <p>Tidak ada hasil pencarian yang sesuai untuk Artikel.</p>
                @endforelse

            </div>







@endsection
