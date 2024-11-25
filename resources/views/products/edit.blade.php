<!-- resources/views/products/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <p class="">
            <a href="{{ route('dashboard') }}" class="text-decoration-none"  style="color:inherit;" onclick="pindahHalaman()">Dashboard</a> /
            <a href="{{ route('products.index') }}" class="text-decoration-none" style="color:inherit;" onclick="pindahHalaman()">Produk</a>
            /
            <a class="text-decoration-none fw-bold" style="cursor: text; color:inherit;">Edit</a>
        </p>
        <h3 class="text-center">Admin Soilferti</h3>
    </div>
    <div class="container mt-4">
        <h2 class="mb-3">Edit Produk</h2>



        <form action="{{ route('products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- General Product Information -->
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    value="{{ $product->nama_produk }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori_produk" class="form-label">Kategori Produk</label>
                <input type="text" class="form-control" id="kategori_produk" name="kategori_produk"
                    value="{{ $product->kategori_produk }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tersedia_dalam_kemasan" class="form-label">Tersedia dalam Kemasan</label>
                <input type="text" class="form-control" id="tersedia_dalam_kemasan" name="tersedia_dalam_kemasan"
                    value="{{ $product->tersedia_dalam_kemasan }}" required>
            </div>

            <div class="mb-3">
                <label for="keunggulan" class="form-label">Keunggulan</label>
                <textarea class="form-control" id="keunggulan" name="keunggulan" rows="3" required>{{ $product->keunggulan }}</textarea>
            </div>

            <!-- Specification Information -->
            <h3>Spesifikasi</h3>
            <div class="mb-3">
                <label for="formulasi" class="form-label">Formulasi</label>
               
                <input type="text" class="form-control" id="formulasi" name="formulasi"
                    value="{{ $product->specifications->formulasi }}" required>
            </div>

            <div class="mb-3">
                <label for="bahan_aktif" class="form-label">Bahan Aktif</label>
              
                <input type="text" class="form-control" id="bahan_aktif" name="bahan_aktif"
                    value="{{ $product->specifications->bahan_aktif }}" required>
            </div>

          
            <!-- Instruction Information -->
            <h3>Petunjuk Penggunaan</h3>
            <div class="mb-3">
                <label for="tanaman" class="form-label">Tanaman</label>
                {{-- <div id="editor-tanaman" style="height: 600px;" class="form-control">{!!$product->usage->tanaman!!}</div>
                <input type="hidden" name="tanaman" id="hidden-editor-input-tanaman" value="{{$product->usage->tanaman}}" required> --}}
                <input type="text" class="form-control" id="tanaman" name="tanaman"
                    value="{{ $product->usage->tanaman }}" required>
            </div>

            <div class="mb-3">
                <label for="hama_sasaran" class="form-label">Hama Sasaran</label>
                {{-- <div id="editor-hama_sasaran" style="height: 600px;" class="form-control">{!!$product->usage->hama_sasaran!!}</div>
                <input type="hidden" name="hama_sasaran" id="hidden-editor-input-hama_sasaran" value="{{$product->usage->hama_sasaran}}" required> --}}
                <input type="text" class="form-control" id="hama_sasaran" name="hama_sasaran"
                    value="{{ $product->usage->hama_sasaran }}" required>
            </div>

            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                {{-- <div id="editor-dosis" style="height: 600px;" class="form-control">{!!$product->usage->dosis!!}</div>
                <input type="hidden" name="dosis" id="hidden-editor-input-dosis" required value="{{$product->usage->dosis}}"> --}}
                <input type="text" class="form-control" id="dosis" name="dosis"
                    value="{{ $product->usage->dosis }}" required>
            </div>

            <div class="mb-3">
                <label for="cara_dan_waktu_aplikasi" class="form-label">Cara dan Waktu Aplikasi</label>
               
                <textarea class="form-control" id="cara_dan_waktu_aplikasi" name="cara_dan_waktu_aplikasi" rows="3" required>{{ $product->usage->cara_dan_waktu_aplikasi }}</textarea>
            </div>

            <!-- Other General Information -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>

                @if ($product->gambar)
                    <img src="{{ asset('main/gambar_produk/' . $product->gambar) }}" alt="Product Image" class="mb-2"
                        style="max-width: 200px;">
                @endif

                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>

            <div class="mb-3">
                <label for="berkas" class="form-label">Berkas</label>
            
                @if ($product->berkas)
                    <p style="font-size:15px;">Berkas saat ini: <a href="{{ asset('main/berkas/' . $product->berkas) }}" target="_blank">{{ $product->berkas }}</a></p>
                @endif
            
                <input type="file" class="form-control" id="berkas" name="berkas">
            </div>
            


            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    @include('components.alert')

   
@endsection
