<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';

    public function type()
    {
        return $this->hasMany('App\Barang', 'ID_TYPE', 'ID_TYPE');
    }
}
