{{-- @extends('layouts.main')

@section('content')




<div class="container mt-3 mb-3">

    <h4>Prakiraan Cuaca</h4>

    <form id="weatherForm" action="{{ route('getWeather') }}" method="get" class="form-weather">
        <div class="form-container">
            <input type="text" name="city" id="city" class="form-control" required placeholder="Masukkan Kota: Malang">
            <button type="button" class="button-input-weather" onclick="getWeather()"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
    </form>

    <div class="card d-none d-md-block d-lg-block">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-stretch">
                @foreach($todayWeather['forecast']['forecastday'] as $forecast)
                    <div class="flex-fill text-center border p-3" style="width: 20%;">
                        
                        @if(isset($forecast['date']))
                            <p>{{ date('l', strtotime($forecast['date'])) }}</p>
                        @else
                            <p>No data available for this day.</p>
                        @endif
                        <h4>{{ $forecast['date'] }}</h4>
                        @if(isset($forecast['hour'][0]['condition']['text']))
                            <p>{{ $forecast['hour'][0]['condition']['text'] }}</p>
                        @else
                            <p>No data available for this day.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['temp_c']))
                            <p>Temperature: {{ $forecast['hour'][0]['temp_c'] }}°C</p>
                        @else
                            <p>No temperature data available.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['wind_kph']))
                            <p>Wind Speed: {{ $forecast['hour'][0]['wind_kph'] }} km/h</p>
                        @else
                            <p>No wind speed data available.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['humidity']))
                            <p>Humidity: {{ $forecast['hour'][0]['humidity'] }}%</p>
                        @else
                            <p>No humidity data available.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['wind_dir']))
                            <p>Wind Direction: {{ $forecast['hour'][0]['wind_dir'] }}</p>
                        @else
                            <p>No wind direction data available.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    


    


    @if(isset($todayWeather['forecast']['forecastday']))
    <table class="table table-bordered d-none d-md-block d-lg-block">
        <thead>
            <tr>
                <th>0-8 Hours</th>
                <th>8-16 Hours</th>
                <th>16-24 Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todayWeather['forecast']['forecastday'] as $forecast)
                <tr>
                    @for($i = 0; $i < 3; $i++)
                        <td>
                            @if(isset($forecast['hour'][$i * 8]))
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-thermometer-half"></i> Temperature: {{ $forecast['hour'][$i * 8]['temp_c'] }}°C</li>
                                    <li><i class="fas fa-wind"></i> Wind: {{ $forecast['hour'][$i * 8]['wind_kph'] }} km/h</li>
                                    <li><i class="fas fa-tint"></i> Humidity: {{ $forecast['hour'][$i * 8]['humidity'] }}%</li>
                                    <li><i class="fas fa-compass"></i> Wind Direction: {{ $forecast['hour'][$i * 8]['wind_dir'] }}</li>
                                    <li><i class="fas fa-cloud"></i> Condition: {{ $forecast['hour'][$i * 8]['condition']['text'] }}</li>
                                </ul>
                            @else
                                <p>No data available for {{ $i * 8 }}-{{ ($i + 1) * 8 }} hours.</p>
                            @endif
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Tidak Ditemukan Data Prakiraan Cuaca</p>
@endif


</div>


<div id="weatherCarousel" class="carousel slide d-sm-block d-md-none d-lg-none" data-bs-wrap="false">
    <div class="carousel-indicators">
      @foreach($todayWeather['forecast']['forecastday'] as $key => $forecast)
        <button type="button" data-bs-target="#weatherCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
      @endforeach
    </div>
    <div class="carousel-inner">
      @foreach($todayWeather['forecast']['forecastday'] as $key => $forecast)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-stretch">
                      <div class="flex-fill text-center border p-3" style="width: 20%;">
                        <h5>{{ $forecast['date'] }}</h5>
                        @if(isset($forecast['date']))
                          <p>{{ date('l', strtotime($forecast['date'])) }}</p>
                        @else
                          <p>No data available for this day.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['condition']['text']))
                          <p>Condition: {{ $forecast['hour'][0]['condition']['text'] }}</p>
                        @else
                          <p>No data available for this day.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['temp_c']))
                          <p>Temperature: {{ $forecast['hour'][0]['temp_c'] }}°C</p>
                        @else
                          <p>No temperature data available.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['wind_kph']))
                          <p>Wind Speed: {{ $forecast['hour'][0]['wind_kph'] }} km/h</p>
                        @else
                          <p>No wind speed data available.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['humidity']))
                          <p>Humidity: {{ $forecast['hour'][0]['humidity'] }}%</p>
                        @else
                          <p>No humidity data available.</p>
                        @endif
                        @if(isset($forecast['hour'][0]['wind_dir']))
                          <p>Wind Direction: {{ $forecast['hour'][0]['wind_dir'] }}</p>
                        @else
                          <p>No wind direction data available.</p>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#weatherCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#weatherCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        
        
        


    









    <script>
        function getWeather() {
            // Get the city value
            var city = $('#city').val();
    
            // Set the action attribute dynamically
            $('#weatherForm').attr('action', '/get-weather/' + city);
    
            // Submit the form
            $('#weatherForm').submit();
        }

        
    </script>
@endsection --}}
