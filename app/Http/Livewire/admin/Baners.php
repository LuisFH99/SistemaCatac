<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Baner;
use App\Models\Imagenes;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Resena;

class Baners extends Component
{
    use WithFileUploads;
    public $titulo,$subtitulo,$imgbaner,$ubicacion;
    public $baner_id=0;
    protected $listeners = ['EliminarBaner'];

    protected $rules=[
        'titulo' => 'required',
        'subtitulo' => 'required',
        'ubicacion' => 'required',
    ];
    protected $rulesImg=[
        'imgbaner'=>'required|mimes:jpg,jpeg,png|max:4096',
    ];
    protected $msjError=[
        
        'titulo.required'=>'El campo Titulo es obligatorio',
        'subtitulo.required'=>'El campo SubTitulo es obligatorio',
        'ubicacion.required'=>'El campo Ubicacion es obligatorio',
        'imgbaner.required'=>'La imagen es obligatorio',
        'imgbaner.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imgbaner.max'=>'El tamaño maximo es de 3.5 MB'
    ];

    public function render()
    {
        $baners=Baner::where('borrado',0)->orderBy('activo','desc')->orderBy('estado')->get();
        return view('livewire.baner.view',compact('baners'));
    }

    public function limpiar()
    {
        $this->titulo=null;
        $this->subtitulo=null;
        $this->ubicacion=null;
        $this->baner_id=0;
    }

    public function GrabarImagen(){
        $archivo=$this->imgbaner->store('public/imagenes');
        $url = Storage::url($archivo);
        $img=Imagenes::create([
            'url_imagen' => $url,
        ]);
    }

    public function Guardar(){
        $objto=new Resena();
        if($this->baner_id==0){
            $this->validate($this->rules,$this->msjError);
            $this->validate($this->rulesImg,$this->msjError);
            $this->GrabarImagen();
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
            Baner::where('activo', 1)->where('estado',$this->ubicacion)->update(['activo' => 0]);
            $creado = Baner::create([
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
                'estado' => $this->ubicacion,
                'activo' => 1,
                'borrado'=> 0,
                'imagenes_id'=>$idimg->id
            ]);
        }else{
            $this->validate($this->rules,$this->msjError);
            if(is_null($this->imgbaner)){
                $baner=Baner::findOrFail($this->baner_id);
                $creado=$baner->update([
                    'titulo' => $this->titulo,
                    'subtitulo' => $this->subtitulo,
                    'estado' => $this->ubicacion,
                ]);
            }else{
                $this->validate($this->rules,$this->msjError);
                $this->validate($this->rulesImg,$this->msjError);
                $this->GrabarImagen();
                $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
                $baner=Baner::findOrFail($this->baner_id);
                $oldid=$baner->imagenes_id;
                $creado=$baner->update([
                    'titulo' => $this->titulo,
                    'subtitulo' => $this->subtitulo,
                    'estado' => $this->ubicacion,
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
        $this->emit('alertaBaner', $datos);
        
    }
    public function Seleccionar($id){
        $baner=Baner::findOrFail($id);
        $this->titulo=$baner->titulo;
        $this->subtitulo=$baner->subtitulo;
        $this->ubicacion=$baner->estado;
        $this->baner_id=$baner->id;
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Datos del seleccionados.'
        ];
        $this->emit('alertaBaner', $datos);
    }

    public function CambiarVisibilidadMision($id){
        $datobaner=Baner::findOrFail($id);
        if($datobaner->activo==0){
            Baner::where('activo', 1)->where('estado',$datobaner->estado)->update(['activo' => 0]);
            $datobaner->update([
                'activo' => 1
            ]);
        }else{
            $datobaner->update([
                'activo' => 0
            ]);
            $datos2 = [
                'modo' => 'bg-warning',
                'mensaje' => 'Ningun baner visible para '.$datobaner->estado
            ];
            $this->emit('alertaBaner', $datos2); 
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del baner'
        ];
        $this->emit('alertaBaner', $datos);
    }
    
    public function EliminarBaner($id){
        $objto=new Resena();
        $baner=Baner::findOrFail($id);
        $idimg=$baner->imagenes_id;
        $deleted=$baner->update([
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
        $this->emit('alertaBaner', $datos);
    }

}
