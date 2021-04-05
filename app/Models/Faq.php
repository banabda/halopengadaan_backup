<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faq';

    protected $fillable =[
       'id','pertanyaan','jawaban'
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
