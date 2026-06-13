<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nama_kategori'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}