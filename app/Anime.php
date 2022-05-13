<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model{

    public $timestamps = false;

    protected $fillable = ['nome','sinopse'];


    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
    
}


?>