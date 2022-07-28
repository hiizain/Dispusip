<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public function role()
    {
        return $this->hasMany('App\User', 'ID_ROLE', 'ID_ROLE');
    }
}
