<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUsage extends Model
{
    use HasFactory;

    protected $fillable = ['tanaman', 'hama_sasaran', 'dosis', 'cara_dan_waktu_aplikasi'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
