<nav class="navbar bg-light fixed-top transparent-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a class="navbar-brand text-white" href="#">Soil Ferti</a>
            <div class="navbar-logo">
                <!-- Add your logo image here -->
                <img src="your-logo-path.png" alt="Logo" height="30">
            </div>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" style="width: 80%;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SoilFerti</h5>
                <div class="d-flex justify-content-end align-items-center">
                    <form class="d-flex ms-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="p-2 mr-3">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                </div>
            </div>

            <div class="offcanvas-body d-flex align-items-center justify-content-between flex-grow-1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>

                <div class="text-center">
                    <!-- Add your rectangular image here -->
                    <img src="{{asset('main/artikel/ce.jpg')}}" alt="Rectangular Image" height="100">
                </div>

                <div class="ms-3">
                    <!-- Add your office address, customer service, WhatsApp, and Instagram links here -->
                    <div class="office-info">
                        <p class="mb-0">Alamat Kantor: Jl. Contoh No. 123, Kota Contoh</p>
                        <p class="mb-0">Layanan Pelanggan: 123-456-789</p>
                        <p class="mb-0">WhatsApp: <a href="https://wa.me/123456789">123-456-789</a></p>
                        <p class="mb-0">Instagram: <a href="https://www.instagram.com/yourinstagram/">@yourinstagram</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
