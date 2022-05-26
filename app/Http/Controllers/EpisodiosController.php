<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Temporada, Episodio};

class EpisodiosController extends Controller
{
    public function index( int $temporadaId, Request $request){

        $temporada = Temporada::find($temporadaId);
       
        $episodios = $temporada->episodios;
        return view('episodios.index',[
        'episodios' => $episodios,
        'temporadaId' => $temporadaId,
        'mensagens' => $request->session()->get('mensagens')
        ]);
    }

    public function assistir(int $temporadaId, Request $request)
    {
        $temporada = Temporada::find($temporadaId);
        
        $episodiosAssistidos = $request->episodios;
        if($episodiosAssistidos != null){
            
            $temporada->episodios->each(function (Episodio $episodio)
            use ($episodiosAssistidos)
            {   
                $episodio->assistido = in_array(
                    $episodio->id,
                    $episodiosAssistidos
                );
            });
            $temporada->push();
            $session = session()->flash('mensagens', 'Episódios marcados como assistidos');
            $request->$session;
            
            
        }else{
            $temporada->episodios->each(function (Episodio $episodio){
                $episodio->assistido = false;
            });
            $temporada->push();
            $session = session()->flash('mensagens', 'Episódios desmarcados');
            $request->$session;
        }
        return redirect()->back();
    }
}
