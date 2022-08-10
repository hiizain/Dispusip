<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuan';

    public function satuan()
    {
        return $this->hasMany('App\Type', 'ID_SATUAN', 'ID_SATUAN');
    }
}
