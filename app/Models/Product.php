<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\ProductUsage;
use App\Models\ProductSpecification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'kategori_produk',
        'deskripsi',
        'tersedia_dalam_kemasan',
        'keunggulan',
        'gambar',
        'berkas',
    ];

    // Definisi relasi dengan ProductSpecification
    public function specifications()
    {
        return $this->hasOne(ProductSpecification::class);
    }

    public function usage()
    {
        return $this->hasOne(ProductUsage::class);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('nama_produk', 'LIKE', "%$keyword%")
            ->orWhere('kategori_produk', 'LIKE', "%$keyword%")
            ->orWhere('deskripsi', 'LIKE', "%$keyword%")
            ->orWhere('keunggulan','LIKE',"%$keyword%")
            ->orWhereHas('specifications', function ($query) use ($keyword) {
                $query->where('formulasi', 'LIKE', "%$keyword%")
                    ->orWhere('bahan_aktif', 'LIKE', "%$keyword%");
            })
            ->orWhereHas('usage', function ($query) use ($keyword) {
                $query->where('tanaman', 'LIKE', "%$keyword%")
                    ->orWhere('hama_sasaran', 'LIKE', "%$keyword%")
                    ->orWhere('dosis', 'LIKE', "%$keyword%")
                    ->orWhere('cara_dan_waktu_aplikasi', 'LIKE', "%$keyword%");
            });
    }
   
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->nama_produk);
        });
    }

}
