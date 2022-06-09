<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comuneros;
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

    public function inicio(){

        $noticia=DB::table('imagenes_has_noticias as in')
        ->join('noticias as n','in.noticias_id','=','n.id')
        ->join('imagenes as i','i.id','=','in.imagenes_id')
        ->select('n.titulo as titulo','n.descripcion as descripcion', 'n.fecha as fecha', 'i.url_imagen as url_imagen', 'in.id')
        ->where('n.activo', '=', '1')
        ->where('i.activo', '=', '1')
        ->orderby('id','desc')
        ->paginate(6);


        $evento=DB::table('eventos as e')
        ->join('imagenes as i','e.imagenes_id','=','i.id')
        ->select('e.titulo','e.descripcion', 'e.fecha', 'url_imagen', 'e.id')
        ->where('e.activo', '=', '1')
        ->orderby('id','desc')
        ->paginate(6);

        return view('web.index', compact('noticia','evento'));
    }

    public function visionmision(){
        
        $mision= DB::table('mision')
            ->join('imagenes as i','i.id','mision.imagenes_id')
            ->select('descripcion', 'mision.posicion', 'mision.activo', 'mision.borrado', 'url_imagen')
            ->where('mision.activo', '1')
            ->get();

        $vision= DB::table('vision')
        ->join('imagenes as i','i.id','vision.imagenes_id')
        ->select('descripcion', 'vision.posicion', 'vision.activo', 'vision.borrado', 'url_imagen')
        ->where('vision.activo','1')
        ->get();

        $banner= DB::table('baner_pestanias')
        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
        ->where('baner_pestanias.activo','1')
        ->where('estado','misionvision')
        ->get();

        return view('web.visionmision', compact('mision','vision','banner'));
    }

    public function resenahistorica(){

        $historia= DB::table('resena_historica')
                    ->where('activo', '1')
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
        $con1=1;$con=1;
        $ogenerales= DB::table('objetivos')
                ->join('imagenes as i','i.id','objetivos.imagenes_id')
                ->select('objetivo', 'objetivos.posicion', 'objetivos.activo', 'objetivos.borrado', 'url_imagen')
                ->where('objetivos.activo','1')
                ->where('tipo_objetivo_id',1)
                ->get();

        $oespecificos= DB::table('objetivos')
            ->join('imagenes as i','i.id','objetivos.imagenes_id')
            ->where('objetivos.activo','1')
            ->where('tipo_objetivo_id',2)
            ->where('objetivos.id','!=',4)
            ->select('objetivos.id as id','objetivo', 'objetivos.posicion', 'objetivos.activo', 'objetivos.borrado', 'url_imagen')
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
        ->select('objetivos.id as id','objetivo', 'objetivos.posicion', 'objetivos.activo', 'objetivos.borrado', 'url_imagen')
        ->where('objetivos.activo','1')
        ->where('objetivos_id',4)
        ->orwhere('objetivos.id',4)
        ->get();
                
        return view('web.objetivos', compact('con','con1','tipos1','oespecificos','banner','tipos','ogenerales','obejtivos3'));
    }
    
    public function asambleageneral(Request $request){

        $buscar = trim($request->get('buscar'));

        $funcionarios=DB::table('funcionarios')
                        ->join('persona as p','p.id','funcionarios.persona_id')
                        ->join('cargo as c','c.id','funcionarios.cargo_id')
                        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','s.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
                        ->where('funcionarios.estado','1')
                        ->whereRaw(DB::Raw("concat(apell_pat,' ',apell_mat,' ',p.nombre) like '%{$buscar}%'"))
                        ->orderby('p.apell_pat','asc')
                        ->paginate(12);
        
        $banner= DB::table('baner_pestanias')
                        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                        ->where('baner_pestanias.activo', '=', '1')
                        ->where('estado','directorio')
                        ->get();
                        
        return view('web.directorio',compact('buscar','funcionarios','banner'));
    }

    public function perfil($id){
        
        $perfiles=DB::table('funcionarios')
                ->join('persona as p','p.id','funcionarios.persona_id')
                ->join('cargo as c','c.id','funcionarios.cargo_id')
                ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
                ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                ->select('funcionarios.id as id','url_cv','p.nombre as name','DNI','profesion','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil','url_cv')
                ->where('funcionarios.id',$id)
                ->get();
        
        $perfiles1=DB::table('funcionarios')
                ->join('persona as p','p.id','funcionarios.persona_id')
                ->join('cargo as c','c.id','funcionarios.cargo_id')
                ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                ->join('sub_organos_gobierno as o','o.id','s.sub_organos_gobierno_id')
                ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                ->select('funcionarios.id as id','url_cv','p.nombre as name','DNI','profesion','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil','url_cv')
                ->where('funcionarios.id',$id)
                ->get();

        return view('web.perfil',compact('perfiles','perfiles1'));
    }

    /*organos de gobierno*/

    public function organosdedireccion(Request $request){

        $buscar = trim($request->get('buscar'));


        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','direccion')
                    ->get();

        $organos= DB::table('sub_organos_gobierno')
                    ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
                    ->where('sub_organos_gobierno.activo',1)
                    ->where('organo_gobierno_id',1)
                    ->select('sub_organos_gobierno.nombre as nombre','descripcion')
                    ->get();

        $funcionarios=DB::table('comuneros')
                        ->join('persona as p','p.id','comuneros.persona_id')
                        ->join('imagenes as i','i.id','comuneros.imagenes_id')
                        ->select('p.DNI','p.nombre as name','p.apell_pat as apep','p.apell_mat as apem','email','telefono','url_imagen')
                        ->whereRaw(DB::Raw("concat(apell_pat,' ',apell_mat,' ',p.nombre) like '%{$buscar}%'"))
                        ->orderby('p.apell_pat','asc')
                        ->paginate(12);
        
        return view('web.organosdedireccion', compact('organos','banner','funcionarios','buscar'));
    }
    
    public function organosdejecucion(Request $request){

        $buscar = trim($request->get('buscar'));

        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','ejecucion')
                    ->get();

        $organos= DB::table('sub_organos_gobierno')
                    ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
                    ->where('sub_organos_gobierno.activo',1)
                    ->where('organo_gobierno_id',2)
                    ->select('sub_organos_gobierno.nombre as nombre','descripcion')
                    ->get();
        
        $funcionarios=DB::table('funcionarios')
                    ->join('persona as p','p.id','funcionarios.persona_id')
                    ->join('cargo as c','c.id','funcionarios.cargo_id')
                    ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                    ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
                    ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                    ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
                    ->where('funcionarios.estado','1')
                    ->where('o.id',2)
                    ->whereRaw(DB::Raw("concat(apell_pat,' ',apell_mat,' ',p.nombre) like '%{$buscar}%'"))
                    ->orderby('p.apell_pat','asc')
                    ->paginate(12);

        return view('web.organosdejecucion', compact('buscar','organos','banner','funcionarios'));
    }

    public function organosdeadministracion(Request $request){

        $buscar = trim($request->get('buscar'));
        
        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','administracion')
                    ->get();

        $organos= DB::table('sub_organos_gobierno')
                    ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
                    ->where('sub_organos_gobierno.activo',1)
                    ->where('organo_gobierno_id',3)
                    ->select('sub_organos_gobierno.nombre as nombre','descripcion')
                    ->get();
        
        $funcionarios=DB::table('funcionarios')
                    ->join('persona as p','p.id','funcionarios.persona_id')
                    ->join('cargo as c','c.id','funcionarios.cargo_id')
                    ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                    ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
                    ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                    ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
                    ->whereRaw(DB::Raw("concat(apell_pat,' ',apell_mat,' ',p.nombre) like '%{$buscar}%'"))
                    ->where('funcionarios.estado','1')
                    ->where('o.id',3)
                    ->orderby('p.apell_pat','asc')
                    ->paginate(12);

        return view('web.organosdeadministracion', compact('buscar','organos','banner','funcionarios'));

    }
    /*organos de asesoria y apoyo*/
    public function organosdeapoyo(Request $request){

        //organo apoyo
        $buscar = trim($request->get('buscar'));

        $banner= DB::table('baner_pestanias')
        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
        ->where('baner_pestanias.activo', '=', '1')
        ->where('estado','apoyo')
        ->get();

        $organos= DB::table('sub_organos_gobierno')
        ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.id',6)
        ->select('sub_organos_gobierno.nombre as nombre','descripcion')
        ->get();

        $suborganos= DB::table('sub_organos_gobierno')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.sub_organos_gobierno_id',6)
        ->get();

        $funcionarios1=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',21)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios2=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',22)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios3=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',23)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios4=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',24)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios5=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',25)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        return view('web.organosdeapoyo', compact('buscar','suborganos','organos','banner','funcionarios1','funcionarios2','funcionarios3','funcionarios4','funcionarios5'));
    }

    public function organosdeasesoria(Request $request){

        $buscar = trim($request->get('buscar'));

        $banner= DB::table('baner_pestanias')
        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
        ->where('baner_pestanias.activo', '=', '1')
        ->where('estado','apoyo')
        ->get();

        $organos= DB::table('sub_organos_gobierno')
        ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.id',4)
        ->select('sub_organos_gobierno.nombre as nombre','descripcion')
        ->get();

        $suborganos= DB::table('sub_organos_gobierno')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.sub_organos_gobierno_id',4)
        ->get();


        $funcionarios1=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',8)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios2=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',9)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios3=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',10)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios4=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',11)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);


        return view('web.organosdeasesoria', compact('funcionarios1','funcionarios2','funcionarios3','funcionarios4','suborganos','buscar','organos','banner'));

    }

    public function comites(Request $request){

        
        $buscar = trim($request->get('buscar'));

        $banner= DB::table('baner_pestanias')
        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
        ->where('baner_pestanias.activo', '=', '1')
        ->where('estado','apoyo')
        ->get();

        $organos= DB::table('sub_organos_gobierno')
        ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.id',5)
        ->select('sub_organos_gobierno.nombre as nombre','descripcion')
        ->get();


        $suborganos= DB::table('sub_organos_gobierno')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.sub_organos_gobierno_id',5)
        ->get();


        $funcionarios1=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',12)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);
        
        $funcionarios2=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',13)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios3=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',14)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios4=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',15)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios5=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',16)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios6=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',17)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios7=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',18)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios8=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',19)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios9=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('funcionarios.sub_organos_gobierno_id',20)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);


        return view('web.comites', compact('buscar','suborganos','organos','banner','funcionarios1','funcionarios2','funcionarios3','funcionarios4','funcionarios5','funcionarios6','funcionarios7','funcionarios8','funcionarios9'));

    }

    public function aproductivas(Request $request){

        $buscar = trim($request->get('buscar'));

        $banner= DB::table('baner_pestanias')
        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
        ->where('baner_pestanias.activo', '=', '1')
        ->where('estado','linea')
        ->get();
        /*
        $organos= DB::table('sub_organos_gobierno')
        ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.id',5)
        ->select('sub_organos_gobierno.nombre as nombre','descripcion')
        ->get(); */

        $suborganos= DB::table('sub_organos_gobierno')
        ->where('sub_organos_gobierno.activo',1)
        ->where('sub_organos_gobierno.organo_gobierno_id',5)
        ->get();

        $funcionarios1=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
        ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('s.id',27)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios2=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
        ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('s.id',28)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios3=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
        ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('s.id',29)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios4=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
        ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('s.id',30)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        $funcionarios5=DB::table('funcionarios')
        ->join('persona as p','p.id','funcionarios.persona_id')
        ->join('cargo as c','c.id','funcionarios.cargo_id')
        ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
        ->join('organo_gobierno as o','o.id','s.organo_gobierno_id')
        ->join('imagenes as i','i.id','funcionarios.imagenes_id')
        ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','o.nombre as organo','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
        ->where('funcionarios.estado','1')
        ->where('s.id',31)
        ->orderby('p.apell_pat','asc')
        ->paginate(12);

        return view('web.organosdelinea', compact('buscar','suborganos','banner','funcionarios1','funcionarios2','funcionarios3','funcionarios4','funcionarios5'));
    }

    public function aempresariales(){
        
        return view('web.aempresariales');
    }
    
    //Organos Autonomos

    public function controlinterno(Request $request){

        $buscar = trim($request->get('buscar'));

        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','ejecucion')
                    ->get();

        $organos= DB::table('sub_organos_gobierno')
                    ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
                    ->where('sub_organos_gobierno.activo',1)
                    ->where('sub_organos_gobierno.id',7)
                    ->select('sub_organos_gobierno.nombre as nombre','descripcion')
                    ->get();
        
        $funcionarios=DB::table('funcionarios')
                    ->join('persona as p','p.id','funcionarios.persona_id')
                    ->join('cargo as c','c.id','funcionarios.cargo_id')
                    ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                    ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                    ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
                    ->where('funcionarios.estado','1')
                    ->where('s.id',7)
                    ->orderby('p.apell_pat','asc')
                    ->paginate(12);

        return view('web.controlinterno', compact('buscar','organos','banner','funcionarios'));
    }

    public function comitelectoral(Request $request){

        $buscar = trim($request->get('buscar'));

        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','ejecucion')
                    ->get();

        $organos= DB::table('sub_organos_gobierno')
                    ->join('organo_gobierno as o','o.id','sub_organos_gobierno.organo_gobierno_id')
                    ->where('sub_organos_gobierno.activo',1)
                    ->where('sub_organos_gobierno.id',26)
                    ->select('sub_organos_gobierno.nombre as nombre','descripcion')
                    ->get();
        
        $funcionarios=DB::table('funcionarios')
                    ->join('persona as p','p.id','funcionarios.persona_id')
                    ->join('cargo as c','c.id','funcionarios.cargo_id')
                    ->join('sub_organos_gobierno as s','s.id','funcionarios.sub_organos_gobierno_id')
                    ->join('imagenes as i','i.id','funcionarios.imagenes_id')
                    ->select('funcionarios.id as id','p.nombre as name','p.id as persona','p.apell_pat as apep','fech_inicio','fech_fin','email','telefono','p.apell_mat as apem','s.nombre as nombre','cargo','url_imagen','perfil')
                    ->where('funcionarios.estado','1')
                    ->where('s.id',26)
                    ->orderby('p.apell_pat','asc')
                    ->paginate(12);


        return view('web.comitelectoral', compact('buscar','organos','banner','funcionarios'));
    }

    public function estatuto(Request $request){

        $codigo = trim($request->get('codigo'));

        $codigos = DB::table('comuneros')
                    ->where('codigo',$codigo)
                    ->count();

        $instrumentos=DB::table('instrumentos_gestion')
                    ->join('tipo_instrumento as t','t.id','instrumentos_gestion.tipo_instrumento_id')
                    ->where('instrumentos_gestion.activo',1)
                    ->where('tipo_instrumento_id',4)
                    ->get();
        
        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','estatuto')
                    ->get();

        $modicatoria= DB::table('modificatorias')
                    ->join('instrumentos_gestion as g','g.id','modificatorias.instrumentos_gestion_id')
                    ->where('modificatorias.activo',1)
                    ->where('instrumentos_gestion_id',4)
                    ->get();

        return view('web.estatuto', ["codigos"=>$codigos,"instrumentos" => $instrumentos, "banner" => $banner, "modicatoria" => $modicatoria,"codigo" => $codigo]);
    }

    public function rof(Request $request){

        $codigo = trim($request->get('codigo'));

        $codigos = DB::table('comuneros')
                    ->where('codigo',$codigo)
                    ->count();

        $instrumentos=DB::table('instrumentos_gestion')
                    ->join('tipo_instrumento as t','t.id','instrumentos_gestion.tipo_instrumento_id')
                    ->select('instrumentos_gestion.id as id', 'descripcion', 'url_documento','tipo')
                    ->where('instrumentos_gestion.activo',1)
                    ->where('tipo_instrumento_id',1)
                    ->get();
        
        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','rof')
                    ->get();

        return view('web.rof', ["codigos"=>$codigos,"instrumentos" => $instrumentos, "banner" => $banner,"codigo" => $codigo]);
    }

    public function poi(Request $request){

        $codigo = trim($request->get('codigo'));

        $codigos = DB::table('comuneros')
                    ->where('codigo',$codigo)
                    ->count();

        $instrumentos=DB::table('instrumentos_gestion')
                    ->join('tipo_instrumento as t','t.id','instrumentos_gestion.tipo_instrumento_id')
                    ->select('instrumentos_gestion.id as id', 'descripcion', 'url_documento','tipo')
                    ->where('instrumentos_gestion.activo',1)
                    ->where('tipo_instrumento_id',2)
                    ->get();
        
        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','poi')
                    ->get();

        return view('web.poi', ["codigos"=>$codigos,"instrumentos" => $instrumentos, "banner" => $banner,"codigo" => $codigo]);
    }

    public function peconvenios(Request $request){
        $codigo = trim($request->get('codigo'));

        $codigos = DB::table('comuneros')
                    ->where('codigo',$codigo)
                    ->count();
                    
        $instrumentos=DB::table('instrumentos_gestion')
                    ->join('tipo_instrumento as t','t.id','instrumentos_gestion.tipo_instrumento_id')
                    ->select('instrumentos_gestion.id as id', 'descripcion', 'url_documento','tipo')
                    ->where('instrumentos_gestion.activo',1)
                    ->where('tipo_instrumento_id',3)
                    ->get();
        
        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','peconvenios')
                    ->get();

        return view('web.peconvenios', ["codigos"=>$codigos,"instrumentos" => $instrumentos, "banner" => $banner,"codigo" => $codigo]);
    }

    public function normativas(Request $request){

        $codigo = trim($request->get('codigo'));

        $codigos = DB::table('comuneros')
                    ->where('codigo',$codigo)
                    ->count();
        $con=1;
        $instrumentos=DB::table('instrumentos_gestion')
                    ->join('tipo_instrumento as t','t.id','instrumentos_gestion.tipo_instrumento_id')
                    ->select('instrumentos_gestion.id as id', 'descripcion', 'url_documento','tipo')
                    ->where('instrumentos_gestion.activo',1)
                    ->where('tipo_instrumento_id',5)
                    ->get();
        
        $banner= DB::table('baner_pestanias')
                    ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
                    ->where('baner_pestanias.activo', '=', '1')
                    ->where('estado','normativo')
                    ->get();

        return view('web.normativa', ["con"=>$con,"codigos"=>$codigos,"instrumentos" => $instrumentos, "banner" => $banner,"codigo" => $codigo]);
    }

    //NOTICAS Y EVENTOS

