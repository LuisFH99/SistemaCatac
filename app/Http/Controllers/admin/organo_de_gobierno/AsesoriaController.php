<?php

namespace App\Http\Controllers\admin\organo_de_gobierno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrganoGobierno;
use App\Models\SubOrganosGobierno;

class AsesoriaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $directiva=SubOrganosGobierno::where('nombre','Órganos de Asesoria')->first();
        return view('admin.organos_de_gobierno.apoyo_asesoria.asesoria.index',compact('directiva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organos_de_gobierno.apoyo_asesoria.asesoria.createAsesoria');
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
            'nombre'     => 'required',
            'descripcion'=> 'required',
        ]);
        $directiva=SubOrganosGobierno::where('nombre','Órganos de Asesoria')->first();
        $subOrgano=SubOrganosGobierno::create([
            'nombre'     => $request->nombre, 
            'descripcion'=> $request->descripcion, 
            'activo'     => 1, 
            'borrado'    => 0, 
            'organo_gobierno_id'     => $directiva->organo_gobierno_id, 
            'sub_organos_gobierno_id'=> $directiva->id,
        ]);
        
        if ($subOrgano instanceof Model) {
            toastr()->success('Órgano de Asesoria registrado correctamente!');
            return redirect()->route('asesoria.index');
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
        $subOrgano=SubOrganosGobierno::where('id',$id)->first();
        return view('admin.organos_de_gobierno.apoyo_asesoria.asesoria.editAsesoria', compact('subOrgano'));
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
            'nombre'     => 'required',
            'descripcion'=> 'required',
        ]);
        $subOrgano=SubOrganosGobierno::where('id', $id)->update(array(
            'nombre'       => $request->nombre,
            'descripcion' => $request->descripcion,
        ));
        if ($subOrgano==1) {
            toastr()->success('Órgano de Asesoria editado correctamente!');
            return redirect()->route('asesoria.index');
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
        $subOrgano=SubOrganosGobierno::where('id', $id)->update(array(
            'activo'  => 0,
            'borrado' => 1,
        ));
        
        if ($subOrgano==1) {
            toastr()->info('Órgano de Asesoria eliminado correctamente!');
            return redirect()->route('asesoria.index');
        }
        toastr()->error('Ha ocurrido un error, por favor inténtelo nuevamente.');
        return back();
    }

    public function habilitar(Request $request)
    {
        $subOrgano=SubOrganosGobierno::where('id', $request->id)->update(array(
            'estado'    =>($request->bdr==1)?0:1
        ));
        $mensaje='Error!';
        if ($funcionario==1) {
            $mensaje='El Funcionario ha sido '.(($request->bdr==1)?'deshabilitado':'habilitado').' ';
        }
        return $mensaje;
    }
}
