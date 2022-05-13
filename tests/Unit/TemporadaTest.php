<?php

namespace Tests\Unit;

use App\{Temporada, Episodio};
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TemporadaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    private $temporada;

    //use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $temporada = new Temporada();
        $episodio1 = new Episodio();
        $episodio1->assistido = true;
        $episodio2 = new Episodio();
        $episodio2->assistido = false;
        $episodio3 = new Episodio();
        $episodio3->assistido = true;
        $episodio4 = new Episodio();
        $episodio4->assistido = true;
        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);
        $temporada->episodios->add($episodio4);

        $this->temporada = $temporada;
    }
    

    public function testEpisodiosAssistido()
    {
        //$this->assertTrue(true);
        

        $episodiosAssistido = $this->temporada->getEpisodiosAssistidos();
        
        $this->assertCount(3,$episodiosAssistido);

        foreach($episodiosAssistido as $episodio){
            $this->assertTrue($episodio->assistido);
        }
    }
    public function testEpisodios()
    {
        $episodios = $this->temporada->episodios;
        $this->assertCount(4,$episodios);

        
    }
}