public function noticiasindividuales($id){

    $noticia=DB::table('imagenes_has_noticias as in')
            ->join('noticias as n','n.id','=','in.noticias_id')
            ->join('imagenes as i','i.id','=','in.imagenes_id')
            ->select('n.titulo','n.descripcion', 'n.fecha', 'url_imagen', 'in.id')
            ->where('in.id','=',$id)
            ->where('n.activo', '=', '1')
            ->where('i.activo', '=', '1')
            ->get();
            
    $noticianuevas=DB::table('imagenes_has_noticias as in')
            ->join('noticias as n','in.noticias_id','=','n.id')
            ->join('imagenes as i','i.id','=','in.imagenes_id')
            ->select('n.titulo as titulo','n.descripcion as descripcion', 'n.fecha as fecha', 'i.url_imagen as url_imagen', 'in.id')
            ->where('n.activo', '=', '1')
            ->where('i.activo', '=', '1')
            ->orderby('n.fecha', 'desc')
            ->get();

    $encargado= DB::table('encargado as e')
            ->join('imagenes as i','i.id','=','e.imagenes_id')
            ->join('persona as p','p.id','=','e.persona_id')
            ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'i.url_imagen')
            ->where('e.activo', '=', '1')
            ->where('e.descripcion','Encargado de la web')
            ->get();        
    
    $banner= DB::table('baner_pestanias as b')
            ->join('imagenes as i','i.id','=','b.imagenes_id')
            ->select('i.url_imagen')
            ->where('b.activo','=', '1')
            ->where('b.estado','noticias')
            ->get();

    return view('web.noticiaeventoactividad', compact('noticia','banner','noticianuevas','encargado'));
}

