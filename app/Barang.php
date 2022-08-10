<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    public function type()
    {
        return $this->belongsTo('App\Type', 'ID_TYPE', 'ID_TYPE');
    }

    public function lokasi()
    {
        return $this->belongsTo('App\Lokasi', 'ID_LOKASI', 'ID_LOKASI');
    }

    public function merek()
    {
        return $this->belongsTo('App\Merek', 'ID_MEREK', 'ID_MEREK');
    }
}
