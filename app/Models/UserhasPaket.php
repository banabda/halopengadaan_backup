<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserhasPaket extends Model
{
    use HasFactory;

    protected $table = 'user_has_paket';
    protected $fillable = [
        'user_id',
        'paket',
        'expired_at',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }
}
