<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
        use HasFactory;

        protected $table = 'profile';

        protected $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat_rumah',
        'alamat_kerja',
        'jenis_kerja',
        'status',
        'foto',
        'is_complete'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
