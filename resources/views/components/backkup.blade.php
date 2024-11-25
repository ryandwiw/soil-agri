<style>
    /* Custom styling for the specific card structure */

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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background-color: #f8f9fa; /* Light gray background */
            border: 1px solid #dee2e6; /* Light border color */
            border-radius: 8px; /* Rounded corners */
        }
    
        .card-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Slightly larger shadow on hover */
        }
    
        .card-title-custom {
            font-size: 1.2em;
            font-weight: bold;
            color: #007bff; /* Blue title color */
        }
    
        .card-text-custom {
            font-size: 0.5em;
            color: #28a745; /* Green text color */
        }

    }
</style>


<div class="container p-5 mt-3 desktop-data-only">
    <div class="text-center">
        <h5 class="fw-medium mb-4 btn btn-danger">Harga Rata-rata Bahan Pokok dan Penting di Jawa Timur</h5>
    </div>
    <div class="row">
        @foreach($hargaData as $data)
            <div class="col-md-4 mb-3">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title card-title-custom">{{ $data['nama_bahan_pokok'] }}</h5>
                        <p class="card-text card-text-custom">Satuan: {{ $data['satuan'] }}</p>
                        <p class="card-text card-text-custom">Harga: {{ $data['harga'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p class="text-end">Layanan ini dilansir dari https://siskaperbapo.jatimprov.go.id/</p>
</div>
