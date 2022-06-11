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
use App\Models\Imagenes;

class AsambleaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $asamblea=SubOrganosGobierno::where('nombre','Asamblea General')->first();
        return view('admin.organos_de_gobierno.direccion.asamblea_general.index',compact('asamblea'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.organos_de_gobierno.direccion.asamblea_general.create'/*, compact('tipos','periodos')*/);
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
            'codigo'    => 'required',
            'path'    => 'required',
        ]);
        
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
            $file->move('img/comuneros', $name);
            $image = Imagenes::create([
                'url_imagen'=>'img/comuneros/'.$name, 
                'activo'    =>1, 
                'borrado'   =>0,
            ]);
        }
        $imagen=Imagenes::orderBy('id','DESC')->first();
        $comunero=Comuneros::create([
            'codigo'            =>$request->codigo,
            'activo'            =>1,
            'borrado'           =>0,
            'persona_id'        =>$idp->id,
            'imagenes_id'        =>$imagen->id,
        ]);
        if ($persona instanceof Model && $comunero instanceof Model) {
            toastr()->success('Comunero registrado correctamente!');
            return redirect()->route('asamblea_general.index');
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
        $comunero=Comuneros::join('persona', 'comuneros.persona_id', '=', 'persona.id')
                    ->select('persona.*','comuneros.codigo','comuneros.activo as activos')
                    ->where('comuneros.id',$id)->first();
        return view('admin.organos_de_gobierno.direccion.asamblea_general.edit', compact('comunero'));
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
            'codigo'    => 'required',
            'path'    => 'required',
        ]);
        $persona=Persona::where('id', $id)->update(array(
            'DNI'       => $request->DNI,
            'apell_pat' => $request->apell_pat,
            'apell_mat' => $request->apell_mat,
            'nombre'    => $request->nombre,
            'telefono'  => $request->telefono,
            'email'     => $request->email,
        ));
        $idc=Comuneros::where('persona_id',$id)->first();
        $imag=Imagenes::where('id',$idc->imagenes_id)->first();
        $comunero=Comuneros::where('id', $idc->id)->update(array(
            'codigo'    => $request->codigo,
        ));
        //Image
        $image=0;
        $images=Imagenes::where('id', $idc->imagenes_id)->first();
        if($file = $request->file('path')) {
            $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
            $file->move('img/funcionarios', $name);
            unlink($imag->url_imagen);
            $image = Imagenes::where('id', $idc->imagenes_id)->update(array(
                'url_imagen'=>'img/funcionarios/'.$name, 
            ));
        }
        if ($persona==1 || $comunero==1 || $image==1) {
            toastr()->success('Comunero editado correctamente!');
            return redirect()->route('asamblea_general.index');
        }
        toastr()->error('Ha ocurrido un error, por favor inténtelo nuevamente.');
        return back();
    }
    public function updateAsamblea(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);
        $asamblea=SubOrganosGobierno::where('id', $id)->update(array(
            'descripcion'=>$request->descripcion
        ));
        if ($asamblea == 1) {
            toastr()->success('Descripcion editada correctamente!');
            return redirect()->route('asamblea_general.index');
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
        $idc=Comuneros::where('persona_id',$id)->first();
        $comunero=Comuneros::where('id', $idc->id)->update(array(
            'activo'  => 0,
            'borrado' => 1,
        ));
        if ($persona==1 && $comunero==1) {
            toastr()->info('Comunero eliminado correctamente!');
            return redirect()->route('asamblea_general.index');
        }
        toastr()->error('Ha ocurrido un error, por favor inténtelo nuevamente.');
        return back();
    }
    public function habilitar(Request $request)
    {
        $comuneros=Comuneros::where('id', $request->id)->update(array(
            'activo'    =>($request->bdr==1)?0:1
        ));
        $mensaje='El  Comunero ha sido '.(($request->bdr==1)?'deshabilitado':'habilitado').' ';
        return $mensaje;
    }
}
