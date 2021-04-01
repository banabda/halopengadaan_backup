<?php

namespace App\Models\NarasumberProfile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeahlianPendukung extends Model
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

    public function bidang()
    {
        return $this->hasMany('App\Models\Bidang', 'id', 'bidang_id');
    }
}
