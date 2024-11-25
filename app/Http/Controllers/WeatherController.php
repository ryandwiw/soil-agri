<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Visitor;
use GuzzleHttp\Client;
// use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    

    public function getWeatherByGeolocation(Request $request)
    {
        $latitude = $request->query('lat');
        $longitude = $request->query('lon');

        $apiKey = config('services.weather.key');
        $url = "http://api.weatherapi.com/v1/current.json?key=$apiKey&q=$latitude,$longitude";

        $response = Http::get($url);
        $weatherInfo = $response->json();

        return response()->json($weatherInfo);
    }
    








//     public function getTodayWeather()
//     {
//         $city = 'malang';
//         $apiKey = config('services.weather.key');
//         $url = "http://api.weatherapi.com/v1/current.json?key=$apiKey&q=$city";

//         $response = Http::get($url);
//         $data = $response->json();

//         return $data;
//     }

//     public function getWeatherData($city)
//     {
//         $apiKey = config('services.weather.key');
//         $url = "http://api.weatherapi.com/v1/forecast.json?key=$apiKey&q=$city&days=5"; // Adjust the number of days as needed
    
//         $response = Http::get($url);
//         $data = $response->json();
    
//         return $data;
//     }
    

//     public function getWeatherByCity(Request $request)
//     {

//         $city = $request->input('city');
//         if ($request->is('get-weather/*')) {
//             $city = str_replace('get-weather/', '', $request->path());
//         }

//         $weatherData = $this->getWeatherData($city);

//         $request->session()->put('selected_city', $city);

//         $articles = Article::all()->sortByDesc('updated_at');
//         $products = Product::all()->sortByDesc('updated_at');
//         $gallerys = Gallery::all()->sortByDesc('updated_at');
//         $total = Visitor::count();

        
//         return view('landing.weather', ['todayWeather' => $weatherData], compact('total','articles','products','gallerys'));
//     }
    
//     public function showWeatherForm()
// {

//     return view('landing.weather');
// }


}