public function noticias(){

    $noticia=DB::table('imagenes_has_noticias as in')
            ->join('noticias as n','in.noticias_id','=','n.id')
            ->join('imagenes as i','i.id','=','in.imagenes_id')
            ->select('n.titulo as titulo','n.descripcion as descripcion', 'n.fecha as fecha', 'i.url_imagen as url_imagen', 'in.id')
            ->where('n.activo', '=', '1')
            ->where('i.activo', '=', '1')
            ->get();
    
    $noticianuevas=DB::table('imagenes_has_noticias as in')
            ->join('noticias as n','in.noticias_id','=','n.id')
            ->join('imagenes as i','i.id','=','in.imagenes_id')
            ->select('n.titulo as titulo','n.descripcion as descripcion', 'n.fecha as fecha', 'i.url_imagen as url_imagen', 'in.id')
            ->where('n.activo', '=', '1')
            ->where('i.activo', '=', '1')
            ->orderby('n.fecha', 'desc')
            ->get();

    $banner= DB::table('baner_pestanias as b')
            ->join('imagenes as i','i.id','b.imagenes_id')
            ->where('b.activo', '=', '1')
            ->where('b.estado','noticias')
            ->get();

    return view('web.noticias', compact('noticia','banner','noticianuevas'));
}

public function eventoindividual($id){

    $evento=DB::table('eventos as e')
            ->join('imagenes as i','e.imagenes_id','=','i.id')
            ->select('e.titulo','e.descripcion', 'e.fecha', 'url_imagen', 'e.id')
            ->where('e.activo', '=', '1')
            ->where('e.id','=',$id)
            ->get();
    
    $eventosnuevos=DB::table('eventos as e')
            ->join('imagenes as i','e.imagenes_id','=','i.id')
            ->select('e.titulo','e.descripcion', 'e.fecha', 'url_imagen', 'e.id')
            ->where('e.activo', '=', '1')
            ->get();

    $banner= DB::table('baner_pestanias')
            ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
            ->where('baner_pestanias.activo', '=', '1')
            ->where('estado','noticias')
            ->get();

    return view('web.evento', compact('evento','eventosnuevos','banner')); /*Crear*/ 
}

