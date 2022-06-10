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
Route::view('gestion/resena', 'livewire.resena.index')->name('admin.resena');
Route::view('gestion/misionvision', 'livewire.misionvision.index')->name('admin.misionvision');
Route::view('gestion/baners', 'livewire.baner.index')->name('admin.baners');
Route::view('gestion/objetivos', 'livewire.objetivo.index')->name('admin.objetivo');
Route::view('gestion/noticias', 'livewire.noticia.index')->name('admin.noticia');
Route::view('gestion/eventos', 'livewire.evento.index')->name('admin.evento');
Route::view('gestion/actividades', 'livewire.comunicado.index')->name('admin.actividad');
Route::view('gestion/servicios/{id}', 'livewire.servicio.index')->name('admin.servicios');


//Fin de Rutas de Admin

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//vistas web

/*
Route::get('inicio', MainController::class);
Route::get('/', MainController::class); */

Route::get('/', [App\Http\Controllers\Web\IndexController::class,'inicio'])->name('inicio');
Route::get('/inicio', [App\Http\Controllers\Web\IndexController::class,'inicio'])->name('inicio');

//COMUNIDAD





Route::get('/visionmision', [App\Http\Controllers\Web\IndexController::class, 'visionmision'])->name('visionmision');
Route::get('/reseñahistorica', [App\Http\Controllers\Web\IndexController::class, 'resenahistorica'])->name('resenahistorica');
Route::get('/objetivos', [App\Http\Controllers\Web\IndexController::class, 'objetivos'])->name('objetivos');
//Route::get('/asambleageneral', [App\Http\Controllers\Web\IndexController::class, 'asambleageneral'])->name('asambleageneral');
Route::get('/organosdedireccion', [App\Http\Controllers\Web\IndexController::class, 'organosdedireccion'])->name('organosdedireccion');
Route::get('/organosdejecucion', [App\Http\Controllers\Web\IndexController::class, 'organosdejecucion'])->name('organosdejecucion');
Route::get('/organosdeadministracion', [App\Http\Controllers\Web\IndexController::class, 'organosdeadministracion'])->name('organosdeadministracion');
Route::get('/organosdeapoyo', [App\Http\Controllers\Web\IndexController::class, 'organosdeapoyo'])->name('organosdeapoyo');
Route::get('/organosdelinea', [App\Http\Controllers\Web\IndexController::class, 'aproductivas'])->name('organosdelinea');
 
/*Faltan*/
Route::get('/organosdeasesoria', [App\Http\Controllers\Web\IndexController::class, 'organosdeasesoria'])->name('organosdeasesoria');
Route::get('/comites', [App\Http\Controllers\Web\IndexController::class, 'comites'])->name('comites');
Route::get('/aempresariales', [App\Http\Controllers\Web\IndexController::class, 'aempresariales'])->name('aempresariales');
Route::get('/controlinterno', [App\Http\Controllers\Web\IndexController::class, 'controlinterno'])->name('controlinterno');
Route::get('/comitelectoral', [App\Http\Controllers\Web\IndexController::class, 'comitelectoral'])->name('comitelectoral');
/*aca*/

Route::get('/directorio', [App\Http\Controllers\Web\IndexController::class, 'asambleageneral'])->name('asambleageneral');
Route::get('/perfiles/{id}', [App\Http\Controllers\Web\IndexController::class, 'perfil'])->name('perfil');

//INSTRUMENTOS DE GESTION
//Route::post('/estatuto', [App\Http\Controllers\Web\IndexController::class, 'estatuto'])->name('estatuto');
Route::match(['get','post'],'/estatuto', [App\Http\Controllers\Web\IndexController::class, 'estatuto'])->name('estatuto');

Route::match(['get','post'],'/rof', [App\Http\Controllers\Web\IndexController::class, 'rof'])->name('rof');
Route::match(['get','post'],'/poi', [App\Http\Controllers\Web\IndexController::class, 'poi'])->name('poi');
Route::match(['get','post'],'/peconvenios', [App\Http\Controllers\Web\IndexController::class, 'peconvenios'])->name('peconvenios');
Route::match(['get','post'],'/normativas', [App\Http\Controllers\Web\IndexController::class, 'normativas'])->name('normativas');

//NOTICIAS Y EVENTOS
Route::get('/noticias', [App\Http\Controllers\Web\IndexController::class, 'noticias'])->name('noticias');
Route::get('/noticiaeventoactividad/{id}', [App\Http\Controllers\Web\IndexController::class, 'noticiasindividuales'])->name('noticiaeventoactividad');
Route::get('/eventoindividual/{id}', [App\Http\Controllers\Web\IndexController::class, 'eventoindividual'])->name('eventoindividual');
Route::get('/eventos', [App\Http\Controllers\Web\IndexController::class, 'eventos'])->name('eventos');
Route::get('/actividades', [App\Http\Controllers\Web\IndexController::class, 'actividades'])->name('actividades');
Route::get('/actividadindividual/{id}', [App\Http\Controllers\Web\IndexController::class, 'actividadindividual'])->name('actividadindividual');

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
Route::get('/pastoruri',[App\Http\Controllers\Web\IndexController::class, 'serviciospastoruri'])->name('pastoruri');
Route::get('/queshque',[App\Http\Controllers\Web\IndexController::class, 'serviciosqueshque'])->name('queshque');
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