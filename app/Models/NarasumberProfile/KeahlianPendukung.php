<?php

namespace App\Models\NarasumberProfile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeahlianUPendukung extends Model
{
    use HasFactory;
    protected $table = 'narasumber_profile_keahlian_pendukung';
    protected $fillable = [
        'user_id',
        'bidang_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
