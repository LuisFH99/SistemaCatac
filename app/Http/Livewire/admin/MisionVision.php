<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use App\Models\Mision;
use App\Models\Vision;
use App\Models\Imagenes;


use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Resena;

class MisionVision extends Component
{
    use WithFileUploads;
    public $vermodal = false;
    public $fromvision=true;
    public $vision_id=0;
    public $mision_id=0;
    public $descvision,$imgvision,$posicion=1;
    protected $listeners = ['ElimnarComponente'];

    protected $rulesVision=[
        'descvision' => 'required',
    ];
    protected $rulesImg=[
        'imgvision'=>'required|mimes:jpg,jpeg,png|max:4096',
    ];
    protected $msjError=[
        
        'descvision.required'=>'El campo Descripcion es obligatorio',
        'imgvision.required'=>'La imagen es obligatorio',
        'imgvision.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imgvision.max'=>'El tamaño maximo es de 3.5 MB'
    ];

    public function render()
    {
        $misiones=Mision::where('borrado',0)->orderBy('activo','desc')->get();
        $visiones=Vision::where('borrado',0)->orderBy('activo','desc')->get();
        return view('livewire.misionvision.view',compact('misiones','visiones'));
    }

    public function limpiar(){
        $this->descvision=null;
        $this->imgvision=null;
        $this->fromvision=true;
        $this->vision_id=0;
        $this->mision_id=0;
        $this->posicion=1;
    }

    public function MostrarModal($aux){
        if($aux==2){
            $this->fromvision=false;
        }
        $this->vermodal = true;
        
    }
    public function Cancelar()
    {
        $this->vermodal = false;
        $this->fromvision=true;
        $this->limpiar();
        
    }

    public function GuardarInformacion($var){
        $objto=new Resena();
        if($this->vision_id==0 && $this->mision_id==0){
        
            $this->validate($this->rulesVision,$this->msjError);
            $this->validate($this->rulesImg,$this->msjError);
            $archivo=$this->imgvision->store('public/imagenes');
            $url = Storage::url($archivo);
            $img=Imagenes::create([
                'url_imagen' => $url,
            ]);
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();

            if($var==1){
                Vision::where('activo', 1)->update(['activo' => 0]);
                $creado = Vision::create([
                    'descripcion' => $this->descvision,
                    'posicion' => $this->posicion,
                    'activo' => 1,
                    'borrado'=> 0,
                    'imagenes_id'=>$idimg->id
                ]);
            
            }else{
                Mision::where('activo', 1)->update(['activo' => 0]);
                $creado = Mision::create([
                    'descripcion' => $this->descvision,
                    'posicion' => $this->posicion,
                    'activo' => 1,
                    'borrado'=> 0,
                    'imagenes_id'=>$idimg->id
                ]);
            }
        }elseif (($this->vision_id !=0) || ($this->mision_id !=0)) {
            $this->validate($this->rulesVision,$this->msjError);
            if(is_null($this->imgvision)){
                if($var==1){
                    $vision=Vision::findOrFail($this->vision_id);
                    $creado=$vision->update([
                        'descripcion' => $this->descvision,
                        'posicion' => $this->posicion
                    ]);
                }else{
                    $mision=Mision::findOrFail($this->mision_id);
                    $creado =$mision->update([
                        'descripcion' => $this->descvision,
                        'posicion' => $this->posicion
                    ]);
                }
            }else{
                $this->validate($this->rulesVision,$this->msjError);
                $this->validate($this->rulesImg,$this->msjError);
                $archivo=$this->imgvision->store('public/imagenes');
                $url = Storage::url($archivo);
                $img=Imagenes::create([
                    'url_imagen' => $url,
                ]);
                $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
                if($var==1){
                    $vision=Vision::findOrFail($this->vision_id);
                    $oldid=$vision->imagenes_id;
                    $creado =$vision->update([
                        'descripcion' => $this->descvision,
                        'posicion' => $this->posicion,
                        'imagenes_id'=>$idimg->id
                    ]);
                    $objto->EliminarImg($oldid);
                }else{
                    $mision=Mision::findOrFail($this->mision_id);
                    $oldid=$mision->imagenes_id;
                    $creado =$mision->update([
                        'descripcion' => $this->descvision,
                        'posicion' => $this->posicion,
                        'imagenes_id'=>$idimg->id
                    ]);
                    $objto->EliminarImg($oldid);
                }
            }
        }
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
        $this->emit('alertaMisionVision', $datos);
    }

    public function CambiarVisibilidadVision($id){
        $dtovision = Vision::find($id);
        if ($dtovision ->activo == 0) {
            Vision::where('activo', 1)->update(['activo' => 0]);
            $dtovision ->update([
                'activo' => 1
            ]);
        } else {
            $dtovision ->update([
                'activo' => 0
            ]);
            
            $datos2 = [
                'modo' => 'bg-warning',
                'mensaje' => 'Ningun elemento de visible en la pagina web'
            ];
            $this->emit('alertaMisionVision', $datos2); 
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del elemento'
        ];
        $this->emit('alertaMisionVision', $datos);
    }

    public function Seleccionar($id,$aux){
        if($aux==1){
            $dto= Vision::findOrFail($id);
            $this->vision_id=$dto->id;
        }elseif($aux==2){
            $dto= Mision::findOrFail($id);
            $this->mision_id=$dto->id;
        }
        
        $this->descvision=$dto->descripcion;
        $this->posicion=$dto->posicion;
        $this->MostrarModal($aux);
    }

    public function CambiarVisibilidadMision($id){
        $dtomision = Mision::find($id);
        if ($dtomision ->activo == 0) {
            Mision::where('activo', 1)->update(['activo' => 0]);
            $dtomision ->update([
                'activo' => 1
            ]);
        } else {
            $dtomision ->update([
                'activo' => 0
            ]);
            
            $datos2 = [
                'modo' => 'bg-warning',
                'mensaje' => 'Ningun elemento de visible en la pagina web'
            ];
            $this->emit('alertaMisionVision', $datos2); 
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del elemento'
        ];
        $this->emit('alertaMisionVision', $datos);
    }

    public function ElimnarComponente($dtos){
        //datos recibe el valor de id de la mision o vision, y un dato auxiliar para poder identificar de que tabla debemos de eliminar, 1->Vision, 2-> Mision
        $objto=new Resena();
        if($dtos[1]==1){
            $vision = Vision::findOrFail($dtos[0]);
            $deleted=$vision->update([
                'borrado' => 1,
                'imagenes_id'=>null
            ]);
            $objto->EliminarImg($vision->imagenes_id);
            
            
        }else{
            $mision = Mision::findOrFail($dtos[0]);
            $deleted=$mision->update([
                'borrado' => 1,
                'imagenes_id'=>null
            ]);
            $objto->EliminarImg($mision->imagenes_id);
            
        }
        if(isset($deleted)){
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
        $this->emit('alertaMisionVision', $datos);
        

    }
}
