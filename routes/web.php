<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{AnimesController, EntrarController, TemporadasController, EpisodiosController, 
    HomeController,SobreController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oi', function (){
    echo 'Sou eu, a primeira  <br>';
});

Route::controller(AnimesController::class)->group(function () {
    Route::get('/animes', 'index')->name('animes.index');
    Route::get('/animes/criar', 'create')->name('animes.create')->middleware('autenticador');
    Route::post('/animes/criar', 'store')->middleware('autenticador');
    Route::delete('/animes/{id}', 'remove')->name('animes.remove')->middleware('autenticador');
    Route::post('/animes/{id}/editaNome', 'edit')->middleware('autenticador');
    Route::get('animes/lista', 'list')->name('animes.lista')->middleware('autenticador');
    Route::get('animes/ranking', 'ranking')->name('animes.ranking');
});

Route::controller(TemporadasController::class)->group(function (){
    Route::get('/animes/{animeId}/temporadas', 'index')->name('temporadas.index')->middleware('autenticador');
    Route::post('/animes/{animeId}/temporadas/edit','update')->name('temporadas.edit')->middleware('autenticador');
    
});
Route::controller(EpisodiosController::class)->group(function (){
    Route::get('/temporadas/{temporadaId}/episodios', 'index')->name('episodios.index')->middleware('autenticador');
    Route::post('/temporadas/{temporadaId}/episodios/assistir', 'assistir')
    ->name('episodios.assistir')->middleware('autenticador');

});
Auth::routes();
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::controller(EntrarController::class)->group(function (){
    Route::get('/entrar', 'index')->name('entrar');
    Route::post('/entrar', 'entrar');
});

Route::controller(EntrarController::class)->group(function (){
    Route::get('/registrar', 'create')->name('registrar');
    Route::post('/registrar', 'store');
});

Route::get('/sobre', [SobreController::class,'index'])->name('sobre.index');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
})->name('sair');

Route::get('/mail', function (){
    return new \App\Mail\NovoAnime();
});


