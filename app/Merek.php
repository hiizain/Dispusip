<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';

    public function merek()
    {
        return $this->hasMany('App\Barang', 'ID_MEREK', 'ID_MEREK');
    }
}
