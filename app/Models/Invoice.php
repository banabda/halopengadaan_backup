<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected $fillable = [
        'user_id',
        'paket',
        'metode_pembayaran',
        'nama_bank',
        'kode_unik',
        'tagihan',
        'nama_rekening',
        'bukti_pembayaran',
        'status'
    ];
}
