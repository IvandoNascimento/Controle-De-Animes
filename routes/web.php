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
use App\Http\Controllers\AnimesController;
use App\Http\Controllers\TemporadasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oi', function (){
    echo 'Sou eu, a primeira  <br>';
});

Route::get('/animes', [AnimesController::class, 'index'])->name('animes.index');
Route::get('/animes/criar', [AnimesController::class, 'create'])->name('animes.create')->middleware('autenticador');
Route::post('/animes/criar',[AnimesController::class, 'store'])->middleware('autenticador');
Route::delete('/animes/{id}',[AnimesController::class, 'remove'])->name('animes.remove')->middleware('autenticador');
Route::post('/animes/{id}/editaNome',[AnimesController::class, 'edit'])->middleware('autenticador');
Route::get('animes/lista',[AnimesController::class, 'list'])->name('animes.lista');
Route::get('animes/ranking',[AnimesController::class, 'ranking'])->name('animes.ranking');

Route::get('/animes/{animeId}/temporadas',[TemporadasController::class, 'index'])->name('temporadas.index')->middleware('autenticador');
Route::post('/animes/{animeId}/temporadas/edit',[TemporadasController::class,'update'])->name('temporadas.edit')->middleware('autenticador');

Route::get('/temporadas/{temporadaId}/episodios','EpisodiosController@index')->name('episodios.index')->middleware('autenticador');
Route::post('/temporadas/{temporadaId}/episodios/assistir','EpisodiosController@assistir')
->name('episodios.assistir')->middleware('autenticador');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index')->name('entrar');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create')->name('registrar');
Route::post('/registrar', 'RegistroController@store');

Route::get('/sobre', 'SobreController@index')->name('sobre.index');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
})->name('sair');

Route::get('/mail', function (){
    return new \App\Mail\NovoAnime();
});


