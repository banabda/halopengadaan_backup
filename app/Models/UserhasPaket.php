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
}
