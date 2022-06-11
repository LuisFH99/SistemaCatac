<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Comunicados;
use App\Models\Imagenes;
use Illuminate\Support\Facades\DB;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Resena;

class Comunicado extends Component
{
    use WithFileUploads;
    public $titulo,$descripcion,$imgcomunicado;
    public $comunicado_id=0;
    protected $listeners = ['EliminarComunicado'];

    protected $rules=[
        'titulo' => 'required',
        'descripcion' => 'required',
    ];
    protected $rulesImg=[
        'imgcomunicado'=>'required|mimes:jpg,jpeg,png|max:4096',
    ];
    protected $msjError=[
        'titulo.required'=>'El campo Titulo es obligatorio',
        'descripcion.required'=>'El campo SubTitulo es obligatorio',
        'imgcomunicado.required'=>'La imagen es obligatorio',
        'imgcomunicado.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imgcomunicado.max'=>'El tamaño maximo es de 3.5 MB'
    ];

    public function render()
    {
        $comunicados=Comunicados::where('borrado',0)->orderBy('activo','desc')->orderBy('fecha','desc')->orderBy('hora','desc')->get();
        
        return view('livewire.comunicado.view',compact('comunicados'));
    }

    public function limpiar()
    {
        $this->titulo=null;
        $this->descripcion=null;
        $this->comunicado_id=0;
    }

    public function GrabarImagen(){
        $archivo=$this->imgcomunicado->store('public/imagenes');
        $url = Storage::url($archivo);
        $img=Imagenes::create([
            'url_imagen' => $url,
        ]);
    }

    public function Guardar(){
        $objto=new Resena();
        $datossave=DB::select('select curdate() as fecha, curtime() as hora');
        if($this->comunicado_id==0){
            $this->validate($this->rules,$this->msjError);
            $this->validate($this->rulesImg,$this->msjError);
            $this->GrabarImagen();
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
            $creado = Comunicados::create([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'fecha' => $datossave[0]->fecha,
                'hora' => $datossave[0]->hora,
                'activo' => 1,
                'borrado'=> 0,
                'imagenes_id'=>$idimg->id
            ]);
        }else{
            $this->validate($this->rules,$this->msjError);
            if(is_null($this->imgcomunicado)){
                $comunicado=Comunicados::findOrFail($this->comunicado_id);
                $creado=$comunicado->update([
                    'titulo' => $this->titulo,
                    'descripcion' => $this->descripcion,
                ]);
            }else{
                $this->validate($this->rules,$this->msjError);
                $this->validate($this->rulesImg,$this->msjError);
                $this->GrabarImagen();
                $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
                $comunicado=Comunicados::findOrFail($this->comunicado_id);
                $oldid=$comunicado->imagenes_id;
                $creado=$comunicado->update([
                    'titulo' => $this->titulo,
                    'descripcion' => $this->descripcion,
                    'imagenes_id'=>$idimg->id
                ]);
                $objto->EliminarImg($oldid);
            }
        }

        if (isset($creado)) {
            $datos = [
                'modo' => 'bg-success',
                'mensaje' => 'Registro creado satisfactoriamente.'
            ];
            $this->limpiar();
        } else {
            $datos = [
                'modo' => 'bg-danger',
                'mensaje' => 'Error! No se creó el registro.'
            ];
        }
        $this->emit('alertaComunicado', $datos); 
    }

    public function CambiarVisibilidad($id){
        $datocomunicado=Comunicados::findOrFail($id);
        if($datocomunicado->activo==0){
            $datocomunicado->update([
                'activo' => 1
            ]);
        }else{
            $datocomunicado->update([
                'activo' => 0
            ]);
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del baner'
        ];
        $this->emit('alertaComunicado', $datos);
    }

    public function Seleccionar($id){
        $comunicado=Comunicados::findOrFail($id);
        $this->titulo=$comunicado->titulo;
        $this->descripcion=$comunicado->descripcion;
        $this->comunicado_id=$comunicado->id;
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Datos del seleccionados.'
        ];
        $this->emit('alertaComunicado', $datos);
    }

    public function EliminarComunicado($id){
        $objto=new Resena();
        $comunicado=Comunicados::findOrFail($id);
        $idimg=$comunicado->imagenes_id;
        $deleted=$comunicado->update([
            'borrado' => 1,
            'imagenes_id'=>null
        ]);
        $objto->EliminarImg($idimg);
        if(isset($deleted)){
            $datos = [
                'modo' => 'bg-success',
                'mensaje' => 'El registro de eliminó de Sistema.',
            ];
        }else{
            $datos = [
                'modo' => 'bg-danger',
                'mensaje' => 'Error al intentar eliminar Regsitro',
            ]; 
        }
        $this->emit('alertaComunicado', $datos);
    }
}
