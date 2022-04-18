<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visionmision(){

        
        $mision= DB::table('mision')
        ->join('imagenes as i','i.id','mision.imagenes_id')
        ->where('mision.activo', '=', '1')
        ->get();

        $vision= DB::table('vision')
        ->join('imagenes as i','i.id','vision.imagenes_id')
        ->where('vision.activo', '=', '1')
        ->get();

        $baner= DB::table('baner')
        ->join('imagenes as i','i.id','baner.imagenes_id')
        ->where('baner.activo', '=', '1')
        ->get();
                
        return view('web.visionmision', compact('mision','vision'));
    }

    public function resenahistorica(){

        $historia= DB::table('resena_historica')
                    ->where('activo', '=', '1')
                    ->get();

        return view('web.resenahistorica', compact('historia'));
    }

    public function objetivos(){

        $objetivos= DB::table('objetivos')
        ->where('activo', '=', '1')
        ->get();

        return view('web.objetivos', compact('objetivos'));
    }
    
    public function asambleageneral(){
        return view('web.asambleageneral');
    }

    public function comitespecializado(){
        return view('web.comitespecializado');

    }
    
    public function organosdeasesoria(){
        return view('web.organosdeasesoria');

    }

    public function organosdelinea(){
        return view('web.organosdelinea');

    }
    
    public function organosdeapoyo(){
        return view('web.organosdeapoyo');

    }
    

    public function directivos(){
        return view('web.directivos');

    }

    public function directorio(){
        return view('web.directorio');

    }

    //INSTRUMENTOS  DE GESTION

    public function estatuto(){

        return view('web.estatuto');
    }

    public function rof(){

        return view('web.rof');
    }

    public function poi(){

        return view('web.poi');
    }

    public function peconvenios(){

        return view('web.peconvenios');
    }

    //NOTICAS Y EVENTOS

    public function noticias(){

        return view('web.noticias');
    }

    public function eventos(){

        return view('web.eventos');
    }

    public function actividades(){

        return view('web.actividades');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
