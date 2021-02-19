<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodepembayaran extends Model
{
    use HasFactory;
    protected $table = 'metodepembayaran';

    protected $fillable =[
       'nama_method', 'nama_provider', 'nama_rekening', 'nomor_rekening'
    ];
        /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
    	'created_at', 'updated_at'
    ];
}