public function eventos(){

    $evento=DB::table('eventos as e')
            ->join('imagenes as i','e.imagenes_id','=','i.id')
            ->select('e.titulo','e.descripcion', 'e.fecha', 'url_imagen', 'e.id')
            ->where('e.activo', '=', '1')
            ->get();

    $eventosnuevos=DB::table('eventos as e')
            ->join('imagenes as i','e.imagenes_id','=','i.id')
            ->select('e.titulo','e.descripcion', 'e.fecha', 'url_imagen', 'e.id')
            ->where('e.activo', '=', '1')
            ->get();

    $banner= DB::table('baner_pestanias')
            ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
            ->where('baner_pestanias.activo', '=', '1')
            ->where('estado','noticias')
            ->get();

    return view('web.eventos', compact('evento', 'banner', 'eventosnuevos'));
}

public function actividades(){

    $comunicado=DB::table('comunicados as c')
            ->join('imagenes as i','c.imagenes_id','=','i.id')
            ->select('c.titulo','c.descripcion', 'c.fecha', 'i.url_imagen', 'c.id')
            ->where('c.activo', '=', '1')
            ->get();

    $banner= DB::table('baner_pestanias')
            ->join('imagenes as i','i.id','baner_pestanias.imagenes_id')
            ->where('baner_pestanias.activo', '=', '1')
            ->where('estado','noticias')
            ->get();

    return view('web.actividades', compact('comunicado','banner'));
}

