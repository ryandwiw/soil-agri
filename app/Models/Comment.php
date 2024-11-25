<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'nama', 'email', 'isi_komentar'];

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->formatLocalized('%d %B %Y %I:%M %p');
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
