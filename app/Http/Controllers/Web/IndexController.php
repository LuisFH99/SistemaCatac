<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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
            ->select('descripcion', 'mision.posicion', 'mision.activo', 'mision.borrado', 'url_imagen')
            ->where('mision.activo', '=', '1')
            ->get();

        $vision= DB::table('vision')
        ->join('imagenes as i','i.id','vision.imagenes_id')
        ->select('descripcion', 'vision.posicion', 'vision.activo', 'vision.borrado', 'url_imagen')
        ->where('vision.activo', '=', '1')
        ->get();

        $banner= DB::table('baner_pestanias')
        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
        ->where('baner_pestanias.activo', '=', '1')
        ->where('estado','misionvision')
        ->get();

        return view('web.visionmision', compact('mision','vision','banner'));
    }

    public function resenahistorica(){

        $historia= DB::table('resena_historica')
                    ->where('activo', '=', '1')
                    ->get();

        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo','1')
                    ->where('estado','reseña')
                    ->get();                    

        $slider=DB::table('imagen_has_resena')
                ->join('imagenes as i','i.id','imagen_has_resena.imagenes_id')
                ->join('resena_historica as r','r.id','imagen_has_resena.resena_historica_id')
                ->select('url_imagen')
                ->get();

        return view('web.resenahistorica', compact('historia','banner','slider'));
    }

    public function objetivos(){

        $ogenerales= DB::table('objetivos')
                ->join('imagenes as i','i.id','objetivos.imagenes_id')
                ->where('objetivos.activo','1')
                ->where('tipo_objetivo_id',1)
                ->get();

        $oespecificos= DB::table('objetivos')
            ->join('imagenes as i','i.id','objetivos.imagenes_id')
            ->where('objetivos.activo','1')
            ->where('tipo_objetivo_id',2)
            ->orderby('objetivos.id','desc')
            ->get();
        
        $tipos=DB::table('tipo_objetivo')
                ->where('id',1)
                ->get();

        $tipos1=DB::table('tipo_objetivo')
                ->where('id',2)
                ->get();

        $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                ->where('baner_pestanias.activo','1')
                ->where('estado','objetivos')
                ->get();

        $obejtivos3= DB::table('objetivos')
        ->join('imagenes as i','i.id','objetivos.imagenes_id')
        ->where('objetivos.activo','1')
        ->where('objetivos_id',4)
        ->get();
                
        return view('web.objetivos', compact('tipos1','oespecificos','banner','tipos','ogenerales','obejtivos3'));
    }
    
    public function asambleageneral(){
        $funcionarios=DB::table('funcionarios')
                        ->join('persona as p','p.id','funcionarios.persona_id')
                        ->join('cargo as c','c.id','funcionarios.cargo_id')
                        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                        ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
                        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                        ->select('p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
                        ->paginate(1);

        $banner= DB::table('baner_pestanias')
                        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                        ->where('baner_pestanias.activo', '=', '1')
                        ->where('estado','directorio')
                        ->get();
        return view('web.directorio',compact('funcionarios','banner'));
    }

    public function perfil($id){
        $perfiles=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
        ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('p.nombre as name','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
        ->where('persona_id',$id)
        ->get();

        return view('web.perfil',compact('perfiles'));
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

    //SERVICIOS
    //servicentro Gasolinera
    public function serviciosprincipal(){

        return view('web.servicentro.serviciosprincipal');
    }

    public function serviciosofertados(){

        return view('web.servicentro.serviciosofertados');
    }

    public function serviciosadquirir(){

        return view('web.servicentro.serviciosadquirir');
    }

    public function serviciocontacto(){

        return view('web.servicentro.serviciocontacto');
    }

    //servicentro Minimarket
    public function serviciosprincipalminimarket(){

        return view('web.servicentro.serviciosprincipalminimarket');
    }

    public function serviciosofertadosminimarket(){

        return view('web.servicentro.serviciosofertadosminimarket');
    }

    public function serviciosadquirirminimarket(){

        return view('web.servicentro.serviciosadquirirminimarket');
    }

    public function serviciocontactominimarket(){

        return view('web.servicentro.serviciocontactominimarket');
    }

    //servicentro Ganaderia
    public function serviciosprincipalganaderia(){

        return view('web.agropecuaria.serviciosprincipalganaderia');
    }

    public function serviciosofertadosganaderia(){

        return view('web.agropecuaria.serviciosofertadosganaderia');
    }

    public function serviciosadquirirganaderia(){

        return view('web.agropecuaria.serviciosadquirirganaderia');
    }

    public function serviciocontactoganaderia(){

        return view('web.agropecuaria.serviciocontactoganaderia');
    }

    //servicentro Agricultura
    public function serviciosprincipalagricultura(){

        return view('web.agropecuaria.serviciosprincipalagricultura');
    }

    public function serviciosofertadosagricultura(){

        return view('web.agropecuaria.serviciosofertadosagricultura');
    }

    public function serviciosadquiriragricultura(){

        return view('web.agropecuaria.serviciosadquiriragricultura');

    }public function serviciocontactoagricultura(){

        return view('web.agropecuaria.serviciocontactoagricultura');
    }

    //servicentro Agroveterinaria

    public function serviciosprincipalagroveterinaria(){

        return view('web.agroveterinaria.servicioagroveterinariaprincipal');
    }

    public function serviciosofertadosagroveterinaria(){

        return view('web.agroveterinaria.servicioagroveterinariaofertados');
    }

    public function serviciosadquiriragroveterinaria(){

        return view('web.agroveterinaria.servicioagroveterinariaadquirir');

    }public function serviciocontactoagroveterinaria(){

        return view('web.agroveterinaria.servicioagroveterinariaontacto');
    }

    //servicio transporte
    public function serviciosprincipaltransporte(){

        return view('web.transporte.serviciotransporteprincipal');
    }

    public function serviciosofertadostransporte(){

        return view('web.transporte.serviciotransporteofertados');
    }

    public function serviciosadquirirtransporte(){

        return view('web.transporte.serviciotransporteadquirir');
    }

    public function serviciocontactotransporte(){

        return view('web.transporte.serviciotransportecontacto');
    }

    //servicio turismo
    public function serviciosprincipalturismo(){

        return view('web.turismo.servicioturismoprincipal');
    }

    public function serviciosofertadosturismo(){

        return view('web.turismo.servicioturismoofertados');
    }

    public function serviciosadquirirturismo(){

        return view('web.turismo.servicioturismoadquirir');
    }

    public function serviciocontactoturismo(){

        return view('web.turismo.servicioturismocontacto');
    }

    //servicio forestacion
    public function serviciosprincipalforestacion(){

        return view('web.forestacion.servicioforestacionprincipal');
    }

    public function serviciosofertadosforestacion(){

        return view('web.forestacion.servicioforestacionofertados');
    }

    public function serviciosadquirirforestacion(){

        return view('web.forestacion.servicioforestacionadquirir');
    }

    public function serviciocontactoforestacion(){

        return view('web.forestacion.servicioforestacioncontacto');
    }

    //servicio cantera
    public function serviciosprincipalcantera(){

        return view('web.cantera.serviciocanteraprincipal');
    }

    public function serviciosofertadoscantera(){

        return view('web.cantera.serviciocanteraofertados');
    }

    public function serviciosadquirircantera(){

        return view('web.cantera.serviciocanteraadquirir');
    }

    public function serviciocontactocantera(){

        return view('web.cantera.serviciocanteracontacto');
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
