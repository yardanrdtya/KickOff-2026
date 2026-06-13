<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'category_id',
        'judul',
        'isi_berita',
        'gambar',
        'author',
        'tanggal_terbit'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}