public function actividadindividual($id){

    $comunicado=DB::table('comunicados as c')
            ->join('imagenes as i','c.imagenes_id','=','i.id')
            ->select('c.titulo','c.descripcion', 'c.fecha', 'i.url_imagen', 'c.id')
            ->where('c.activo', '=', '1')
            ->where('c.id','=',$id)
            ->get();

    return view('web.actividad', compact('comunicado')); /*Crear*/ 
}

//SERVICIOS
//servicentro Gasolinera
public function serviciosprincipal(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Estación de Servicio')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Servicentro')
                ->get();

    $banner= DB::table('baner_pestanias as b')
                ->join('imagenes as i','i.id','=','b.imagenes_id')
                ->select('i.url_imagen')
                ->where('b.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciosprincipal', compact('banner','subservicio','funciones'));
}

public function serviciosofertados(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Estación de Servicio')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciosofertados', compact('banner','producto'));
}

public function serviciosadquirir(){

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciosadquirir', compact('banner'));
}

public function serviciocontacto(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Estación de Servicio')
                ->get();
    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciocontacto', compact('banner','encargado'));
}

//servicentro Minimarket
public function serviciosprincipalminimarket(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','MiniMarket')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Servicentro')
                ->get();

    $banner= DB::table('baner_pestanias as b')
                ->join('imagenes as i','i.id','=','b.imagenes_id')
                ->select('i.url_imagen')
                ->where('b.activo', '=', '1')
                ->where('estado','servicio')
                ->get();
    
    return view('web.servicentro.serviciosprincipalminimarket',compact('banner','subservicio','funciones'));
}

