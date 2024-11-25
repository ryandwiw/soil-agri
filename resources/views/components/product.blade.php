
<section class="bg-warning p-3" id="produk-landing">

    <div class="container mt-5 mb-5">
        <div class="row ">
            <div class="col-12">
                <h3 class="text-center fw-bold text-uppercase animate-zoomIn" >Produk Unggulan Kami</h3>
            </div>
            <div class="col-12">
                <p class="text-center text-produk-subjudul animate-zoomIn">Produk unggulan ini sudah terbukti secara nyata membantu hasil
                    panen banyak petani di nusantara</p>
            </div>
        </div>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide">
                        <div class="card-product">
                            <div class="card-body-product">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Padat']) }}">
                                    <img src="{{ asset('assets/image/pupukpadat.jpg') }}">
                                    <div class="hover-overlay">
                                        <p class="lead-produk" >Pupuk Kimia Padat <i
                                                class="icon-prodc fa-solid fa-circle-right"></i></p>
                                        <p class="text-produk">Memberikan nutrisi tanaman dalam bentuk padatan untuk
                                            memenuhi kebutuhan nutrisi secara efektif.</p>
                                        <p class="text-produk2">Lihat Lainnya</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Padat']) }}">Pupuk Kimia Padat <i class="fa-solid fa-circle-right icon-prodc"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="card-product">
                            <div class="card-body-product">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Cair']) }}">
                                    <img src="{{ asset('assets/image/pupukcair.jpg') }}" >
                                    <div class="hover-overlay">
                                        <p class="lead-produk" >Pupuk Kimia Cair <i
                                                class="icon-prodc fa-solid fa-circle-right"></i></p>
                                        <p class="text-produk">memberikan nutrisi esensial dalam bentuk cairan untuk
                                            mendukung pertumbuhan dan perkembangan tanaman.</p>
                                        <p class="text-produk2">Lihat Lainnya</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pupuk Kimia Cair']) }}">Pupuk Kimia Cair <i class="fa-solid fa-circle-right icon-prodc"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="card-product">
                            <div class="card-body-product">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Fungisida']) }}">
                                    <img src="{{ asset('assets/image/fungisida.jpg') }}" style="height: auto !important;">
                                    <div class="hover-overlay">
                                        <p class="lead-produk">Fungisida <i
                                                class="icon-prodc fa-solid fa-circle-right"></i></p>
                                        <p class="text-produk">Melindungi tanaman dari serangan jamur yang dapat merusak
                                            kesehatan dan produktivitasnya.</p>
                                        <p class="text-produk2">Lihat Lainnya</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Fungisida']) }}">Fungisida <i class="fa-solid fa-circle-right icon-prodc"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="card-product">
                            <div class="card-body-product">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Insektisida']) }}">
                                    <img src="{{ asset('assets/image/insektisida.jpg') }}">
                                    <div class="hover-overlay">
                                        <p class="lead-produk">Insektisida<i
                                                class="icon-prodc fa-solid fa-circle-right"></i></p>
                                        <p class="text-produk">Membantu melawan serangga yang dapat merusak tanaman dan
                                            mengurangi hasil panen</p>
                                        <p class="text-produk2">Lihat Lainnya</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Insektisida']) }}">Insektisida<i class="fa-solid fa-circle-right icon-prodc"></i></a>
                            </div>
                        </div>
                    </li>


                   
                   

                    <li class="splide__slide">
                        <div class="card-product">
                            <div class="card-body-product">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pengatur Tumbuh Tanaman']) }}">
                                    <img src="{{ asset('assets/image/tumbuhtanaman.jpg') }}" >
                                    <div class="hover-overlay">
                                        <p class="lead-produk">Zat Pengatur Tumbuh Tanaman <i
                                                class="icon-prodc fa-solid fa-circle-right"></i></p>
                                        <p class="text-produk">Meningkatkan hasil panen melalui kontrol yang tepat terhadap
                                            faktor-faktor pertumbuhan tanaman</p>
                                        <p class="text-produk2">Lihat Lainnya</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pengatur Tumbuh Tanaman']) }}" style="margin-left: 0 !important;">Pengatur Tumbuh Tanaman <i
                                        class="fa-solid fa-circle-right icon-prodc"
                                        style="margin-left: 1px !important;"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="card-product">
                            <div class="card-body-product">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Produk Organik']) }}">
                                    <img src="{{ asset('assets/image/pupukorganik.jpg') }}" style="height: auto !important;">
                                    <div class="hover-overlay">
                                        <p class="lead-produk">Produk Organik <i
                                                class="icon-prodc fa-solid fa-circle-right"></i></p>
                                        <p class="text-produk">Mendukung pertanian berkelanjutan dengan menggunakan
                                            bahan-bahan alami yang ramah lingkungan</p>
                                        <p class="text-produk2">Lihat Lainnya</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Produk Organik']) }}">Produk Organik <i class="fa-solid fa-circle-right icon-prodc"></i></a>
                            </div>
    
                        </div>
                    </li>



                    {{-- <li class="splide__slide">
                        <div class="card-product">
                            <div class="card-body-product">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pestisida']) }}">
                                    <img src="{{ asset('assets/image/pestisida.jpg') }}">
                                    <div class="hover-overlay">
                                        <p class="lead-produk">Pestisida <i
                                                class="icon-prodc fa-solid fa-circle-right"></i></p>
                                        <p class="text-produk">Perlindungan umum untuk mengendalikan berbagai jenis hama dan
                                            penyakit tanaman</p>
                                        <p class="text-produk2">Lihat Lainnya</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('produk.category', ['kategori_produk' => 'Pestisida']) }}">Pestisida <i class="fa-solid fa-circle-right icon-prodc"></i></a>
                            </div>
                        </div>
                    </li> --}}



                    
                </ul>
    
            </div>
        </div>
    
        <div class="mt-4 mb-5 text-center animate-zoomIn">
            <a href="{{ route('products.index') }}" class="btn btn-danger">Lihat Selengkapnya</a>
        </div>
    
    
    </div>
</section>

