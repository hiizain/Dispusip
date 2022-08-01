<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    public function jabatan()
    {
        return $this->hasMany('App\User', 'ID_JABATAN', 'ID_JABATAN');
    }
}
