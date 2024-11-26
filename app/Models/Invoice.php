<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'invoices';

    // Tentukan atribut yang dapat diisi massal
    protected $fillable = [
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'company_profile_tujuan',
        'company_address_tujuan',
        'company_phone_tujuan',
        'company_email_tujuan',
        'referensi',
        'invoice_date',
        'due_date',
        'items', // Menyimpan item dalam format JSON
        'subtotal',
        'total',
    ];

    // Jika Anda menyimpan items dalam format JSON, Anda bisa menambahkan cast
    protected $casts = [
        'items' => 'array', // Mengonversi items menjadi array saat diambil dari database
    ];
}
