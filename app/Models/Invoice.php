<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected static function boot() {

        parent::boot();

        static::created(function ($InvoiceProduct) {
            $InvoiceProduct->update(['expired_at' => Carbon::now()->addDays(2)->toDateTimeString()]);
        });
    }


    protected $table = 'invoice';

    protected $fillable = [
        'user_id',
        'paket',
        'metode_pembayaran',
        'nama_bank',
        'nomor_rekening',
        'kode_unik',
        'tagihan',
        'nama_rekening',
        'bukti_pembayaran',
        'status',
        'expired_at',
        'is_seen'

    ];
}
