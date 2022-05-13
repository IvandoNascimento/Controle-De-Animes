<?php

namespace Tests\Feature;

use App\Anime;
use App\Services\CriadorDeAnime;
use App\Services\RemoverAnime;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeAnimesTest extends TestCase
{
    private $anime;
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $criador = new CriadorDeAnime();
        $nomeAnime = "anime teste";
        $sinopse = "sinopse teste";

        $this->anime = $criador->CriarAnime($nomeAnime,$sinopse,1,1);
       
        
    }

    public function testRemoverAnime()
    {
        $this->assertDatabaseHas('animes',['id' => $this->anime->id]);

        $removedorAnime = new RemoverAnime();
        $nome = $removedorAnime->removerAnime($this->anime->id);

        $this->assertIsString($nome);
        $this->assertEquals($nome,$this->anime->nome);

        $this->assertDatabaseMissing('animes',['id' => $this->anime->id]);
       
    }
}
