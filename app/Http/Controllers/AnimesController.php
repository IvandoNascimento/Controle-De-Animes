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
use App\User;
use App\Episodio;

class AnimesController extends Controller{
    
   

    public function index(Request $request){

        
        $user = $request->user();
        $animes = Anime::query()
            ->where('user_id','=', $user->id)
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');
        
        //$request->session()->remove('mensagem');
        
        //$animes = Anime::all();
        // var_dump($animes);
        /*
        //echo $request->query('parametro');
        //var_dump($request->query());

        $animes = [
            'One Piece', 'Dragon Ball', 'Naruto', 'Death note', 'Pokemon'
        ];
        
        print_r($animes);
        echo ' <br>';
        foreach ($animes as $x){
            echo $x;
            echo '<br>';
        }
        $html = '<ul>';
        foreach ($animes as $anime){
            $html .= "<li> $anime </li>";
        }
        $html .= '</ul>';
        echo ':)';
        return $html;
        */
        //return view('animes.index', ['animes' => $animes]);
        $rota = $request->route()->getName();
        
        return view('animes.index', compact('animes','mensagem','rota'));
    }
    
    public function create (){
        return view('animes.create');
    }
   

    public function store(AnimesFormRequest $request, CriadorDeAnime $criadorDeAnime){

        
       
        //$anime = Anime::create($request->all());
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
        //echo "Anime com id {$anime->id} criada : ($anime->nome)";

        /*
        $nome = $request->get('nome');
        $sinopse = $request->get('sinopse');

        $anime = Anime::create([
            'nome' => $nome,
            'sinopse' => $sinopse
        ]);

        
        $epi = $request->get('episodios');
        //var_dump($epi);
        $anime = new Anime();
        $anime->nome = $nome;
        $anime->sinopse = $sinopse;
        //$anime->episodios = $epi;
        $anime->save();
        //var_dump($anime->save());
        //return view('animes.index');
        */

    }
    public function destroy(Request $request, RemoverAnime $removeAnime){

        //var_dump($request);
        //echo $request->id;
        $nomeAnime = $removeAnime->removerAnime($request->id);
       
        //Anime::destroy($request->id)
        $request->session()->flash('mensagem', "Anime $nomeAnime removido com sucesso ");
        
        return  redirect()->route('animes.index');
        
    }
    public function editAnime(int $id,Request $request){

        $novoNome = $request->nome;
        $anime = Anime::find($id);
        $anime->nome = $novoNome;
        $anime->save();

        //return redirect()->route('adicionar_anime');
    }
    public function rankingAnime(Request $request){

        $i=1;
        $animes = Anime::query()
            ->orderBy('nome')
            ->get();
        return view('animes.ranking', compact('animes','i'));
    }
}