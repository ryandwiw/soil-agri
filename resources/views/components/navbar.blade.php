
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-light" > 
      <div class="modal-header bg-danger"> 
        <h1 class="modal-title text-light fs-5" id="searchModalLabel">Cari </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
      </div> 
      <div class="modal-body">
        <form action="{{ url('/pencarian') }}" method="GET">
          <div class="mb-3">
            <label for="searchInput" class="form-label">Kata Kunci :</label>
            <input type="text" class="form-control" id="searchInput" name="query" placeholder="Masukkan kata kunci">
          </div>
          <div class="modal-footer" >
            <button type="button" class="btn btn-info text-light" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn text-light bg-danger">Cari</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>


{{-- <nav class="navbar navbar-expand-lg d-sm-block d-lg-none" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('landing')}}">Soil Ferti</a>
    
    <div class="d-flex flex-row align-items-center">
      <a class="nav-link ml-auto d-lg-none" style="margin-right: 20px;" data-bs-toggle="modal" id="searchIcon" data-bs-target="#searchModal" style="cursor: pointer;">
        <i class="fas fa-search"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('landing')}}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('produk') }}">Produk Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('artikel') }}">Artikel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('landing') }}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-none d-lg-block" data-bs-toggle="modal" id="searchIcon" data-bs-target="#searchModal" style="cursor: pointer;">
            <i class="fas fa-search"></i>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav> --}}


<nav class="navbar navbar-expand-lg" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); font-size:14px;">
  <div class="container-fluid">
    {{-- <a class="navbar-brand" href="{{ route('landing') }}">Soil Ferti</a> --}}
    <a href="{{route('landing')}}">
    <img class="navbar-brand logo-soilferti"   src="{{asset('assets/image/logo.png')}}" alt="logo"></a>
    
    <div class="d-flex flex-row align-items-center">
      <a class="nav-link ml-auto d-lg-none" style="margin-right: 20px;" data-bs-toggle="modal" id="searchIcon" data-bs-target="#searchModal" style="cursor: pointer;">
        <i class="fas fa-search"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav fw-bold">
        <li class="nav-item">
          <a class="nav-link text-danger text-uppercase nav-link{{ request()->is('/') ? '' : ' external-link' }}" aria-current="page" href="{{ request()->is('/') ? '#' : route('landing') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="text-danger text-uppercase nav-link{{ request()->is('/') ? '' : ' external-link' }}" href="{{ request()->is('/') ? '#produk-landing' : route('products.index') }}" id="produkLink">Produk Kami</a>
        </li>
        <li class="nav-item">
          <a class="text-danger text-uppercase nav-link{{ request()->is('/') ? '' : ' external-link' }}" href="{{ request()->is('/') ? '#artikel-landing' : route('articles.index') }}" id="artikelLink">Artikel</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link{{ request()->is('/') ? '' : ' external-link' }}" href="{{ request()->is('/') ? '#galeri-landing' : route('galeri') }}" id="galeriLink">Galeri</a>
        </li> --}}
        <li class="nav-item">
          <a class="text-danger text-uppercase nav-link{{ request()->is('/') ? '' : ' external-link' }}" href="{{ request()->is('/') ? '#kontak-landing' : route('about') }}" id="aboutLink">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="text-danger text-uppercase nav-link d-none d-lg-block" data-bs-toggle="modal" id="searchIcon" data-bs-target="#searchModal" style="cursor: pointer;">
            <i class="fas fa-search"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div id="scrollTopBtn" class="btn btn-outline-secondary" onclick="scrollToTop()">
  <i class="fas fa-arrow-up"></i>
</div>

<script>
  // Add this script to redirect to specific routes on mobile
  document.addEventListener("DOMContentLoaded", function() {
    // Check if it's a mobile device
    const isMobile = window.innerWidth <= 768;
  
    // Redirect to specific routes on mobile
    if (isMobile) {
      document.getElementById("produkLink").href = "{{ route('products.index') }}";
      document.getElementById("artikelLink").href = "{{ route('articles.index') }}";
      document.getElementById("aboutLink").href = "{{ route('about') }}";
    }
  });
  </script>

