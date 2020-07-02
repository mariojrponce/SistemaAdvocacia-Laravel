<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }
}
