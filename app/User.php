<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan', 'ID_JABATAN', 'ID_JABATAN');
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'ID_ROLE', 'ID_ROLE');
    }
}