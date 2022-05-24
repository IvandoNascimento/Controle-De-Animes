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

        
        $user = $request->user();
        if(!$user){
            $animes = Anime::query()
            ->where('user_id','=', $user->id)
            ->orderBy('nome')
            ->get();
        }else{
            $animes = Anime::query()
            ->orderBy('nome')
            ->get();
        }
       
        $mensagem = $request->session()->get('mensagem');
        
        $rota = $request->route()->getName();
        
        return view('animes.index', compact('animes','mensagem','rota'));
    }
    
    public function create (){
        return view('animes.create');
    }
   

    public function store(AnimesFormRequest $request, CriadorDeAnime $criadorDeAnime){
        $user = $request->user();
        $anime = $criadorDeAnime->CriarAnime(
           $request->nome,
           $request->sinopse,
           $request->qtd_temporadas,
           $request->ep_temporada,
           $user->id
        );
        $request->session()->flash('mensagem', "Anime {$anime->nome} adicionado com sucesso");
        return redirect()->route('animes.index');
    }
    public function destroy(Request $request, RemoverAnime $removeAnime){
        $nomeAnime = $removeAnime->removerAnime($request->id);
        $request->session()->flash('mensagem', "Anime $nomeAnime removido com sucesso ");
        
        return  redirect()->route('animes.index');
        
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
        return view('animes.ranking', compact('animes','i'));
    }
}