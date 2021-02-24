<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class narasumber extends Model
{
    use HasFactory;
    protected $table = 'narasumber';

    protected $fillable =[
       'id','nama', 'email', 'password', 'alamat', 'nomor_hp'
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
