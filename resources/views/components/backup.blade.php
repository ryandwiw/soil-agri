<!-- Include Glider.js CSS and JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

<style>
    .glide {
        margin-top: 20px;
        width: 70%; /* Adjust the width as needed */
        overflow: hidden;
        margin: 0 auto; /* Center the carousel */
    }

    .glide__slide {
        width: 100%; /* Card takes the full width of the carousel */
        height: 300px;
        border-radius: 8px;
        overflow: hidden;
        margin-right: 20px;
        display: flex; /* Align content vertically and horizontally */
        justify-content: center;
        align-items: center;
        background-color: #ffe0b2; /* Set a default background color for odd slides */
        transition: transform 0.3s ease-in-out; /* Add smooth transition on hover */
    }

    .glide__slide:nth-child(even) {
        background-color: #b3e0ff; /* Set background color for even slides */
    }

    .glide__slide:hover {
        transform: scale(1.05);
    }

    .card-content {
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .card-title-custom {
        font-size: 1.2em;
        font-weight: bold;
        color: #333;
    }

    .card-text-custom {
        font-size: 0.9em;
        color: #555;
    }
</style>

<div class="container mt-3 mb-3" style="padding:15px;">
    
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">
                @foreach($hargaData as $data)
                    <div class="glide__slide">
                        <div class="card-content">
                            <h5 class="card-title card-title-custom">{{ $data['nama_bahan_pokok'] }}</h5>
                            <p class="card-text card-text-custom">Satuan: {{ $data['satuan'] }}</p>
                            <p class="card-text card-text-custom">Harga: {{ $data['harga'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

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
