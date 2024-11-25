<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\WeatherController;

class LandingController extends Controller
{



    public function index(Request $request, AmbilDataController $ambildataController)
    {
        $articles = Article::all()->sortByDesc('updated_at');
        $products = Product::all()->sortByDesc('updated_at');
        $gallerys = Gallery::all()->sortByDesc('updated_at');

        $total = Visitor::count();
        // $todayWeather = $weatherController->getTodayWeather();
        $hargaData = $ambildataController->ambilData();

        return view('landing.landing', compact('articles', 'products', 'gallerys', 'total','hargaData'));
    }


    public function gallery()
    {
        $gallerys =  Gallery::orderBy('updated_at')->paginate(10);


        return view('landing.gallery', compact('gallerys'));
    }

    public function sitemap()
    {
        return view('landing.sitemap');
    }

    public function imprint()
    {

        return view('landing.imprint');
    }

    public function pernyataanPrivasi()
    {

        return view('landing.pernyataan-privasi');
    }

    public function conditionsUse()
    {

        return view('landing.conditionsUse');
    }

    public function admin()
    {

        $articles = Article::all();
        $gallerys = Gallery::all();

        $products = Product::all();

        return view('admin.dashboard', compact('articles', 'gallerys', 'products'));
    }

    public function produk(Request $request, $kategori_produk = null)
    {
        $specifications = ProductSpecification::all();
        $categories = Product::pluck('kategori_produk')->unique()->filter();
        $selectedCategories = [];
    
        // Determine the selected category
        $selectedCategory = $kategori_produk ?: $request->input('kategori_produk');
    
        // If a category is selected, filter products based on the selected category
        if ($selectedCategory) {
            $products = Product::where('kategori_produk', $selectedCategory)->get();
            $selectedCategories[] = $selectedCategory;
        } else {
            // If no category is specified, show all products
            $products = Product::all();
        }
    
        return view('landing.produk', compact('products', 'categories', 'selectedCategories', 'specifications'));
    }
    
    
    public function produkByCategory($kategori_produk = null)
    {
        $specifications = ProductSpecification::all();
        $categories = Product::pluck('kategori_produk')->unique()->filter();
        $selectedCategories = [$kategori_produk];
    
        // If a category is specified, filter products based on the selected category
        $products = $kategori_produk ? Product::where('kategori_produk', $kategori_produk)->get() : Product::all();
    
        return view('landing.produk', compact('products', 'categories', 'selectedCategories', 'specifications'));
    }
    

    public function artikel()
    {
        $articles = Article::orderBy('updated_at', 'desc')->paginate(10);

        return view('landing.artikel', compact('articles'));
    }

    public function about()
    {
        return view('landing.about');
    }



    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::search($query)->get();
        $articles = Article::search($query)->get();
        $products->load(['specifications', 'usage']);

        return view('landing.pencarian', compact('products', 'articles'));
    }

    public function filter(Request $request)
    {
        $selectedCategories = $request->input('categories', []);

        // Fetch unique categories from the Product model
        $categories = Product::pluck('kategori_produk')->unique();

        $productsQuery = Product::query();

        // If categories are selected, filter by them
        if (!empty($selectedCategories)) {
            $productsQuery->whereIn('kategori_produk', $selectedCategories);
        }

        // Paginate the results
        $filteredProducts = $productsQuery->paginate(20);

        return view('landing.produk', compact('filteredProducts', 'categories', 'selectedCategories'));
    }

    public function download($filename)
    {
        $path = public_path("main/Other/{$filename}");

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
