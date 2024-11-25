@extends('layouts.main')

@section('content')
    <div class="container mt-3" >
        <hr>
        <p class=" mt-3"><a href="{{ route('landing') }}"
                style="text-decoration: none; color: inherit;">Beranda</a> / <a
                style="text-decoration: none; color: inherit; font-weight:bold;">Sitemap</a> </p>
        <hr class="mb-5">
        <h1 class="mb-4">SiteMap</h1>
        <hr>

        <div>

            <ul class="list-group list-group-flush mb-5">
                <li class="list-group-item fw-bold">Pusat Soil Ferti </a></li>
                <li class="list-group-item"><a href="{{ route('landing') }}"
                        style="text-decoration: none; color: #ff1100;">Beranda</a></li>
                <li class="list-group-item"><a href="{{ route('sitemap') }}"
                        style="text-decoration: none; color: #ff1100;">Sitemap</a></li>
            </ul>
            <ul class="list-group list-group-flush mb-5">
                <li class="list-group-item fw-bold">Fitur Website SoilFerti</a></li>
                <li class="list-group-item"><a href="{{ route('galeri') }}"
                        style="text-decoration: none; color: #ff1100;">Galeri</a></li>
                <li class="list-group-item"><a href="{{ route('produk') }}"
                        style="text-decoration: none; color: #ff1100;">Produk</a></li>
                <li class="list-group-item"><a href="{{ route('artikel') }}"
                        style="text-decoration: none; color: #ff1100;">Artikel</a></li>
            </ul>

            <ul class="list-group list-group-flush mb-5">
                <li class="list-group-item fw-bold">Lainnya</a></li>
                <li class="list-group-item"><a href="{{ route('conditionsuse') }}"
                        style="text-decoration: none; color: #ff1100;">Conditions of Use</a></li>
                <li class="list-group-item"><a href="{{ route('privasi') }}"
                        style="text-decoration: none; color: #ff1100;">Pernyataan Privasi</a></li>
                <li class="list-group-item"><a href="{{ route('imprint') }}"
                        style="text-decoration: none; color: #ff1100;">Imprint</a></li>
            </ul>
        </div>
        <hr>
        <p class="text-center mb-5">Copyright © Soil Ferti
        </p>
    </div>
@endsection
