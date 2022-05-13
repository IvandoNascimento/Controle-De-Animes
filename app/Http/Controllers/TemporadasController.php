<?php

namespace App\Http\Controllers;

use App\{Anime, Episodio};
use Illuminate\Http\Request;


class TemporadasController extends Controller
{
    public function index(int $animeId)
    {
        $anime = Anime::find($animeId);
        $temporadas = $anime->temporadas;
        
       
        return view('temporadas.index',compact('temporadas','anime'));
    }
    
}
