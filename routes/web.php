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
Route::get('/directorio', [App\Http\Controllers\Web\IndexController::class, 'asambleageneral'])->name('asambleageneral');
Route::get('/perfiles/{id}', [App\Http\Controllers\Web\IndexController::class, 'perfil'])->name('perfil');

//INSTRUMENTOS DE GESTION
Route::get('/estatuto', [App\Http\Controllers\Web\IndexController::class, 'estatuto'])->name('estatuto');
Route::get('/rof', [App\Http\Controllers\Web\IndexController::class, 'rof'])->name('rof');
Route::get('/poi', [App\Http\Controllers\Web\IndexController::class, 'poi'])->name('poi');
Route::get('/peconvenios', [App\Http\Controllers\Web\IndexController::class, 'peconvenios'])->name('peconvenios');

//NOTICIAS Y EVENTOS
Route::get('/noticias', [App\Http\Controllers\Web\IndexController::class, 'noticias'])->name('noticias');
Route::get('/eventos', [App\Http\Controllers\Web\IndexController::class, 'eventos'])->name('eventos');
Route::get('/actividades', [App\Http\Controllers\Web\IndexController::class, 'actividades'])->name('actividades');
Route::get('/noticiaeventoactividad', function () {return view('web.noticiaeventoactividad');});
//SERVICIOS
//Servicentro Gasolinera
Route::get('/serviciosprincipal',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipal'])->name('serviciosprincipal');
Route::get('/serviciosofertados',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertados'])->name('serviciosofertados');
Route::get('/serviciosadquirir',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirir'])->name('serviciosadquirir');
Route::get('/serviciocontacto',[App\Http\Controllers\Web\IndexController::class, 'serviciocontacto'])->name('serviciocontacto');

//Servicentro Minimarket
Route::get('/serviciosprincipalminimarket',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalminimarket'])->name('serviciosprincipalminimarket');
Route::get('/serviciosofertadosminimarket',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadosminimarket'])->name('serviciosofertadosminimarket');
Route::get('/serviciosadquirirminimarket',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirirminimarket'])->name('serviciosadquirirminimarket');
Route::get('/serviciocontactominimarket',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactominimarket'])->name('serviciocontactominimarket');

//Ganaderia
Route::get('/serviciosprincipalganaderia',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalganaderia'])->name('serviciosprincipalganaderia');
Route::get('/serviciosofertadosganaderia',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadosganaderia'])->name('serviciosofertadosganaderia');
Route::get('/serviciosadquirirganaderia',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirirganaderia'])->name('serviciosadquirirganaderia');
Route::get('/serviciocontactoganaderia',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactoganaderia'])->name('serviciocontactoganaderia');

//Servicentro Agricultura
Route::get('/serviciosprincipalagricultura',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalagricultura'])->name('serviciosprincipalagricultura');
Route::get('/serviciosofertadosagricultura',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadosagricultura'])->name('serviciosofertadosagricultura');
Route::get('/serviciocontactoagricultura',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactoagricultura'])->name('serviciocontactoagricultura');
Route::get('/serviciosadquiriragricultura',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquiriragricultura'])->name('serviciosadquiriragricultura');

//Agricultura
Route::get('/serviciosprincipalagroveterinaria',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalagroveterinaria'])->name('serviciosprincipalagroveterinaria');
Route::get('/serviciosofertadosagroveterinaria',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadosagroveterinaria'])->name('serviciosofertadosagroveterinaria');
Route::get('/serviciocontactoagroveterinaria',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactoagroveterinaria'])->name('serviciocontactoagroveterinaria');
Route::get('/serviciosadquiriragroveterinaria',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquiriragroveterinaria'])->name('serviciosadquiriragroveterinaria');

//Turismo
Route::get('/serviciosprincipalturismo',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalturismo'])->name('serviciosprincipalturismo');
Route::get('/serviciosofertadosturismo',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadosturismo'])->name('serviciosofertadosturismo');
Route::get('/serviciocontactoturismo',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactoturismo'])->name('serviciocontactoturismo');
Route::get('/serviciosadquirirturismo',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirirturismo'])->name('serviciosadquirirturismo');

//Forestación
Route::get('/serviciosprincipalforestacion',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalforestacion'])->name('serviciosprincipalforestacion');
Route::get('/serviciosofertadosforestacion',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadosforestacion'])->name('serviciosofertadosforestacion');
Route::get('/serviciocontactoforestacion',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactoforestacion'])->name('serviciocontactoforestacion');
Route::get('/serviciosadquirirforestacion',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirirforestacion'])->name('serviciosadquirirforestacion');

//Transporte
Route::get('/serviciosprincipaltransporte',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipaltransporte'])->name('serviciosprincipaltransporte');
Route::get('/serviciosofertadostransporte',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadostransporte'])->name('serviciosofertadostransporte');
Route::get('/serviciosadquirirtransporte',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirirtransporte'])->name('serviciosadquirirtransporte');
Route::get('/serviciocontactotransporte',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactotransporte'])->name('serviciocontactotransporte');

//Transporte
Route::get('/serviciosprincipalcantera',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalcantera'])->name('serviciosprincipalcantera');
Route::get('/serviciosofertadoscantera',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadoscantera'])->name('serviciosofertadoscantera');
Route::get('/serviciosadquirircantera',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirircantera'])->name('serviciosadquirircantera');
Route::get('/serviciocontactocantera',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactocantera'])->name('serviciocontactocantera');


//Servicios 
//Servicentro Restaurant
Route::get('/serviciosprincipalrestaurante',[App\Http\Controllers\Web\IndexController::class, 'serviciosprincipalrestaurante'])->name('serviciosprincipalrestaurante');
Route::get('/serviciosofertadosrestaurante',[App\Http\Controllers\Web\IndexController::class, 'serviciosofertadosrestaurante'])->name('serviciosofertadosrestaurante');
Route::get('/serviciosadquirirrestaurante',[App\Http\Controllers\Web\IndexController::class, 'serviciosadquirirrestaurante'])->name('serviciosadquirirrestaurante');
Route::get('/serviciocontactorestaurante',[App\Http\Controllers\Web\IndexController::class, 'serviciocontactorestaurante'])->name('serviciocontactorestaurante');