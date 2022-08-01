<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    public function lokasi()
    {
        return $this->hasMany('App\Barang', 'ID_LOKASI', 'ID_LOKASI');
    }
}
