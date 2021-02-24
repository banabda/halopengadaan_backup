<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mambership extends Model
{
    use HasFactory;
    protected $table = 'mambership';

    protected $fillable =[
       'id','nama_lengkap', 'email', 'no_wa', 'tempat_kerja', 'jenis', 'status', 'mambership'
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
