<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelViews extends Model
{
    use HasFactory;
    protected $table = 'artikel_views';
    protected $fillable = [
        'artikel_id',
        'ipv4'
    ];

    public function artikel()
    {
        return $this->belongsTo('App\Models\Artikel', 'artikel_id', 'id');
    }
}
