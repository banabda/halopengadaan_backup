<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'id');
    }

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice', 'user_id', 'id');
    }

    public function userHasPaket()
    {
        return $this->hasOne('App\Models\UserhasPaket', 'user_id', 'id');
    }

    public function message()
    {
        return $this->hasMany('App\Models\Message', 'user_id', 'id');
    }

    public function profileNarasumber()
    {
        return $this->hasOne('App\Models\NarasumberProfile', 'user_id', 'id');
    }

    public function keahlianUtama()
    {
        return $this->hasMany('App\Models\NarasumberProfile\KeahlianUtama', 'user_id', 'id');
    }

    public function keahlianPendukung()
    {
        return $this->hasMany('App\Models\NarasumberProfile\KeahlianPendukung', 'user_id', 'id');
    }
}
