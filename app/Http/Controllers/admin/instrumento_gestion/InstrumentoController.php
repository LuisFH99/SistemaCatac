<?php

namespace App\Http\Controllers\admin\instrumento_gestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use App\Models\InstrumentosGestion;
use App\Models\Modificatorias;
use App\Models\TipoInstrumento;

class InstrumentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.instrumento_de_gestion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposInstrumentos=TipoInstrumento::where('activo','1')->where('borrado',0)->pluck('tipo','id');
        return view('admin.instrumento_de_gestion.create', compact('tiposInstrumentos'));
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
            'tipo'           => 'required',
            'fecha'   => 'required|date',
            'filePath'      => 'required',
        ]);
        $instrumento=InstrumentosGestion::where('tipo_instrumento_id',$request->tipo)->first();
        //File
        $url_pdf="";
        if($file = $request->file('filePath')) {
            $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
            $file->move('images/instrumentos', $name);
            $url_pdf = 'images/instrumentos/'.$name;
        }
        $modificatoria=Modificatorias::create([
            'url_doc'       =>$url_pdf,
            'fecha'         =>$request->fecha,
            'activo'        =>1,
            'borrado'       =>0,
            'instrumentos_gestion_id'=>$instrumento->id,
        ]);
        if ($modificatoria instanceof Model) {
            toastr()->success('Modificatoria registrada correctamente!');
            return redirect()->route('instrumento_de_gestion.index');
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
        $tiposInstrumentos=TipoInstrumento::where('activo','1')->where('borrado',0)->pluck('tipo','id');
        $instrumento=InstrumentosGestion::where('id',$id)->first();
        return view('admin.instrumento_de_gestion.edit', compact('instrumento','tiposInstrumentos'));
    }
    public function edit1($id)
    {
        $tiposInstrumentos=TipoInstrumento::where('activo','1')->where('borrado',0)->pluck('tipo','id');
        $modificatoria=Modificatorias::where('id',$id)->first();
        $instrumento=InstrumentosGestion::where('id',$modificatoria->instrumentos_gestion_id)->first();
        return view('admin.instrumento_de_gestion.edit1', compact('tiposInstrumentos','modificatoria','instrumento'));
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
        if ($request->bdr==1){
            $request->validate([
                'tipo'          => 'required',
                'descripcion'   => 'required',
                'filePath'      => 'required',
            ]);
            $instrumentos=InstrumentosGestion::where('id', $id)->first();
            //File
            $url_pdf="";
            if($file = $request->file('filePath')) {
                $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
                $file->move('images/instrumentos', $name);
                unlink($instrumentos->url_documento);
                $url_pdf = 'images/instrumentos/'.$name;
            }
            $instrumento=InstrumentosGestion::where('id', $id)->update(array(
                'descripcion'   =>$request->descripcion,
                'url_documento'      =>$url_pdf,
                'tipo_instrumento_id'     =>$request->tipo,
            ));
            if ($instrumento==1) {
                toastr()->success('Instrumento editado correctamente!');
                return redirect()->route('instrumento_de_gestion.index');
            }
        }

        if ($request->bdr==2){
            $request->validate([
                'tipo'      => 'required',
                'fecha'     => 'required|date',
                'filePath'  => 'required',
            ]);
            $tiposInstrumentos=TipoInstrumento::where('id',$request->tipo)->first();
            $instrumento=InstrumentosGestion::where('tipo_instrumento_id',$tiposInstrumentos->id)->first();
            $modificatorias=Modificatorias::where('id', $id)->first();
            //File
            $url_pdf="";
            if($file = $request->file('filePath')) {
                $name = date('d-m-Y_H-i-s') . '_' . $file->getClientOriginalName();
                $file->move('images/instrumentos', $name);
                unlink($modificatorias->url_doc);
                $url_pdf = 'images/instrumentos/'.$name;
            }
            $modificatoria=Modificatorias::where('id', $id)->update(array(
                'fecha'   =>$request->fecha,
                'url_doc' =>$url_pdf,
                'instrumentos_gestion_id' =>$instrumento->id,
            ));
            if ($modificatoria==1) {
                toastr()->success('Modificatoria editada correctamente!');
                return redirect()->route('instrumento_de_gestion.index');
            }
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
        $modificatoria=Modificatorias::where('id', $id)->update(array(
            'activo'  => 0,
            'borrado' => 1,
        ));
        if ($modificatoria==1) {
            toastr()->info('Modificatoria eliminada correctamente!');
            return redirect()->route('instrumento_de_gestion.index');
        }
        toastr()->error('Ha ocurrido un error, por favor inténtelo nuevamente.');
        return back();
    }
}
