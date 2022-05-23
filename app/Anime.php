<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model{

    public $timestamps = false;

    protected $fillable = ['nome','sinopse','user_id'];


    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
    
}


?>