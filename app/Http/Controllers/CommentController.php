<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {

        $comments = Comment::with('article')->latest()->paginate(10);
        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'nama' => 'required|string',
            'email' => 'required|email',
            'isi_komentar' => 'required|string',
        ]);

        $negatifKeywords = [
            'serabutan', 'tercekik', 'kelewat', 'gaduh', 'semrawut', 'penuh kejutan',
            'frustrasi', 'terganggu', 'menyalahkan', 'mengecewakan', 'menyebalkan', 'marah',
            'putus asa', 'sakit hati', 'kecewa', 'malas', 'seram', 'tertekan',
            'bodoh', 'rusak', 'gagal', 'sengsara', 'penuh tekanan', 'konyol',
            'menyesal', 'malu', 'kacau', 'terputus', 'haus darah', 'keruh',
            'lemah', 'tidak setuju', 'tidak adil', 'tidak akurat', 'tidak bersahabat',
            'jelek','jlk','ajg','gak bagus','gak tertarik',
            'kacau balau', 'kasar', 'kejam', 'bersikap kejam', 'kecewa', 'kejang',
            'sakit', 'sakit keras', 'sakit tajam', 'sakit hati', 'sakit kepala', 'keberatan',
            'merusak', 'merusak', 'membosankan', 'terganggu', 'terkejut', 'terlambat',
            'terlihat buruk', 'anjing','tersandung', 'tersinggung', 'tersulit', 'tersusahkan',
            'tertekan', 'tertekan', 'tertunda', 'teruk', 'terusir', 'terzalimi',
            'tidak acak', 'tidak akurat', 'tidak aman', 'tidak bersahabat', 'tidak bermanfaat',
            'tidak bersyukur', 'tidak bijaksana', 'tidak berarti', 'tidak berdaya',
            'tidak beres', 'tidak bernilai', 'tidak berperikemanusiaan', 'tidak bermoral',
            'tidak bersemangat', 'tidak bersih', 'tidak bekerja', 'tidak bisa diandalkan',
            'tidak cocok', 'tidak cukup', 'tidak efektif', 'tidak efisien', 'tidak etis',
            'tidak fair', 'tidak fokus', 'babi','tidak harmonis', 'tidak jelas', 'tidak jujur',
            'tidak kacau', 'tidak kalem', 'tidak kaya', 'tidak keluar', 'tidak kompeten',
            'tidak kompatibel', 'tidak konsisten', 'tidak kuat', 'tidak layak', 'tidak logis',
            'tidak masuk akal', 'tidak memadai', 'tidak memahami', 'tidak mendukung',
            'tidak mengerti', 'tidak menarik', 'tidak menyenangkan', 'tidak mudah',
            'tidak patut', 'tidak peduli', 'tidak puas', 'tidak relevan', 'tidak sederhana',
            'tidak seimbang', 'tidak stabil', 'tidak tahu malu', 'tidak tertarik',
            'serabutan', 'tercekik', 'kelewat', 'gaduh', 'semrawut', 'penuh kejutan',
            'kacau balau', 'kasar', 'kejam', 'bersikap kejam', 'kecewa', 'kejang',
            'sakit', 'sakit keras', 'sakit tajam', 'sakit hati', 'sakit kepala', 'keberatan',
            'merusak', 'merusak', 'membosankan', 'terganggu', 'terkejut', 'terlambat',
            'terlihat buruk', 'tersandung', 'tersinggung', 'tersulit', 'tersusahkan',
            'tertekan', 'tertekan', 'tertunda','anjir', 'teruk', 'terusir', 'terzalimi',
            'tidak acak', 'tidak akurat', 'tidak aman', 'tidak bersahabat', 'tidak bermanfaat',
            'tidak bersyukur', 'tidak bijaksana', 'tidak berarti','anjing','babi', 'tidak berdaya',
            'tidak beres', 'tidak bernilai', 'tidak berperikemanusiaan', 'tidak bermoral',
            'tidak bersemangat', 'tidak bersih', 'tidak bekerja', 'tidak bisa diandalkan',
            'tidak cocok', 'tidak cukup', 'tidak efektif', 'tidak efisien', 'tidak etis',
            'tidak fair', 'tidak fokus', 'tidak harmonis', 'tidak jelas', 'tidak jujur',
            'tidak kacau', 'tidak kalem', 'tidak kaya', 'tidak keluar', 'tidak kompeten',
            'tidak kompatibel', 'tidak konsisten', 'tidak kuat', 'tidak layak', 'tidak logis',
            'tidak masuk akal', 'tidak memadai', 'tidak memahami', 'tidak mendukung',
            'tidak mengerti', 'tidak menarik', 'tidak menyenangkan', 'tidak mudah',
            'tidak patut', 'tidak peduli', 'tidak puas', 'tidak relevan', 'tidak sederhana',
            'tidak seimbang', 'tidak stabil', 'tidak tahu malu', 'tidak tertarik',
        ];
        foreach ($negatifKeywords as $keyword) {
            if (stripos($request->isi_komentar, $keyword) !== false) {
                return redirect()->back()->with('error', 'Komentar mengandung kata-kata negatif.');
            }
        }

        Comment::create([
            'article_id' => $request->article_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'isi_komentar' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect()->route('comments.index')->with('success', 'Komentar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Komentar berhasil dihapus');
    }
}
