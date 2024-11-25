<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSpecification;
use App\Models\ProductUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // $products = Product::all();
    //     $products = Product::paginate(20);

    //     return view('products.index', compact('products'));
    // }


    public function index(Request $request, $kategori_produk = null)
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

    return view('products.index', compact('products', 'categories', 'selectedCategories', 'specifications'));
}

    

    public function produkByCategory($kategori_produk = null)
    {
        $specifications = ProductSpecification::all();
        $categories = Product::pluck('kategori_produk')->unique()->filter();
        $selectedCategories = [$kategori_produk];
    
        // If a category is specified, filter products based on the selected category
        $products = $kategori_produk ? Product::where('kategori_produk', $kategori_produk)->get() : Product::all();
    
        return view('products.index', compact('products', 'categories', 'selectedCategories', 'specifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'kategori_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'tersedia_dalam_kemasan' => 'required|string',
            'keunggulan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:40960',
            'berkas' => 'nullable|file|max:90000',
            'formulasi' => 'nullable|string',
            'bahan_aktif' => 'nullable|string',
            'tanaman' => 'nullable|string',
            'hama_sasaran' => 'nullable|string',
            'dosis' => 'nullable|string',
            'cara_dan_waktu_aplikasi' => 'nullable|string',
        ]);

        $productData = $request->except([
            'formulasi', 'bahan_aktif', 'tanaman', 'hama_sasaran', 'dosis', 'cara_dan_waktu_aplikasi',
        ]);

        $specifications = $request->only([
            'formulasi',
            'bahan_aktif',
        ]);

        $usage = $request->only('tanaman', 'hama_sasaran', 'dosis', 'cara_dan_waktu_aplikasi');

        // Membuat produk baru
        $product = Product::create($productData);

        // Menambahkan spesifikasi produk
        $product->specifications()->create($specifications);
        $product->usage()->create($usage);

        // Menyimpan gambar jika ada
        // if ($request->hasFile('gambar')) {
        //     $gambar = $request->file('gambar');
        //     $namaGambar = $product->nama_produk . '.' . $gambar->getClientOriginalExtension();

        //     $gambar->move(public_path('main/gambar_produk'), $namaGambar);

        //     $product->update(['gambar' => $namaGambar]);
        // }

        if ($request->hasFile('berkas')) {
            $berkas = $request->file('berkas');
            $namaBerkas = $product->id . '.' . $berkas->getClientOriginalExtension();

            $berkas->move(public_path('main/berkas'), $namaBerkas); // Simpan berkas ke direktori yang diinginkan
            $product->update(['berkas' => $namaBerkas]); // Simpan nama berkas ke dalam database
        }

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = $product->id . '.' . $gambar->getClientOriginalExtension();

            $gambar->move(public_path('main/gambar_produk'), $namaGambar);

            $product->update(['gambar' => $namaGambar]);
        }

        


        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_produk' => 'required|string',
            'kategori_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'tersedia_dalam_kemasan' => 'required|string',
            'keunggulan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:40960',
            'berkas' => 'nullable|file|max:100000',
            'formulasi' => 'nullable|string',
            'bahan_aktif' => 'nullable|string',
            'tanaman' => 'nullable|string',
            'hama_sasaran' => 'nullable|string',
            'dosis' => 'nullable|string',
            'cara_dan_waktu_aplikasi' => 'nullable|string',
        ]);

        $productData = $request->except([
            'formulasi', 'bahan_aktif', 'tanaman', 'hama_sasaran', 'dosis', 'cara_dan_waktu_aplikasi',
        ]);

        $specifications = $request->only([
            'formulasi',
            'bahan_aktif',
        ]);

        $usage = $request->only('tanaman', 'hama_sasaran', 'dosis', 'cara_dan_waktu_aplikasi');

        // Memperbarui data produk
        $product->update($productData);

        // Memperbarui data spesifikasi produk
        $product->specifications()->update($specifications);
        $product->usage()->update($usage);

        // Menyimpan gambar baru jika ada
        // if ($request->hasFile('gambar')) {
        //     File::delete(public_path('main/gambar_produk/' . $product->gambar));

        //     $gambar = $request->file('gambar');
        //     $namaGambar = $product->nama_produk . '.' . $gambar->getClientOriginalExtension();
        //     $gambar->move(public_path('main/gambar_produk'), $namaGambar);

        //     $product->update(['gambar' => $namaGambar]);
        // }

        if ($request->hasFile('berkas')) {
            File::delete(public_path('main/berkas/' . $product->berkas));

            $berkas = $request->file('berkas');
            $namaBerkas = $product->id . '.' . $berkas->getClientOriginalExtension();
            $berkas->move(public_path('main/berkas'), $namaBerkas);

            $product->update(['berkas' => $namaBerkas]);
        }



        // Menyimpan gambar baru jika ada
        if ($request->hasFile('gambar')) {
            File::delete(public_path('main/gambar_produk/' . $product->gambar));

            $gambar = $request->file('gambar');
            $namaGambar = $product->id . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('main/gambar_produk'), $namaGambar);

            $product->update(['gambar' => $namaGambar]);
        }


        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        if ($product->gambar) {
            File::delete(public_path('main/gambar_produk/' . $product->gambar));
        }

        $product->delete();
        return redirect()->route('products.index');
    }

    public function downloadFile($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
    
        if ($product->berkas) {
            $pathToFile = public_path('main/berkas/' . $product->berkas);
            return response()->file($pathToFile);
        } else {
            // Handle if file not found
        }
    }
    
    
}
