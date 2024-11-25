<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'isi', 'penulis', 'kategori', 'gambar_1'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->judul);
        });
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('judul', 'LIKE', "%$keyword%")
            ->orWhere('isi', 'LIKE', "%$keyword%")
            ->orWhere('penulis', 'LIKE', "%$keyword%")
            ->orWhere('kategori', 'LIKE', "%$keyword%");
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}

public function views()
{
    return $this->hasMany(ArticleView::class);
}
}
