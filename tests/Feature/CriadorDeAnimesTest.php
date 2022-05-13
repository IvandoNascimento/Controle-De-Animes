<?php

namespace Tests\Unit;

use App\Anime;
use App\Services\CriadorDeAnime;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeAnimesTest extends TestCase
{

    use RefreshDatabase;

    public function testCriarAnime()
    {
        $criador = new CriadorDeAnime();
        $nomeAnime = "anime de teste";
        $sinopse = "aa";
        $animeCriado = $criador->CriarAnime($nomeAnime,"aa",1,1);
        

        $this->assertInstanceOf(Anime::class,$animeCriado);
        $this->assertDatabaseHas('animes',['nome' => $nomeAnime]);
        $this->assertDatabaseHas('animes',['sinopse' => $sinopse]);
        $this->assertDatabaseHas('temporadas',['anime_id' => $animeCriado->id,'numero' =>1]);
        $this->assertDatabaseHas('episodios',['numero'=> 1]);
        //$this->assertDatabaseHas('episodios', ['numero'=> 1]);
        
    }
}
