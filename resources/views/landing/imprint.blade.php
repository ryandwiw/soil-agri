@extends('layouts.main')
@section('content')
    <div class="container mt-3">
        <hr>
        <p class=" mt-3"><a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;">Beranda</a> / <a
                style="text-decoration: none; color: inherit; font-weight:bold;">Imprint</a> </p>
        <hr>
        <div>
            <h1 class="mb-3">Imprint</h1>
            <h4 class="mt-5">Identitas Website</h4>

            <address class="mt-4">
                <strong>Nama Pemilik:</strong><br>
                SoilFerti
            </address>


            <address>
                <strong>Alamat Kantor Pusat:</strong><br>
                Jalan Pertanian No. 123<br>
                Kota Tani, Negara Agraria 56789<br>
                Negara
            </address>

            <p><strong>Telepon:</strong> +01 234 5678</p>

            <p><strong>Email:</strong> <a href="mailto:info@soilferti.com">info@soilferti.com</a></p>



            <p class="mb-5"><strong>Disclaimer:</strong><br>
                Kami tidak bertanggung jawab atas konten situs web pihak ketiga yang dapat diakses melalui tautan dari situs
                web ini.
            </p>

            <hr>
            <p class="text-center mb-5">Copyright © Soil Ferti
            </p>




        </div>

    </div>
@endsection
