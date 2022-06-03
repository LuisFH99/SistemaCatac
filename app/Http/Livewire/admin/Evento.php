<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Eventos;
use App\Models\Imagenes;
use Illuminate\Support\Facades\DB;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Resena;

class Evento extends Component
{
    use WithFileUploads;
    public $titulo,$descripcion,$imgevento;
    public $evento_id=0;
    protected $listeners = ['EliminarEvento'];

    protected $rules=[
        'titulo' => 'required',
        'descripcion' => 'required',
    ];
    protected $rulesImg=[
        'imgevento'=>'required|mimes:jpg,jpeg,png|max:4096',
    ];
    protected $msjError=[
        'titulo.required'=>'El campo Titulo es obligatorio',
        'descripcion.required'=>'El campo descripcion es obligatorio',
        'imgevento.required'=>'La imagen es obligatorio',
        'imgevento.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imgevento.max'=>'El tamaño maximo es de 3.5 MB'
    ];

    public function render()
    {
        $eventos=Eventos::where('borrado',0)->orderBy('activo','desc')->orderBy('fecha','desc')->orderBy('hora','desc')->get();
        
        return view('livewire.evento.view',compact('eventos'));
    }

    public function limpiar()
    {
        $this->titulo=null;
        $this->descripcion=null;
        $this->imgevento=null;
        $this->evento_id=0;
    }

    public function GrabarImagen(){
        $archivo=$this->imgevento->store('public/imagenes');
        $url = Storage::url($archivo);
        $img=Imagenes::create([
            'url_imagen' => $url,
        ]);
    }

    public function Guardar(){
        $objto=new Resena();
        $datossave=DB::select('select curdate() as fecha, curtime() as hora');
        if($this->evento_id==0){
            $this->validate($this->rules,$this->msjError);
            $this->validate($this->rulesImg,$this->msjError);
            $this->GrabarImagen();
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
            $creado = Eventos::create([
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
            if(is_null($this->imgevento)){
                $evento=Eventos::findOrFail($this->evento_id);
                $creado=$evento->update([
                    'titulo' => $this->titulo,
                    'descripcion' => $this->descripcion,
                ]);
            }else{
                $this->validate($this->rules,$this->msjError);
                $this->validate($this->rulesImg,$this->msjError);
                $this->GrabarImagen();
                $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
                $evento=Eventos::findOrFail($this->evento_id);
                $oldid=$evento->imagenes_id;
                $creado=$evento->update([
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
        $this->emit('alertaEvento', $datos); 
    }

    public function CambiarVisibilidad($id){
        $datoevento=Eventos::findOrFail($id);
        if($datoevento->activo==0){
            $datoevento->update([
                'activo' => 1
            ]);
        }else{
            $datoevento->update([
                'activo' => 0
            ]);
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del baner'
        ];
        $this->emit('alertaEvento', $datos);
    }

    public function Seleccionar($id){
        $evento=Eventos::findOrFail($id);
        $this->titulo=$evento->titulo;
        $this->descripcion=$evento->descripcion;
        $this->evento_id=$evento->id;
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Datos del seleccionados.'
        ];
        $this->emit('alertaEvento', $datos);
    }

    public function EliminarEvento($id){
        $objto=new Resena();
        $evento=Eventos::findOrFail($id);
        $idimg=$evento->imagenes_id;
        $deleted=$evento->update([
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
        $this->emit('alertaEvento', $datos);
    }
}
