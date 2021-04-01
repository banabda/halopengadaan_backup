<?php

namespace App\Models\NarasumberProfile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeahlianUtama extends Model
{
    use HasFactory;
    protected $table = 'narasumber_profile_keahlian_utama';
    protected $fillable = [
        'user_id',
        'bidang_id'
    ];
}
