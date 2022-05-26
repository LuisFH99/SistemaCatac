<?php

use App\Http\Controllers\Web\main;
use App\Http\Controllers\Web\Main as WebMain;
use App\Http\Controllers\Web\MainController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

//Rutas de Admin
Route::view('resena', 'livewire.resena.index')->name('resena');
Route::view('misionvision', 'livewire.misionvision.index')->name('misionvision');
Route::view('baners', 'livewire.baner.index')->name('baners');
Route::view('objetivo', 'livewire.objetivo.index')->name('objetivo');

//Fin de Rutas de Admin

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//vistas web
Route::get('inicio', MainController::class);
Route::get('/', MainController::class);

//COMUNIDAD
Route::get('/visionmision', [App\Http\Controllers\Web\IndexController::class, 'visionmision'])->name('visionmision');
Route::get('/reseñahistorica', [App\Http\Controllers\Web\IndexController::class, 'resenahistorica'])->name('resenahistorica');
Route::get('/objetivos', [App\Http\Controllers\Web\IndexController::class, 'objetivos'])->name('objetivos');
Route::get('/asambleageneral', [App\Http\Controllers\Web\IndexController::class, 'asambleageneral'])->name('asambleageneral');
Route::get('/comitespecializado', [App\Http\Controllers\Web\IndexController::class, 'comitespecializado'])->name('comitespecializado');
Route::get('/organosdeasesoria', [App\Http\Controllers\Web\IndexController::class, 'organosdeasesoria'])->name('organosdeasesoria');
Route::get('/organosdelinea', [App\Http\Controllers\Web\IndexController::class, 'organosdelinea'])->name('organosdelinea');
Route::get('/organosdeapoyo', [App\Http\Controllers\Web\IndexController::class, 'organosdeapoyo'])->name('organosdeapoyo');
Route::get('/directivos', [App\Http\Controllers\Web\IndexController::class, 'directivos'])->name('directivos');
Route::get('/directorio', [App\Http\Controllers\Web\IndexController::class, 'directorio'])->name('directorio');

//INSTRUMENTOS DE GESTION
Route::get('/estatuto', [App\Http\Controllers\Web\IndexController::class, 'estatuto'])->name('estatuto');
Route::get('/rof', [App\Http\Controllers\Web\IndexController::class, 'rof'])->name('rof');
Route::get('/poi', [App\Http\Controllers\Web\IndexController::class, 'poi'])->name('poi');
Route::get('/peconvenios', [App\Http\Controllers\Web\IndexController::class, 'peconvenios'])->name('peconvenios');

//NOTICIAS Y EVENTOS
Route::get('/noticias', [App\Http\Controllers\Web\IndexController::class, 'noticias'])->name('noticias');
Route::get('/eventos', [App\Http\Controllers\Web\IndexController::class, 'eventos'])->name('eventos');
Route::get('/actividades', [App\Http\Controllers\Web\IndexController::class, 'actividades'])->name('actividades');

//SERVICIOS
