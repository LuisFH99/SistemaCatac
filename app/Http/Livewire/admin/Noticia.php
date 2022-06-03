<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Noticias;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Imagenes;

class Noticia extends Component
{
    use WithFileUploads;
    public $vermodal = false;
    public $noticia_id=0;
    public $fromnoticia=true;
    public $titulo,$descripcion;
    public $imagenes=[];
    public $aux;
    protected $listeners = ['ElimnarNoticia'];

    protected $rulesNoticia=[
        'titulo'=>'required',
        'descripcion' => 'required',
        
    ];
    protected $rulesImgNoticia=[
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
        $ruta=str_replace('storage','public',(Imagenes::where('id',$idimg)->value('url_imagen')));
        Storage::delete($ruta);
        $aux=Imagenes::destroy($idimg);
        return $aux;
        // dd($idimg);
    }

    public function render()
    {
        $noticias=Noticias::where('borrado',0)->orderBy('activo','desc')->get();
        return view('livewire.noticia.view',compact('noticias'));
    }
    
    public function Limpiar(){
        $this->titulo=null;
        $this->descripcion=null;
        $this->noticia_id=0;
    }

    public function MostrarModal(){
        $this->vermodal = true;
    }
    public function Cancelar()
    {
        $this->vermodal = false;
        $this->fromnoticia=true;
        $this->Limpiar();
    }
    public function GuardarNoticia(){
        $this->validate($this->rulesNoticia,$this->msjError);
        $datossave=DB::select('select curdate() as fecha, curtime() as hora');
        if($this->noticia_id==0){
            $creado = Noticias::create([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'hora' => $datossave[0]->hora,
                'fecha' => $datossave[0]->fecha,
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
            $noticia = Noticias::findOrFail($this->noticia_id);
            $noticia->update([
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
        $this->emit('alertaNoticia', $datos);
    }

    public function SeleccionarNoticia($id){
        $dtonoticia = Noticias::findOrFail($id);
        $this->noticia_id=$dtonoticia->id;
        $this->titulo=$dtonoticia->titulo;
        $this->descripcion=$dtonoticia->descripcion;
        $this->MostrarModal();
    }

    public function CambiarVisibilidad($id){
        $dtonoticia = Noticias::find($id);
        if ($dtonoticia->activo == 0) {
            $dtonoticia->update([
                'activo' => 1
            ]);
        } else {
            $dtonoticia->update([
                'activo' => 0
            ]);
            
            $datos2 = [
                'modo' => 'bg-warning',
                'mensaje' => 'Ningun elemento de visible en la pagina web'
            ];
            $this->emit('alertaNoticia', $datos2); 
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del elemento'
        ];
        $this->emit('alertaNoticia', $datos);
        
    }

    public function FromImagenes($id){
        $dtonoticia = Noticias::find($id);
        $this->noticia_id=$dtonoticia->id;
        $this->titulo=$dtonoticia->titulo;
        $this->fromnoticia=false;
        $this->MostrarModal();
        
    }

    public function GuardarImagenes(){
        $this->validate($this->rulesImgNoticia,$this->msjError);
        foreach ($this->imagenes as $imagene) {
            $archivo=$imagene->store('public/imagenes');
            $url = Storage::url($archivo);
            $img=Imagenes::create([
                'url_imagen' => $url,
            ]);
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
            $noticia=Noticias::findOrFail($this->noticia_id);
            $noticia->noticiaimagenes()->attach($idimg);
        }
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se insertó la imagenes de forma correcta.'
        ];
        $this->Cancelar();
        $this->emit('alertaNoticia', $datos);
    }

    public function QuitarImagen($idnoticia,$idimg){
        $noticia=Noticias::findOrFail($idnoticia);
        $aux=$noticia->noticiaimagenes()->detach($idimg);
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
        
        $this->emit('alertaNoticia', $datos);

    }
    public function ElimnarNoticia($id){
        $idimg=[];
        $noticia=Noticias::findOrFail($id);
            foreach($noticia->noticiaimagenes as $imagen){
                $idimg[]=$imagen->id;
            }
        if(count($idimg)>0){
            $bdr=$noticia->noticiaimagenes()->detach();
            foreach($idimg as $item){
                $this->EliminarImg($item);
            }
            $deleted=$noticia->update([
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
            $deleted=$noticia->update([
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
        $this->emit('alertaNoticia', $datos);
    }
}
