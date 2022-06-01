<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\AnimesFormRequest;
use App\Services\CriadorDeAnime;
use App\Services\RemoverAnime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




//use Illuminate\Support\Facades\Request;

use App\Anime;


class AnimesController extends Controller{
    public function index(Request $request){
        $animes = Anime::query()
        ->orderBy('nome')
        ->get();
        $mensagens = $request->session()->get('mensagens');
        return view('animes.index', compact('animes','mensagens'));
    }
    
    public function create (Request $request){
        $mensagens = $request->session()->get('mensagens');
        return view('animes.create',compact('mensagens'));
    }
   

    public function store(AnimesFormRequest $request, CriadorDeAnime $criadorDeAnime){
        $user = $request->user();
        $anime = $criadorDeAnime->CriarAnime(
           $request->nome,
           $request->sinopse,
           $request->qtd_temporadas,
           $request->ep_temporada,
           $user
        );
        $session = session()->flash('mensagens', "Anime {$anime->nome} adicionado com sucesso");
        $request->$session;
        
        return redirect()->route('animes.index');
    }
    public function destroy(Request $request, RemoverAnime $removeAnime){
        $nomeAnime = $removeAnime->removerAnime($request->id);
        $session = session()->flash('mensagens', "Anime $nomeAnime removido com sucesso ");
        $request->$session;
        
        return  redirect()->route('animes.index');
        
    }
    public function listaAnime(Request $request){
        $user = $request->user();
        $animes = Anime::query()
        ->where('user_id','=', $user->id)
        ->orderBy('nome')
        ->get();

        $mensagens = $request->session()->get('mensagens');
        
        //$rota = $request->route()->getName();
        
        return view('animes.lista', compact('animes','mensagens',));
    }
    public function editAnime(int $id,Request $request){
        $novoNome = $request->nome;
        $anime = Anime::find($id);
        $anime->nome = $novoNome;
        $anime->save();
    }
   
    public function rankingAnime(Request $request){
        $i=1;
        $animes = Anime::query()
            ->orderBy('nome')
            ->get();
        //js::from($animes);    
        return view('animes.ranking', compact('animes','i'));
    }
}