<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table = 'bidangs';
    protected $fillable = [
        'name',
    ];

    public function keahlianutama()
    {
        return $this->belongsTo('App\Models\NarasumberProfile\KeahlianUtama', 'id', 'bidang_id');
    }

    public function keahlianpendukung()
    {
        return $this->belongsTo('App\Models\NarasumberProfile\KeahlianPendukung', 'id', 'bidang_id');
    }
}
