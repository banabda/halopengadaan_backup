<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NarasumberProfile extends Model
{
    use HasFactory;

    protected $table = 'narasumber_profile';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'no_hp',
        'cv',
        'keahlian_utama',
        'keahlian_pendukung'
    ];
}
