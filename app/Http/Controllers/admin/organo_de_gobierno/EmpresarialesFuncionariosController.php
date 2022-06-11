<?php

namespace App\Http\Controllers\admin\organo_de_gobierno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrganoGobierno;
use App\Models\SubOrganosGobierno;
use App\Models\Comuneros;
use App\Models\Persona;
use App\Models\Cargo;
use App\Models\Funcionarios;
use App\Models\Imagenes;

class EmpresarialesFuncionariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $directiva=SubOrganosGobierno::where('nombre','Actividades Empresariales')->first();
        return view('admin.organos_de_gobierno.linea.actividades.empresariales.index',compact('directiva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos=Cargo::where('activo','1')->where('borrado',0)->pluck('cargo','id');
        return view('admin.organos_de_gobierno.linea.actividades.empresariales.create', compact('cargos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'DNI'       => 'required|min:00000000|max:99999999|unique:persona,DNI',
            'apell_pat' => 'required',
            'nombre'    => 'required',
            'telefono'  => 'required|integer||min:000000000|max:999999999',
            'email'     => 'required|email|unique:persona,email',
            'fech_inicio'   => 'required|date',
            'fech_fin'      => 'required|date',
            'cargo'        => 'required',
            'perfil'        => 'required',
            'path'          => 'required',
            'filePath'      => 'required',
        ]);
        $directiva=SubOrganosGobierno::where('nombre','Actividades Empresariales')->first();
        $persona=Persona::create([
            'DNI'       => $request->DNI,
            'apell_pat' => $request->apell_pat,
            'apell_mat' => $request->apell_mat,
            'nombre'    => $request->nombre,
            'telefono'  => $request->telefono,
            'email'     => $request->email,
            'activo'    => 1,
            'borrado'   => 0,
        ]);
        $idp=Persona::orderBy('id','DESC')->first();
        //Image
        if($file = $request->file('path')) {
            $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
            $file->move('img/funcionarios', $name);
            $image = Imagenes::create([
                'url_imagen'=>'img/funcionarios/'.$name, 
                'activo'    =>1, 
                'borrado'   =>0,
            ]);
        }
        //File
        $url_pdf="";
        if($file = $request->file('filePath')) {
            $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
            $file->move('images/directorios', $name);
            $url_pdf = 'images/directorios/'.$name;
        }
        $imagen=Imagenes::orderBy('id','DESC')->first();
        $funcionario=Funcionarios::create([
            'perfil'        =>$request->perfil,
            'fech_inicio'   =>$request->fech_inicio,
            'fech_fin'      =>$request->fech_fin,
            'profesion'     =>$request->profesion,
            'url_cv'        =>$url_pdf,
            'estado'        =>1,
            'borrado'       =>0,
            'imagenes_id'   =>$imagen->id,
            'persona_id'    =>$idp->id,
            'cargo_id'      =>$request->cargo,
            'sub_organos_gobierno_id'=>$directiva->id,
        ]);
        if ($funcionario instanceof Model && $image instanceof Model) {
            toastr()->success('Funcionario registrado correctamente!');
            return redirect()->route('empresarial.index');
        }
        toastr()->error('Ha ocurrido un error, por favor inténtelo nuevamente.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('admin.organos_de_gobierno.direccion.asamblea_general.show', compact('sft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario=Funcionarios::join('persona', 'funcionarios.persona_id', '=', 'persona.id')
                                    ->join('imagenes', 'funcionarios.imagenes_id', '=', 'imagenes.id')
                                    ->join('cargo', 'funcionarios.cargo_id', '=', 'cargo.id')
                                    ->select('persona.*','imagenes.url_imagen','funcionarios.perfil',
                                            'funcionarios.fech_inicio','funcionarios.fech_fin','funcionarios.profesion',
                                            'funcionarios.url_cv','funcionarios.estado as activos','cargo.id as cargo')
                                    ->where('funcionarios.borrado',0)->where('persona.id',$id)->first();
        $cargos=Cargo::where('activo','1')->where('borrado',0)->pluck('cargo','id');
        return view('admin.organos_de_gobierno.linea.actividades.empresariales.edit', compact('funcionario','cargos'));
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
        $request->validate([
            'DNI'       => 'required|min:00000000|max:99999999|unique:persona,DNI,'.$id,
            'apell_pat' => 'required',
            'nombre'    => 'required',
            'telefono'  => 'required|integer||min:000000000|max:999999999',
            'email'     => 'required|email|unique:persona,email,'.$id,
            'fech_inicio'   => 'required|date',
            'fech_fin'      => 'required|date',
            'cargo'        => 'required',
            'perfil'        => 'required',
        ]);
        $persona=Persona::where('id', $id)->update(array(
            'DNI'       => $request->DNI,
            'apell_pat' => $request->apell_pat,
            'apell_mat' => $request->apell_mat,
            'nombre'    => $request->nombre,
            'telefono'  => $request->telefono,
            'email'     => $request->email,
        ));
        $idF=Funcionarios::where('persona_id',$id)->first();
        $idIm=Imagenes::where('id',$idF->imagenes_id)->first();
        //File
        $url_pdf="";
        if($file = $request->file('filePath')) {
            $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
            $file->move('images/directorios', $name);
            unlink($idF->url_cv);
            $url_pdf = 'images/directorios/'.$name;
            $funcionario=Funcionarios::where('id', $idF->id)->update(array(
                'url_cv'        =>$url_pdf,
            ));
        }
        //Image
        $image=0;
        $images=Imagenes::where('id', $idF->imagenes_id)->first();
        if($file = $request->file('path')) {
            $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
            $file->move('img/funcionarios', $name);
            unlink($idIm->url_imagen);
            $image = Imagenes::where('id', $idF->imagenes_id)->update(array(
                'url_imagen'=>'img/funcionarios/'.$name, 
            ));
        }
        $funcionario=Funcionarios::where('id', $idF->id)->update(array(
            'perfil'        =>$request->perfil,
            'fech_inicio'   =>$request->fech_inicio,
            'fech_fin'      =>$request->fech_fin,
            'profesion'     =>$request->profesion,
            'estado'        =>1,
            'borrado'       =>0,
            'imagenes_id'   =>$idF->imagenes_id,
            'persona_id'    =>$id,
            'cargo_id'      =>$request->cargo,
            'sub_organos_gobierno_id'=>$idF->sub_organos_gobierno_id,
        ));
        if ($persona==1 || $funcionario==1 || $image==1) {
            toastr()->success('Funcionario editado correctamente!');
            return redirect()->route('empresarial.index');
        }
        toastr()->error('Ha ocurrido un error, por favor inténtelo nuevamente.');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona=Persona::where('id', $id)->update(array(
            'activo'  => 0,
            'borrado' => 1,
        ));
        $idc=Funcionarios::where('persona_id',$id)->first();
        $comunero=Funcionarios::where('id', $idc->id)->update(array(
            'estado'  => 0,
            'borrado' => 1,
        ));
        if ($persona==1 && $comunero==1) {
            toastr()->info('Funcionario eliminado correctamente!');
            return redirect()->route('empresarial.index');
        }
        toastr()->error('Ha ocurrido un error, por favor inténtelo nuevamente.');
        return back();
    }

    public function habilitar(Request $request)
    {
        $funcionario=Funcionarios::where('persona_id', $request->id)->update(array(
            'estado'    =>($request->bdr==1)?0:1
        ));
        $mensaje='Error!';
        if ($funcionario==1) {
            $mensaje='El Funcionario ha sido '.(($request->bdr==1)?'deshabilitado':'habilitado').' ';
        }
        return $mensaje;
    }
}
