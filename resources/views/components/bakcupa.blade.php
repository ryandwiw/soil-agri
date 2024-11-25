<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

<style>

    .mobile-only-ambildata{
        display: none;
    }

    .desktop-data-only{
        display: none;
    }

    @media(min-width:768px){

        .desktop-data-only{
            display: block;
        }

        .container-custom {
            margin-top: 20px; /* Adjust the top margin as needed */
        }
    
        .card-custom {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s;
            background-color: #f8f9fa; /* Light gray background */
            border: 1px solid #dee2e6; /* Light border color */
            border-radius: 8px; /* Rounded corners */
        }
    
        .card-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
        }

        .card-overlay{
            border-radius: 15px;
            background: rgba(0, 0, 0, 0.5);
            width: inherit;
            height: inherit;

    
        }
    
        .card-title-custom {
            font-size: 1.2em;
            font-weight: bold;
            color: #ffffff; 
        }
    
        .card-text-custom {
            font-size: 0.8em;
            color: #ffffff;
        }

        .card-rounded{
            border-radius:15px;
        }

    }

    @media(max-width:767px){
        
        .mobile-only-ambildata{
            display: block;
        }

        .glide {
            box-shadow: -16px 16px 15px -4px rgba(0,0,0,0.65);
    
            margin-top: 20px;
            width: 70%;
            overflow: hidden;
            margin: 0 auto;
        }
    
        .glide__slide {
            box-shadow: -16px 16px 15px -4px rgba(0,0,0,0.65);
            width: 100%;
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffe0b2;
            transition: transform 0.3s ease-in-out;
        }
    
        .glide__slide:nth-child(even) {
            background-color: #b3e0ff;
            /* Set background color for even slides */
        }
    
        .glide__slide:hover {
            transform: scale(1.05);
        }
    
        .card-content {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            height: 100%;
        }
    
        .card-overlay{
            background: rgba(0, 0, 0, 0.5);
            width: inherit;
            height: 33%;
            text-align: center;
            justify-content: flex-end;
    
        }
    
        .card-title {
            font-size: 0.9em;
            font-weight: bold;
            color: #ffffff;
        }
    
        .card-text {
            font-size: 0.9em;
            color: #ffffff;
            margin-bottom: 10px !important;  
        }
    }
    

</style>

<div class="container mt-3 mb-3" style="padding:15px;">

<div>

</div>






<h5 class="text-center mb-5">Harga rata-rata Bahan Pokok dan Penting di Jawa Timur Hari ini</h5>

<div class="desktop-data-only">
    <div class="row">
        @foreach($hargaData as $data)
        @php
            $keywordImages = [
                'Beras Medium' => asset('images/beras.jpg'), 
                'Beras Premium' => asset('images/beras.jpg'),
                'Gula' => asset('images/gula.jpg'),   
                'Jagung' => asset('images/jagung.jpg'), 
                'Kacang Kedelai Impor' => asset('images/kacangkedelai.png'),
                'Kacang Kedelai Lokal' => asset('images/kedelailokal.jpg'),
                'Cabe Merah Keriting' => asset('images/cabekeriting.jpg'),
                'Cabe Merah Besar' => asset('images/cabemerahbesar.png'),
                'Cabe Rawit Merah' => asset('images/caberawitmerah.png'),
                'Bawang Merah' => asset('images/bawangmerah.jpg'),
                'Bawang Putih' => asset('images/bawangputih.jpg'),
                'Kacang Hijau' => asset('images/kacangijo.jpg'),
                'Kacang Tanah' => asset('images/kacangtanah.jpeg'),
                'kubis' => asset('images/kubis.jpg'),
                'Kentang' => asset('images/kentang.jpg'),
                'Tomat' => asset('images/tomat.jpg'),
                'Wortel' => asset('images/wortel.jpg'),
                'Buncis' => asset('images/buncis.jpg'),
            ];
    
            $keyword = $data['nama_bahan_pokok'];
    

            $backgroundImage = asset('images/gula.jpg'); 
            foreach ($keywordImages as $key => $image) {
                if (stripos($keyword, $key) !== false) {
                    $backgroundImage = $image;
                    break;
                }
            }
        @endphp
            <div class="col-md-4 mb-3 card-rounded">
                <div class="card card-custom" style="background-image: url('{{ $backgroundImage }}'); background-size: cover; background-position: center;">
                    <div class="card-overlay">
                        <div class="card-body">
                            <h5 class="card-title card-title-custom">{{ $data['nama_bahan_pokok'] }}</h5>
                            <p class="card-text card-text-custom">Rp/ {{ $data['satuan'] }}</p>
                            <h4 class="card-text card-text-custom fw-bold" style="font-size: 1em;">Rp {{ $data['harga'] }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <div class="mobile-only-ambildata">

        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">
    
                    @foreach ($hargaData as $data)
        @php
            $keywordImages = [
                'Beras Medium' => asset('images/beras.jpg'), 
                'Beras Premium' => asset('images/beras.jpg'),
                'Gula' => asset('images/gula.jpg'),   
                'Jagung' => asset('images/jagung.jpg'), 
                'Kacang Kedelai Impor' => asset('images/kacangkedelai.png'),
                'Kacang Kedelai Lokal' => asset('images/kedelailokal.jpg'),
                'Cabe Merah Keriting' => asset('images/cabekeriting.jpg'),
                'Cabe Merah Besar' => asset('images/cabemerahbesar.png'),
                'Cabe Rawit Merah' => asset('images/caberawitmerah.png'),
                'Bawang Merah' => asset('images/bawangmerah.jpg'),
                'Bawang Putih' => asset('images/bawangputih.jpg'),
                'Kacang Hijau' => asset('images/kacangijo.jpg'),
                'Kacang Tanah' => asset('images/kacangtanah.jpeg'),
                'kubis' => asset('images/kubis.jpg'),
                'Kentang' => asset('images/kentang.jpg'),
                'Tomat' => asset('images/tomat.jpg'),
                'Wortel' => asset('images/wortel.jpg'),
                'Buncis' => asset('images/buncis.jpg'),
            ];
    
            $keyword = $data['nama_bahan_pokok'];
    

            $backgroundImage = asset('images/gula.jpg'); 
            foreach ($keywordImages as $key => $image) {
                if (stripos($keyword, $key) !== false) {
                    $backgroundImage = $image;
                    break;
                }
            }
        @endphp
    
        <div class="glide__slide" style="background-image: url('{{ $backgroundImage }}'); background-size: cover; background-position: center;">
    
                            <div class="card-content">
                                <div class="card-overlay">
    
                                    <p class="card-text card-text-custom fw-bold" style="font-size: 19px; margin-top:15px;">Rp {{ $data['harga'] }}</p>
                                    <h5 class="card-title card-title-custom">{{ $data['nama_bahan_pokok'] }}</h5>
                                    <p class="card-text card-text-custom">Rp / {{ $data['satuan'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    
    </div>
    <p class="text-end mt-5 mb-3">Layanan ini dilansir dari <a href="https://siskaperbapo.jatimprov.go.id/" style="text-decoration: none; color:inherit;">https://siskaperbapo.jatimprov.go.id/</a></p>
    
    <script>
        new Glide('.glide', {
            type: 'carousel',
            perView: 3,
            gap: 20,
            breakpoints: {
                768: {
                    perView: 1
                },
                992: {
                    perView: 2
                }
            }
        }).mount();
        </script>
    </div>

   
