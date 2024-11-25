<!-- resources/views/products/create.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="mb-4">
        <p class="">
            <a href="{{ route('dashboard') }}" class="text-decoration-none"  style="color:inherit;" onclick="pindahHalaman()">Dashboard</a> /
            <a href="{{ route('products.index') }}" class="text-decoration-none" style="color:inherit;" onclick="pindahHalaman()">Produk</a> /
            <a class="text-decoration-none fw-bold" style="cursor: text; color:inherit;" >Create</a> 
        </p>
        <h3 class="text-center">Admin Soilferti</h3>
    </div>

    <div class="container mt-3">

        <h3 class="mb-3">Tambah Produk</h3>
    
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <!-- General Product Information -->
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
            </div>
    
            <div class="mb-3">
                <label for="kategori_produk" class="form-label">Kategori Produk</label>
                <select class="form-control" id="kategori_produk" name="kategori_produk" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Pengatur Tumbuh Tanaman">Zat Pengatur Tumbuh Tanaman</option>
                    <option value="Produk Organik">Produk Organik</option>
                    <option value="Pupuk Kimia Cair">Pupuk Kimia Cair</option>
                    <option value="Pupuk Kimia Padat">Pupuk Kimia Padat</option>
                    <option value="Fungisida">Fungisida</option>
                    <option value="Insektisida">Insektisida</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
    
            <div class="mb-3">
                <label for="tersedia_dalam_kemasan" class="form-label">Tersedia dalam Kemasan</label>
                <input type="text" class="form-control" id="tersedia_dalam_kemasan" name="tersedia_dalam_kemasan" required>
            </div>
    
            <div class="mb-3">
                <label for="keunggulan" class="form-label">Keunggulan</label>
                <textarea class="form-control" id="keunggulan" name="keunggulan" rows="3" required></textarea>
            </div>
    
            <!-- Specification Information -->
            <h3>Spesifikasi</h3>
            <div class="mb-3">
                <label for="formulasi" class="form-label">Formulasi</label>
                <input type="text" class="form-control" id="formulasi" name="formulasi" required>
            </div>
    
            <div class="mb-3">
                <label for="bahan_aktif" class="form-label">Bahan Aktif</label>
                <input type="text" class="form-control" id="bahan_aktif" name="bahan_aktif" required>
            </div>
    
            <!-- Product Usage Information -->
            <h3>Petunjuk Penggunaan</h3>
            <div class="mb-3">
                <label for="tanaman" class="form-label">Tanaman</label>
                <input type="text" class="form-control" id="tanaman" name="tanaman" required>
            </div>
    
            <div class="mb-3">
                <label for="hama_sasaran" class="form-label">Hama Sasaran</label>
                <input type="text" class="form-control" id="hama_sasaran" name="hama_sasaran" required>
            </div>
    
            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" class="form-control" id="dosis" name="dosis" required>
            </div>
    
            <div class="mb-3">
                <label for="cara_dan_waktu_aplikasi" class="form-label">Cara dan Waktu Aplikasi</label>
                <textarea class="form-control" id="cara_dan_waktu_aplikasi" name="cara_dan_waktu_aplikasi" rows="3" required></textarea>
            </div>
    
            <!-- Image Upload -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>

            <div class="mb-3">
                <label for="berkas" class="form-label">File</label>
                <input type="file" class="form-control" id="berkas" name="berkas">
            </div>
    
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
</div>

@include('components.alert')

@endsection
