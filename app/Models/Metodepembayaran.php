<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodepembayaran extends Model
{
    use HasFactory;
    protected $table = 'metodepembayaran';

    protected $fillable =[
       'id','transfer', 'uang_digital'
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
