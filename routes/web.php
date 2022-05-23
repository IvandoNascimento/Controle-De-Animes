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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/oi', function (){
    echo 'Sou eu, a primeira  <br>';
});

Route::get('/animes', 'AnimesController@index')->name('animes.index');
Route::get('/animes/criar', 'AnimesController@create')->name('adicionar_anime')->middleware('autenticador');
Route::post('/animes/criar','AnimesController@store')->middleware('autenticador');
Route::delete('/animes/{id}','AnimesController@destroy')->middleware('autenticador');
Route::post('/animes/{id}/editaNome','AnimesController@editAnime')->middleware('autenticador');
Route::get('animes/ranking','AnimesController@rankingAnime')->name('animes.ranking');

Route::get('/animes/{animeId}/temporadas','TemporadasController@index')->name('temporadas.index');
Route::post('/animes/{animesId}/temporadas/edit','TemporadasController@update');

Route::get('/temporadas/{temporadaId}/episodios','EpisodiosController@index')->name('episodios.index');
Route::post('/temporadas/{temporadaId}/episodios/assistir','EpisodiosController@assistir')
->name('episodios.assistir')->middleware('autenticador');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index')->name('entrar');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');

Route::get('/sobre', 'SobreController@index')->name('sobre.index');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
})->name('sair');

Route::get('/mail', function (){
    return new \App\Mail\NovoAnime();
});