public function serviciosofertadosminimarket(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','MiniMarket')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciosofertadosminimarket', compact('producto','banner'));
}

public function serviciosadquirirminimarket(){

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciosadquirirminimarket', compact('banner'));
}

public function serviciocontactominimarket(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','MiniMarket')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciocontactominimarket', compact('banner','encargado'));
}

//servicentro Ganaderia
public function serviciosprincipalganaderia(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Ganaderia')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Agropecuaria')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();
    
    return view('web.agropecuaria.serviciosprincipalganaderia', compact('banner','subservicio','funciones'));
}

public function serviciosofertadosganaderia(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Ganaderia')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.agropecuaria.serviciosofertadosganaderia', compact('banner','producto'));
}

public function serviciosadquirirganaderia(){

    $banner= DB::table('baner_pestanias')
                        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                        ->where('baner_pestanias.activo', '=', '1')
                        ->where('estado','servicio')
                        ->get();

    return view('web.agropecuaria.serviciosadquirirganaderia', compact('banner'));
}

public function serviciocontactoganaderia(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Ganaderia')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.agropecuaria.serviciocontactoganaderia', compact('banner','encargado'));
}

//servicentro Agricultura
public function serviciosprincipalagricultura(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Agricultura')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Agropecuaria')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.agropecuaria.serviciosprincipalagricultura', compact('banner','subservicio','funciones'));
}

