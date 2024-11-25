<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulasi',
        'bahan_aktif',
    ];

    // Definisi relasi dengan Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
