<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Objetivos;
use App\Models\TipoObjetivo;
use App\Models\Imagenes;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Resena;

class Objetivo extends Component
{
    use WithFileUploads;
    public $descripcion,$subitem,$tipo,$imgobjetivo,$posicion=1;
    public $objetivo_id=0, $objetivopadre=0;
    public $vermodal=false;
    protected $listeners = ['EliminarObjetivo'];

    protected $rules=[
        'descripcion' => 'required',
        'tipo' => 'required',
        'posicion' => 'required',
    ];
    protected $rulesSubitem=[
        'subitem' => 'required',
    ];
    protected $rulesImg=[
        'imgobjetivo'=>'required|mimes:jpg,jpeg,png|max:4096',
    ];
    protected $msjError=[
        'descripcion.required'=>'El campo descripcion es obligatorio',
        'subitem.required'=>'El campo subitem es obligatorio',
        'tipo.required'=>'El campo Tipo de Objetivo es obligatorio',
        'posicion.required'=>'El campo posicion es obligatorio',
        'imgobjetivo.required'=>'La imagen es obligatorio',
        'imgobjetivo.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imgobjetivo.max'=>'El tamaño maximo es de 3.5 MB'
    ];

    public function render()
    {
        $tipos=TipoObjetivo::select('id','tipo')->get();
        $objetivos=Objetivos::where('borrado',0)->orderBy('activo','desc')->get();
        return view('livewire.objetivo.view',compact('objetivos','tipos'));
    }

    public function limpiar(){
        $this->descripcion=null;
        $this->tipo=null;
        $this->subitem=null;
        $this->posicion=1;
        $this->objetivo_id=0;
    }

    public function GrabarImagen(){
        $archivo=$this->imgobjetivo->store('public/imagenes');
        $url = Storage::url($archivo);
        $img=Imagenes::create([
            'url_imagen' => $url,
        ]);
    }

    public function MostrarModal($id){
        $this->vermodal = true;
        $this->objetivo_id=$id;
    }

    public function Guardar(){
        $objto=new Resena();
        if($this->objetivo_id==0){
            $this->validate($this->rules,$this->msjError); 
            $this->validate($this->rulesImg,$this->msjError);
            $this->GrabarImagen();
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
            $creado = Objetivos::create([
                'objetivo' => $this->descripcion,
                'posicion' => $this->posicion,
                'activo' => 1,
                'borrado'=> 0,
                'imagenes_id'=>$idimg->id,
                'tipo_objetivo_id'=>$this->tipo,
            ]);
        }else{
            $this->validate($this->rules,$this->msjError);
            if(is_null($this->imgobjetivo)){
                $objetivo=Objetivos::findOrFail($this->objetivo_id);
                $creado=$objetivo->update([
                    'objetivo'=>$this->descripcion,
                    'posicion'=>$this->posicion,
                    'tipo_objetivo_id'=>$this->tipo,
                ]);
            } else{
                $this->validate($this->rulesImg,$this->msjError);
                $this->GrabarImagen();
                $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
                $objetivo=Objetivos::findOrFail($this->objetivo_id);
                $oldid=$objetivo->imagenes_id;
                $creado=$objetivo->update([
                    'objetivo'=>$this->descripcion,
                    'posicion'=>$this->posicion,
                    'imagenes_id'=>$idimg->id,
                    'tipo_objetivo_id'=>$this->tipo,
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
        $this->emit('alertaObjetivo', $datos);
    }

    public function Cancelar(){
        $this->vermodal = false;
        $this->objetivo_id=0;
        $this->subitem=null;
    }

    public function Seleccionar($id){
        $dto=Objetivos::findOrFail($id);
        $this->descripcion=$dto->objetivo;
        $this->posicion=$dto->posicion;
        $this->tipo=$dto->tipo_objetivo_id;
        $this->objetivo_id=$dto->id;
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Datos del seleccionados.'
        ];
        $this->emit('alertaObjetivo', $datos);
    }

    public function AgregarSubitem(){
        $this->validate($this->rulesSubitem,$this->msjError);
        if($this->objetivopadre==0){
            $creado = Objetivos::create([
                'objetivo' => $this->subitem,
                'posicion' => 1,
                'activo' => 1,
                'borrado'=> 0,
                'objetivos_id'=>$this->objetivo_id,
            ]);
        }else{
            $subitem=Objetivos::findOrFail($this->objetivo_id);
            $creado=$subitem->update([
                'objetivo' => $this->subitem,
            ]);
        }
        
        if (isset($creado)) {
            $datos = [
                'modo' => 'bg-success',
                'mensaje' => 'Registro creado satisfactoriamente.'
            ];
            $this->Cancelar();
        } else {
            $datos = [
                'modo' => 'bg-danger',
                'mensaje' => 'Error! No se creó el registro.'
            ];
        }
        $this->emit('alertaObjetivo', $datos);
    }

    public function QuitarSubitem($idsubitem){
        $subitem=Objetivos::findOrFail($idsubitem);
        $deleted=$subitem->update([
            'borrado' => 1,
        ]);
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
        $this->emit('alertaObjetivo', $datos);
    }

    public function SeleccionarSubitem($idsubitem){
        $dto=Objetivos::findOrFail($idsubitem);
        $this->subitem=$dto->objetivo;
        $this->objetivopadre=$dto->objetivos_id;
        $this->MostrarModal($idsubitem);
    }

    public function EliminarObjetivo($id){
        $objto=new Resena();
        Objetivos::where('objetivos_id',$id)->update(['borrado'=> 1]);
        $objetivo=Objetivos::findOrFail($id);
        $idimg=$objetivo->imagenes_id;
        $deleted=$objetivo->update([
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
        $this->emit('alertaObjetivo', $datos);
    }
}
