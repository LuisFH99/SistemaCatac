<?php

use App\Http\Controllers\Web\main;
use App\Http\Controllers\Web\Main as WebMain;
use App\Http\Controllers\Web\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\organo_de_gobierno\AsambleaController;
use App\Http\Controllers\admin\organo_de_gobierno\DirectivaController;
use App\Http\Controllers\admin\organo_de_gobierno\GerenciaController;
use App\Http\Controllers\admin\organo_de_gobierno\ApoyoController;
use App\Http\Controllers\admin\organo_de_gobierno\ApoyoFuncionariosController;
use App\Http\Controllers\admin\organo_de_gobierno\AsesoriaController;
use App\Http\Controllers\admin\organo_de_gobierno\AsesoriaFuncionariosController;
use App\Http\Controllers\admin\organo_de_gobierno\ComiteController;
use App\Http\Controllers\admin\organo_de_gobierno\ComiteFuncionariosController;
use App\Http\Controllers\admin\organo_de_gobierno\ProductivasController;
use App\Http\Controllers\admin\organo_de_gobierno\ProductivasFuncionariosController;
use App\Http\Controllers\admin\organo_de_gobierno\EmpresarialesController;
use App\Http\Controllers\admin\organo_de_gobierno\EmpresarialesFuncionariosController;
// use App\Http\Controllers\admin\organo_de_gobierno\ComuneroController;
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

//##############################**********Rutas de Admin**********##############################
Route::view('resena', 'livewire.resena.index')->name('resena');
Route::view('misionvision', 'livewire.misionvision.index')->name('misionvision');
Route::resource('admin/organos_de_gobierno/direccion/asamblea_general', AsambleaController::class);
Route::put('admin/organos_de_gobierno/direccion/asamblea_general/update/{id}', [AsambleaController::class, 'updateAsamblea'])->name('asamblea_general.updateAsamblea');
Route::post('admin/organos_de_gobierno/direccion/asamblea_general/habilitar', [AsambleaController::class, 'habilitar'])->name('asamblea_general.habilitar');

Route::resource('admin/organos_de_gobierno/administracion/directiva_comunal', DirectivaController::class);
Route::put('admin/organos_de_gobierno/administracion/directiva_comunal/update/{id}', [DirectivaController::class, 'updateDirectiva'])->name('directiva_comunal.updateDirectiva');
Route::post('admin/organos_de_gobierno/administracion/directiva_comunal/habilitar', [DirectivaController::class, 'habilitar'])->name('directiva_comunal.habilitar');

Route::resource('admin/organos_de_gobierno/ejecucion/gerencia', GerenciaController::class);
Route::put('admin/organos_de_gobierno/ejecucion/gerencia/update/{id}', [GerenciaController::class, 'updateGerencia'])->name('gerencia.updateGerencia');
Route::post('admin/organos_de_gobierno/ejecucion/gerencia/habilitar', [GerenciaController::class, 'habilitar'])->name('gerencia.habilitar');

Route::resource('admin/organos_de_gobierno/apoyo_asesoria/apoyo', ApoyoController::class);
Route::post('admin/organos_de_gobierno/apoyo_asesoria/apoyo/habilitar', [ApoyoController::class, 'habilitar'])->name('apoyo.habilitar');

Route::resource('admin/organos_de_gobierno/apoyo_asesoria/apoyos', ApoyoFuncionariosController::class);
Route::post('admin/organos_de_gobierno/apoyo_asesoria/apoyos/habilitar', [ApoyoFuncionariosController::class, 'habilitar'])->name('apoyos.habilitar');

Route::resource('admin/organos_de_gobierno/apoyo_asesoria/asesoria', AsesoriaController::class);
Route::post('admin/organos_de_gobierno/apoyo_asesoria/asesoria/habilitar', [AsesoriaController::class, 'habilitar'])->name('asesoria.habilitar');

Route::resource('admin/organos_de_gobierno/apoyo_asesoria/asesorias', AsesoriaFuncionariosController::class);
Route::post('admin/organos_de_gobierno/apoyo_asesoria/asesorias/habilitar', [AsesoriaFuncionariosController::class, 'habilitar'])->name('asesorias.habilitar');

Route::resource('admin/organos_de_gobierno/apoyo_asesoria/comite', ComiteController::class);
Route::post('admin/organos_de_gobierno/apoyo_asesoria/comite/habilitar', [ComiteController::class, 'habilitar'])->name('comite.habilitar');

Route::resource('admin/organos_de_gobierno/apoyo_asesoria/comites', ComiteFuncionariosController::class);
Route::post('admin/organos_de_gobierno/apoyo_asesoria/comites/habilitar', [ComiteFuncionariosController::class, 'habilitar'])->name('comites.habilitar');

Route::resource('admin/organos_de_gobierno/linea/actividades/productiva', ProductivasController::class);
Route::post('admin/organos_de_gobierno/linea/actividades/productiva/habilitar', [ProductivasController::class, 'habilitar'])->name('productiva.habilitar');

Route::resource('admin/organos_de_gobierno/linea/actividades/productivas', ProductivasFuncionariosController::class);
Route::post('admin/organos_de_gobierno/linea/actividades/productivas/habilitar', [ProductivasFuncionariosController::class, 'habilitar'])->name('productivas.habilitar');

Route::resource('admin/organos_de_gobierno/linea/actividades/empresarial', EmpresarialesController::class);
Route::post('admin/organos_de_gobierno/linea/actividades/empresarial/habilitar', [EmpresarialesController::class, 'habilitar'])->name('empresarial.habilitar');

Route::resource('admin/organos_de_gobierno/linea/actividades/empresariales', EmpresarialesFuncionariosController::class);
Route::post('admin/organos_de_gobierno/linea/actividades/empresariales/habilitar', [EmpresarialesFuncionariosController::class, 'habilitar'])->name('empresariales.habilitar');
//#########################**********Fin de Rutas de Admin**********############################




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
