<?php

namespace App\Http\Controllers;

use App\{Anime, Episodio};
use Illuminate\Http\Request;


class TemporadasController extends Controller
{
    public function index(int $id)
    {
        $anime = Anime::find($id);
        $temporadas = $anime->temporadas;
        
        return view('temporadas.index',compact('temporadas','anime',));
    }
    

    public function update(int $id,Request $request)
    {
        $anime = Anime::find($id);
        $anime->rank = $request->rank;
        $anime->status = $request->status;

        $anime->update();
        
    }
}
