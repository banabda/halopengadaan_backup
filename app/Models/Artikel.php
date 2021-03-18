<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $fillable = [
        'judul',
        'desc',
        'slug',
        'foto'
    ];

    public function artikelView()
    {
        return $this->hasMany('App\Models\ArtikelViews', 'artikel_id', 'id');
    }
}
