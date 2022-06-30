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
        
        //$user = $request->user();
        return view('temporadas.index',compact('temporadas','anime',));
    }
    public function teste(Request $request)
    {
        //dd($request);
        return redirect()->route('temporadas.index');
    }

    public function update(int $id,Request $request)
    {
        
        //$novoStatus = $request->status;
        $anime = Anime::find($id);
        

        $anime->rank = $request->rank;
        $anime->status = $request->status;
        
        

        $anime->update();
        
    }
}
