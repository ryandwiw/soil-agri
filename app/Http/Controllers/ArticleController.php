<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    protected function createSlug($title)
    {
        return Str::slug($title);
    }

    public function index(Request $request)
    {
        $urutan = $request->input('urutan', 'terbaru');
    
        // Validasi untuk memastikan nilai urutan yang valid
        if (!in_array($urutan, ['terbaru', 'terlama'])) {
            abort(400, 'Nilai urutan tidak valid.');
        }
    
        $articles = Article::orderBy('created_at', $urutan == 'terbaru' ? 'desc' : 'asc')->paginate(10);
    
        return view('articles.index', compact('articles','urutan'));
    }
    

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'required',
        'kategori' => 'required',
        'gambar_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
    ]);

    $articleData = $request->only(['judul', 'isi', 'penulis', 'kategori']);
    $articleData['slug'] = $this->createSlug($request->input('judul'));
    $articleData['views'] = 0; // Set views to 0

    $article = Article::create($articleData);

    // Handle file upload for gambar_1 if any
    $fieldName = "gambar_1";
    if ($request->hasFile($fieldName)) {
        $gambar = $request->file($fieldName);
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('main/articles'), $gambarName);
        $article->$fieldName = 'main/articles/' . $gambarName;
    }

    $article->save();

    return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan');
}


    // public function show($id)
    // {
    //     $comments = Comment::where('article_id', $id)->get();
    //     $article = Article::findOrFail($id);


    //     $ip = request()->ip();

    // // Cek apakah IP sudah pernah mengunjungi artikel ini
    // if (!$article->views()->where('ip', $ip)->exists()) {
    //     // Jika belum, tambahkan pengunjung dan simpan IP ke database
    //     $article->views()->create(['ip' => $ip]);
    //     $article->increment('views');
    // }

    
    //     $articles = Article::all();
    //     return view('articles.show', compact('article','articles','comments'));
    // }

    public function show($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();
    $comments = Comment::where('article_id', $article->id)->get();

    $ip = request()->ip();

    // Cek apakah IP sudah pernah mengunjungi artikel ini
    if (!$article->views()->where('ip', $ip)->exists()) {
        // Jika belum, tambahkan pengunjung dan simpan IP ke database
        $article->views()->create(['ip' => $ip]);
        $article->increment('views');
    }

    $articles = Article::all();
    return view('articles.show', compact('article', 'articles', 'comments'));
}
    

public function edit($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();
    return view('articles.edit', compact('article'));
}

    public function update(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'gambar_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        ]);

        $articleData = $request->only(['judul', 'isi', 'penulis', 'kategori']);
        $articleData['slug'] = Str::slug($request->input('judul'));

        // Handle file upload for gambar_1 if any
        $fieldName = "gambar_1";
        if ($request->hasFile($fieldName)) {
            // Hapus gambar lama jika ada
            if ($article->$fieldName) {
                $oldImagePath = public_path($article->$fieldName);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $gambar = $request->file($fieldName);
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('main/articles'), $gambarName);
            $article->$fieldName = 'main/articles/' . $gambarName;
        }

        $article->update($articleData);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui');
    }


    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
    
        // Hapus gambar sebelum menghapus artikel
        if ($article->gambar_1) {
            $oldImagePath = public_path($article->gambar_1);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    
        $article->delete();
    
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus');
    }
    
}