public function serviciosofertadosagricultura(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Agricultura')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.agropecuaria.serviciosofertadosagricultura', compact('banner','producto'));
}

public function serviciosadquiriragricultura(){

    $banner= DB::table('baner_pestanias')
                        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                        ->where('baner_pestanias.activo', '=', '1')
                        ->where('estado','servicio')
                        ->get();
    
    return view('web.agropecuaria.serviciosadquiriragricultura', compact('banner'));

}public function serviciocontactoagricultura(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Agricultura')
                ->get();
    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();
    
    return view('web.agropecuaria.serviciocontactoagricultura', compact('banner','encargado'));
}

//servicentro Agroveterinaria

public function serviciosprincipalagroveterinaria(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Agroveterinaria')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Agroveterinaria')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.agroveterinaria.servicioagroveterinariaprincipal', compact('subservicio','funciones','banner'));
}

public function serviciosofertadosagroveterinaria(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Agroveterinaria')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.agroveterinaria.servicioagroveterinariaofertados', compact('producto','banner'));
}

public function serviciosadquiriragroveterinaria(){

    $banner= DB::table('baner_pestanias')
                        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                        ->where('baner_pestanias.activo', '=', '1')
                        ->where('estado','servicio')
                        ->get();

    return view('web.agroveterinaria.servicioagroveterinariaadquirir', compact('banner'));

}public function serviciocontactoagroveterinaria(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Agroveterinaria')
                ->get();

    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.agroveterinaria.servicioagroveterinariaontacto', compact('encargado','banner'));
}

//servicio transporte
public function serviciosprincipaltransporte(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Transporte de Materiales')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Transporte')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.transporte.serviciotransporteprincipal', compact('subservicio','funciones','banner'));
}

public function serviciosofertadostransporte(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Transporte de Materiales')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.transporte.serviciotransporteofertados', compact('producto','banner'));
}

public function serviciosadquirirtransporte(){

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();
    
    return view('web.transporte.serviciotransporteadquirir', compact('banner'));
}

public function serviciocontactotransporte(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Transporte de Materiales')
                ->get();
    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.transporte.serviciotransportecontacto', compact('encargado','banner'));
}

//servicio turismo
public function serviciosprincipalturismo(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Turismo')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Turismo')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.turismo.servicioturismoprincipal', compact('subservicio','funciones','banner'));
}

public function serviciosofertadosturismo(){
    
    $pastoruri= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('p.activo', '=', '1')
                ->where('p.id','=','27')
                ->get();
    
    $queshque= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('p.activo', '=', '1')
                ->where('p.id','=','28')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.turismo.servicioturismoofertados', compact('banner','pastoruri','queshque'));
}

