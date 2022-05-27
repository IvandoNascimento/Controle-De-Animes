<?php

namespace App\Services;

use App\{Anime, Temporada, Episodio,User};
use Illuminate\Support\Facades\DB;

class CriadorDeAnime
{

    public function CriarAnime(String $nome,String $sinopse, int $qtdTemp,int $epTemp,User $user): Anime
    {
        $anime =  null;
        
        //DB::transaction(function () use ($nome,$sinopse,$qtdTemp,$epTemp,&$anime){
        DB::beginTransaction();
        $anime = $user->animes()->create([
            'nome' => $nome,
            'sinopse' => $sinopse
        ]);
       
        $this->CriarTemporadas($anime,$qtdTemp,$epTemp);
        
        DB::commit();
        
        return $anime;
    }
    private function CriarTemporadas(Anime $anime,int $qtdTemp,int $epTemp)
    {
        
        for ($i=1; $i <= $qtdTemp; $i++) { 
            $temporada = $anime->temporadas()->create(['numero' => $i]);

            $this->CriarEpisodios($temporada, $epTemp);
        }
        
        
    }
    private function CriarEpisodios(Temporada $temporada, int $epTemp): void
    {
        for ($j=1; $j <= $epTemp ; $j++) { 
            $episodio = $temporada->episodios()->create(['numero' => $j]);
        }

    }
}


?>