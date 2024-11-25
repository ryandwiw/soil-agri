@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <hr>
        <p class=" mt-3"><a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;">Beranda</a> / <a
                style="text-decoration: none; color: inherit; font-weight:bold;">Tentang Kami</a> </p>
        <hr class="mb-3">

        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('assets/image/logo2.png') }}" alt="" class="about-us-logo">
                <hr>
            </div>
            <div class="col-12 mt-3 mb-3 p-3">
                <h2 class="text-danger fw-bold text-mobile-lead mb-3">Overview</h2>
                <h5 class="text-danger fw-medium text-mobile-semilead">
                    Soil Agriculture Indonesia adalah perusahaan yang
                    bergerak di bidang pertanian. Sebagai distributor dan
                    produsen pupuk kimia maupun organik yang berdiri sejak
                    tahun 2021.
                </h5>
                <div class="text-center">
                    <img class="about-us-photo" src="{{ asset('assets/image/about.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 mt-3 p-3">
                <h2 class="text-danger fw-bold text-mobile-lead nt-3 mb-3">History</h2>
                <h5 class="text-danger fw-medium text-mobile-semilead text-justify">
                    CV Soil Agriculture didirikan sejak tahun 2021. Kami adalah produsen
                    pupuk kimia dan organik berbasis teknologi ramah lingkungan.
                    Kami sudah memiliki banyak customer, mulai dari perusahaan
                    hingga perorangan yang tersebar di seluruh Indonesia. Meskipun
                    terbilang baru dalam industri pupuk dan pertanian, kami selalu berusaha menghadirkan produk pertanian
                    yang berinovasi dan
                    mengedepankan kualitas untuk petani dan pelaku usaha dibidang
                    pertanian
                </h5>
            </div>

            <div class="col-12 mt-3 p-3">
                <h2 class="text-danger fw-bold text-mobile-lead mb-3">Vision</h2>
                <h5 class="text-danger fw-semibold text-mobile-semilead text-justify">
                    <ul>
                        <li class="mb-3">
                            Menjadi perusahaan swasta nasional terkemuka
                            dalam bidang produksi dan distribusi pupuk, berbasis
                            teknologi ramah lingkungan.
                        </li>
                        <li>
                            Tumbuh dan berkembang bersama mitra dalam mendukung industri pertanian berdaya saing tinggi.

                        </li>
                    </ul>

                </h5>
            </div>
            <div class="col-12 mt-3 p-3">
                <h2 class="text-danger fw-bold text-mobile-lead mb-3">Mission</h2>
                <h5 class="text-danger fw-semibold text-mobile-semilead text-justify">
                    <ul>
                        <li class="mb-3">
                            Membangun industri dan distribusi pupuk
                            di sentra-sentra pertanian nasional
                        </li>
                        <li class="mb-3">Membangun networking dengan petani, pelaku
                            dibidang pertanian serta masyarakat luas dalam
                            menciptakan produk tepat sasaran yang dapat
                            diterima secara luas.</li>
                        <li class="mb-3">Menyelenggarakan riset terus menerus guna
                            menghasilkan produk bermutu, sehingga mampu
                            mendukung pemupukan yang rasional, efektif, dan
                            efisien.</li>
                        <li class="mb-3">Menjadi counterpart dan konsultan bagi pelaku
                            industri pertanian, khususnya dalam rekomendasi
                            dan konsultansi formula pupuk yg efektif dan efisien.</li>
                    </ul>
                </h5>
            </div>

            <div class="col-12 mt-3 p-3">
                <h2 class="text-danger fw-bold text-mobile-lead mb-3">Our Product</h2>
                <h5 class="text-danger fw-medium text-mobile-semilead text-justify">
                    CV Soil Agriculture didirikan sejak tahun 2021 telah
                    memproduksi berbagai jenis pupuk kimia dan organik,
                    mulai dari jenis padatan hingga cairan. Produk dari kami
                    diformulasikan dengan formula terbaik dan diproduksi
                    dengan teknologi berbasis ramah lingkungan, sehingga
                    tidak memberikan dampak negatif terhadap lingkungan
                    sekitar. Selain itu produksi dilakukan sesuai dengan ISO
                    2005 dan SNI
                </h5>
                <hr>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 d-none d-md-block d-lg-block">
                    <img src="{{ asset('assets/image/about-3.png') }}" alt="">
                </div>
                <div class="col-lg-9 col-md-9">
                    <h3 class="text-danger fw-bold text-mobile-lead mb-3 text-uppercase posisi-mobile-about-text">Pupuk
                        Kimia Padat</h3>
                    <div class="d-md-none d-lg-none text-center mb-3">
                        <img src="{{ asset('assets/image/about-3.png') }}" alt="">
                    </div>
                    <h5 class="text-danger fw-medium text-mobile-semilead text-justify">
                        CV Soil Agriculture memproduksi dan mendistribusikan berbagai macam dan jenis pupuk kimia padat
                        seperti :
                    </h5>
                    <h5 class="text-danger fw-medium text-mobile-semilead text-justify mb-3">
                        Pupuk NPK, Pupuk SP36, Pupuk KNO3, Pupuk MKP, Pupuk
                        MAP, Pupuk Calcium-Boron, Pupuk Magnessium Sulfate,
                        Pupuk ZK, Pupuk KCl dsb
                    </h5>
                </div>

                <div class="col-lg-3 col-md-3 d-none d-md-block d-lg-block">
                    <img src="{{ asset('assets/image/about-2.png') }}" alt="">
                </div>
                <div class="col-lg-9 col-md-9">
                    <h3 class="text-danger fw-bold text-mobile-lead mb-3 text-uppercase posisi-mobile-about-text">Pupuk
                        Kimia Cair</h3>
                        <div class="mb-3 d-md-none d-lg-none text-center">
                            <img src="{{ asset('assets/image/about-2.png') }}" alt="">
                        </div>
                    <h5 class="text-danger fw-medium text-mobile-semilead text-justify">
                        CV Soil Agriculture memproduksi dan mendistribusikan berbagai macam dan jenis pupuk kimia cair
                        seperti :
                    </h5>
                    <h5 class="text-danger fw-medium text-mobile-semilead text-justify mb-3">
                        Kalium Phosphate, Black Urea, Green NPK, Ammo Plus,
                        Kalsil Pro, Micro Plus ++, Phosphate 90, Calcibr, Perekat,
                        Nutrisi Vegetatif dan Generatif, dsb
                    </h5>
                </div>

                <div class="col-lg-3 col-md-3 d-none d-md-block d-lg-block">
                    <img src="{{ asset('assets/image/about-1.png') }}" alt="">
                </div>
                <div class="col-lg-9 col-md-9">
                    <h3 class="text-danger fw-bold text-mobile-lead mb-3 text-uppercase posisi-mobile-about-text">Pupuk
                        Organik</h3>
                        <div class="d-md-none d-lg-none text-center mb-3">
                            <img src="{{ asset('assets/image/about-1.png') }}" alt="">
                        </div>
                    <h5 class="text-danger fw-medium text-mobile-semilead text-justify">
                        CV Soil Agriculture memproduksi dan mendistribusikan berbagai macam dan jenis pupuk organik
                        seperti :
                    </h5>
                    <h5 class="text-danger fw-medium text-mobile-semilead text-justify mb-3">
                        Dekomposer Cair, Pupuk Guano, Asam Amino, Asam
                        Humat, Mikoriza, Trichoderma, Alsikat, Azomite, Pupuk
                        Organik Cair Premium, dsb.

                    </h5>
                </div>



            </div>



            <div class="col-12 mt-3 p-3 text-center mb-3">
                <hr>
                <a href="/newkatalog.pdf" class="btn btn-danger fw-medium" style="text-decoration: none;">Download File</a>
            </div>



        </div>
    </div>
@endsection
