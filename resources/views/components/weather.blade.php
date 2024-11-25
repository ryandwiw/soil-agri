<div class="container" id="weatherContainer" style="display: none;">
    <h4 class="mt-3 text-start animate-zoomIn mb-3">Prakiraan Cuaca Hari ini</h4>

    <div class="row card shadow mb-3 animate-zoomIn" id="weatherInfo">
        <div class="d-flex justify-content-end">
            <p class="mt-3 fw-medium" id="city"></p>
            {{-- <button class="btn btn-primary mt-3 " onclick="getWeatherByGeolocation()">Aktifkan Lokasi</button> --}}
        </div>
        <div class="col-12 text-center">
            <h4 class="fw-bold" id="day"></h4>
            <p class="fw-medium" id="date"></p>
        </div>
        <div class="col-12 text-center ">
            <i class="weather-icon mb-2" id="weatherIcon"></i>
            <h5 id="conditionText" class="mt-3"></h5>
        </p>
        </div>
        <div class="row">
            <div class="col-4 text-center">
                <p class="fw-bold" id="temperature"></p>
            </div>
            <div class="col-4 text-center">
                <p class="fw-bold" id="windSpeed"></p>
            </div>
            <div class="col-4 text-center">
                <p class="fw-bold" id="humidity"></p>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 text-center">
            <p class="fw-bold" id="windDirection"></p>

            </div>
            <div class="col-12 text-center mt-5">
                <p class="fw-medium" id="lastUpdated"></p>

            </div>
        </div>



    </div>



</div>

    </div>