public function serviciospastoruri(){

    $pastoruri= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('p.activo', '=', '1')
                ->where('p.id','=','27')
                ->get();

    return view('web.turismo.turismopastoruri', compact('pastoruri'));
}

public function serviciosqueshque(){
    
    $queshque= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('p.activo', '=', '1')
                ->where('p.id','=','28')
                ->get();

    return view('web.turismo.turismoqueshque', compact('queshque'));
}

public function serviciosadquirirturismo(){

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.turismo.servicioturismoadquirir', compact('banner'));
}

public function serviciocontactoturismo(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Turismo')
                ->get();
    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.turismo.servicioturismocontacto', compact('encargado','banner'));
}

//servicio forestacion
public function serviciosprincipalforestacion(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Forestacion')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Forestacion')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','forestacion')
                ->get();

    return view('web.forestacion.servicioforestacionprincipal', compact('subservicio','funciones','banner'));
}

public function serviciosofertadosforestacion(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Forestacion')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','forestacion')
                ->get();

    return view('web.forestacion.servicioforestacionofertados', compact('banner', 'producto'));
}

public function serviciosadquirirforestacion(){

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','forestacion')
                ->get();

    return view('web.forestacion.servicioforestacionadquirir', compact('banner'));
}

public function serviciocontactoforestacion(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Forestacion')
                ->get();
    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','forestacion')
                ->get();


    return view('web.forestacion.servicioforestacioncontacto', compact('encargado', 'banner'));
}

//servicio cantera
public function serviciosprincipalcantera(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Cantera')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Cantera')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.cantera.serviciocanteraprincipal', compact('subservicio','funciones','banner'));
}

public function serviciosofertadoscantera(){

    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Cantera')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.cantera.serviciocanteraofertados', compact('producto','banner'));
}

public function serviciosadquirircantera(){

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.cantera.serviciocanteraadquirir', compact('banner'));
}

public function serviciocontactocantera(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Cantera')
                ->get();
    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.cantera.serviciocanteracontacto', compact('encargado', 'banner'));
}

//servicentro Restaurant
public function serviciosprincipalrestaurante(){

    $subservicio= DB::table('servicios as s')
                ->select('s.nom_servicio','s.descripcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Restaurante')
                ->get();
    
    $funciones= DB::table('servicios as s')
                ->select('s.funciones as funcion')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Servicentro')
                ->get();
    
    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciosprincipalrestaurante',compact('subservicio','banner','funciones'));
}

public function serviciosofertadosrestaurante(){
    
    $producto= DB::table('servicios as s')
                ->join('productos as p','p.servicios_id','=','s.id')
                ->join('imagenes as i','p.imagenes_id','=','i.id')
                ->select('p.producto','p.descripcion','i.url_imagen','p.id')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','=','Restaurante')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciosofertadosrestaurante', compact('producto','banner'));
}

public function serviciosadquirirrestaurante(){

    $banner= DB::table('baner_pestanias')
                        ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                        ->where('baner_pestanias.activo', '=', '1')
                        ->where('estado','servicio')
                        ->get();

    return view('web.servicentro.serviciosadquirirrestaurante', compact('banner'));
}

public function serviciocontactorestaurante(){

    $encargado= DB::table('servicios as s')
                ->join('encargado as e','e.id','=','s.encargado_id')
                ->join('persona as p','p.id','=','e.persona_id')
                ->join('imagenes as i','i.id','=','e.imagenes_id')
                ->select('p.nombre', 'p.apell_pat', 'p.apell_mat', 'p.email', 'p.telefono','e.fecha_inicio', 'e.fecha_fin', 'i.url_imagen')
                ->where('e.activo', '=', '1')
                ->where('s.estado', '=', '1')
                ->where('s.nom_servicio','Restaurante')
                ->get();

    $banner= DB::table('baner_pestanias')
                ->join('imagenes as i','i.id','baner_pestanias.imagenes_id','i.url_imagen')
                ->where('baner_pestanias.activo', '=', '1')
                ->where('estado','servicio')
                ->get();

    return view('web.servicentro.serviciocontactorestaurante', compact('banner','encargado'));
}
}
