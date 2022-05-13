<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Temporada, Episodio};

class EpisodiosController extends Controller
{
    public function index( int $temporadaId, Request $request){

        $temporada = Temporada::find($temporadaId);
        //var_dump($temporada);
        $episodios = $temporada->episodios;
        //var_dump($episodios);
        return view('episodios.index',[
        'episodios' => $episodios,
        'temporadaId' => $temporadaId,
        'mensagem' => $request->session()->get('mensagem')
        ]);
        //return view('episodios.index',compact('episodios','temporada'));
    }

    public function assistir(int $temporadaId, Request $request)
    {
        $temporada = Temporada::find($temporadaId);
        
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos)
        {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });
        $temporada->push();

        $request->session()->flash('mensagem', 'Episódios marcados como assistidos');

        return redirect()->back();
        
    }
}
