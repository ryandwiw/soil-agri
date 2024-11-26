<?php

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\AmbilDataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/login', function(){
//     return view('admin.login');
// });

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [LandingController::class, 'admin'])->name('dashboard');
    Route::resource('gallery', GalleryController::class)->except(['index']);
    // Route::resource('products', ProductController::class)->except(['show','index']);
    Route::prefix('products')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');

        Route::get('/{slug}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{slug}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{slug}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    Route::prefix('invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoices.dashboard');
        Route::get('/create', [InvoiceController::class, 'create'])->name('invoices.create');
        Route::post('/store', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
        Route::get('/{id}/print', [InvoiceController::class, 'print'])->name('invoices.print');
    });

    Route::prefix('articles')->group(function (){
        Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/', [ArticleController::class, 'store'])->name('articles.store');

        Route::get('/{slug}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/{slug}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/{slug}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });
    // Route::resource('articles', ArticleController::class)->except(['show','index']);
    Route::resource('comments', CommentController::class)->except(['store']);

});

// Route::get('/get-weather', [WeatherController::class, 'getWeatherByCity']);
// Route::get('/get-weather', [WeatherController::class,'showWeatherForm'])->name('showWeatherForm');
// Route::get('/produk/{kategori_produk?}',[LandingController::class,'produkByCategory'] )->name('produk.category');

Route::get('/get-weather-by-geolocation', [WeatherController::class, 'getWeatherByGeolocation']);
// Route::match(['get', 'post'], '/get-weather/{city?}', [WeatherController::class,'getWeatherByCity'])->name('getWeather');
Route::get('/',[WeatherController::class,'getTodayWeatherByLocation']);
// Route::post('/get-weather/{city}', [WeatherController::class,'getWeatherByCity'])->name('getWeather');
// Route::get('/get-weather/{city?}', [WeatherController::class,'getWeatherByCity'])->name('getWeather');
// Route::post('/get-weather', [WeatherController::class, 'getWeatherByCity'])->name('getWeather');
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

// Route::get('/scrape', [AmbilDataController::class,'ambilData']);
Route::get('/pencarian', [LandingController::class, 'search'])->name('pencarian');
Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authLogin'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'authRegister'])->name('register');
Route::get('products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{slug}/download', [ProductController::class, 'downloadFile'])->name('products.download');
Route::get('/products/category/{kategori_produk?}',[ProductController::class,'produkByCategory'] )->name('produk.category');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');


// Route::get('/produk', [LandingController::class, 'produk'])->name('produk');
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/about',[LandingController::class,'about'])->name('about');
// Route::get('/galeri', [LandingController::class, 'gallery'])->name('galeri');
Route::get('/sitemap', [LandingController::class, 'sitemap'])->name('sitemap');
Route::get('/conditions-of-use', [LandingController::class, 'conditionsUse'])->name('conditionsuse');
Route::get('/pernyataan-privasi', [LandingController::class, 'PernyataanPrivasi'])->name('privasi');
Route::get('/imprint', [LandingController::class, 'imprint'])->name('imprint');
// Route::get('/artikel', [LandingController::class, 'artikel'])->name('artikel');
Route::fallback([LandingController::class, 'download']);


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/get', function () {
    return view('get');
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/generate-sitemap', function () {
    $sitemap = SitemapGenerator::create(config('app.url'))->getSitemap();

    $sitemap->add(route('landing'), now());
    $sitemap->add(route('about'), now());
    $sitemap->add(route('galeri'), now());
    $sitemap->add(route('sitemap'), now());
    $sitemap->add(route('conditionsuse'), now());
    $sitemap->add(route('privasi'), now());
    $sitemap->add(route('imprint'), now());
    $sitemap->add(route('artikel'), now());

    $sitemap->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap generated successfully!';
});


