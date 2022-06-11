<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ResenaHistorica;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use App\Models\Imagenes;

class Resena extends Component
{
    use WithFileUploads;
    public $vermodal = false;
    public $resena_id=0;
    public $fromresena=true;
    public $titulo,$descripcion;
    public $imagenes=[];
    public $aux;
    protected $listeners = ['ElimnarResena'];

    protected $rulesResena=[
        'titulo'=>'required',
        'descripcion' => 'required',
        
    ];
    protected $rulesImgResena=[
        'imagenes.*'=>'required|mimes:jpg,jpeg,png|max:4096'
    ];
    protected $msjError=[
        'titulo.required'=>'El campo Titulo es obligatorio',
        'descripcion.required'=>'El campo Descripcion es obligatorio',
        'imagenes.*.required'=>'La imagenes son obligatorio',
        'imagenes.*.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imagenes.*.max'=>'El tamaño maximo es de 3.5 MB'
    ];

    public function EliminarImg($idimg){
        $ruta=str_replace('storage','public',Imagenes::where('id',$idimg)->value('url_imagen'));
        Storage::delete($ruta);
        $aux=Imagenes::destroy($idimg);
        return $aux;
    }

    public function render()
    {
        $resenas=ResenaHistorica::where('borrado',0)->orderBy('activo','desc')->get();
        return view('livewire.resena.view',compact('resenas'));
    }
    
    public function Limpiar(){
        $this->titulo=null;
        $this->descripcion=null;
        $this->resena_id=0;
    }

    public function MostrarModal(){
        $this->vermodal = true;
    }
    public function Cancelar()
    {
        $this->vermodal = false;
        $this->fromresena=true;
        $this->Limpiar();
    }
    public function GuardarResena(){
        $this->validate($this->rulesResena,$this->msjError);
        if($this->resena_id==0){
            ResenaHistorica::where('activo', 1)->update(['activo' => 0]);
            $creado = ResenaHistorica::create([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'posicion' => 1,
                'activo' => 1,
                'borrado'=> 0
            ]);
            
            if (isset($creado)) {
                $datos = [
                    'modo' => 'bg-success',
                    'mensaje' => 'Registro creada satisfactoriamente.'
                ];
                $this->limpiar();
                $this->vermodal = false;
            } else {
                $datos = [
                    'modo' => 'bg-danger',
                    'mensaje' => 'Error! No se creó el registro.'
                ];
            }
        }else{
            $resena = ResenaHistorica::findOrFail($this->resena_id);
            $resena->update([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion
            ]);
            $datos = [
                'modo' => 'bg-success',
                'mensaje' => '¡Edición realizada con exito !'
            ];
            $this->limpiar();
            $this->vermodal = false;
        }
        $this->emit('alertaResena', $datos);
    }

    public function SeleccionarResena($id){
        $dtoresena = ResenaHistorica::findOrFail($id);
        $this->resena_id=$dtoresena->id;
        $this->titulo=$dtoresena->titulo;
        $this->descripcion=$dtoresena->descripcion;
        $this->MostrarModal();
    }

    public function CambiarVisibilidad($id){
        $dtoresena = ResenaHistorica::find($id);
        if ($dtoresena->activo == 0) {
            ResenaHistorica::where('activo', 1)->update(['activo' => 0]);
            $dtoresena->update([
                'activo' => 1
            ]);
        } else {
            $dtoresena->update([
                'activo' => 0
            ]);
            
            $datos2 = [
                'modo' => 'bg-warning',
                'mensaje' => 'Ningun elemento de visible en la pagina web'
            ];
            $this->emit('alertaResena', $datos2); 
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del elemento'
        ];
        $this->emit('alertaResena', $datos);
        
    }

    public function FromImagenes($id){
        $dtoresena = ResenaHistorica::find($id);
        $this->resena_id=$dtoresena->id;
        $this->titulo=$dtoresena->titulo;
        $this->fromresena=false;
        $this->MostrarModal();
        
    }

    public function GuardarImagenes(){
        $this->validate($this->rulesImgResena,$this->msjError);
        foreach ($this->imagenes as $imagene) {
            $archivo=$imagene->store('public/imagenes');
            $url = Storage::url($archivo);
            $img=Imagenes::create([
                'url_imagen' => $url,
            ]);
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
            $reseña=ResenaHistorica::findOrFail($this->resena_id);
            $reseña->resenaimagenes()->attach($idimg);
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se insertó la imagenes de forma correcta.'
        ];
        $this->Cancelar();
        $this->emit('alertaResena', $datos);
    }

    public function QuitarImagen($idresena,$idimg){
        $reseña=ResenaHistorica::findOrFail($idresena);
        $aux=$reseña->resenaimagenes()->detach($idimg);
        if($this->EliminarImg($idimg) && $aux){
            $datos = [
                'modo' => 'bg-success',
                'mensaje' => 'La Imagen se quito de forma correcta.',
            ];
        }else{
            $datos = [
                'modo' => 'bg-danger',
                'mensaje' => 'Error al quitar imagen',
            ];
        }
        
        $this->emit('alertaResena', $datos);

    }
    public function ElimnarResena($id){
        $idimg=[];
        $resena=ResenaHistorica::findOrFail($id);
            foreach($resena->resenaimagenes as $imagen){
                $idimg[]=$imagen->id;
            }
        if(count($idimg)>0){
            $bdr=$resena->resenaimagenes()->detach();
            foreach($idimg as $item){
                $this->EliminarImg($item);
            }
            $deleted=$resena->update([
                'borrado' => 1
            ]);
            if($deleted && $bdr){
                $datos = [
                    'modo' => 'bg-success',
                    'mensaje' => 'El registro de quito de forma de Sistema.',
                ];
            }else{
                $datos = [
                    'modo' => 'bg-danger',
                    'mensaje' => 'Error al intentar eliminar Regsitro',
                ]; 
            }
        }else{
            $deleted=$resena->update([
                'borrado' => 1
            ]);
            if($deleted){
                $datos = [
                    'modo' => 'bg-success',
                    'mensaje' => 'El registro de quito de forma de Sistema.',
                ];
            }else{
                $datos = [
                    'modo' => 'bg-danger',
                    'mensaje' => 'Error al intentar eliminar Regsitro',
                ];
            }
        }
        $this->emit('alertaResena', $datos);
    }
}
