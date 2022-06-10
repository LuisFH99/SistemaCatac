<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Servicios;
use App\Models\Productos;
use App\Models\Encargado;
use App\Models\Imagenes;
use App\Models\Persona;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Admin\Resena;

class Servicio extends Component
{
    use WithFileUploads;
    public $servicio_id;
    public $vermodal = false;
    public $fromproducto=true;
    public $existecomunero=false;
    public $encontrado=false;
    public $producto_id=0,$producto,$descproducto,$imgproducto;
    public $dnicomunero,$nombcomunero,$correo,$telefono;
    public $descripcion,$funciones;
    public $imgencargado,$fechafinal,$fechainicio,$descencargado;
    protected $listeners = ['Eliminar'];

    protected $rulesProducto=[
        'producto' => 'required',
        'descproducto' => 'required',
    ];
    protected $rulesEncargado=[
        'descencargado' => 'required',
        'fechainicio' => 'required',
        'fechafinal' => 'required',
    ];

    protected $rulesImgProducto=[
        'imgproducto'=>'required|mimes:jpg,jpeg,png|max:4096',
    ];
    protected $rulesImgEncargado=[
        'imgencargado'=>'required|mimes:jpg,jpeg,png|max:4096',
    ];
    protected $msjError=[
        'producto.required'=>'El campo Nombre del Producto es obligatorio',
        'descproducto.required'=>'El campo descripcion del producto es obligatorio',

        'descencargado.required'=>'El campo descripcion es obligatorio',
        'fechainicio.required'=>'El campo fecha inicio es obligatorio',
        'fechafinal.required'=>'El campo fecha final es obligatorio',
        'imgencargado.required'=>'La imagen es obligatorio',
        'imgencargado.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imgencargado.max'=>'El tamaño maximo es de 3.5 MB',

        'imgproducto.required'=>'La imagen es obligatorio',
        'imgproducto.mimes'=>'Solo debe enviar formatos: jpg,jpeg,png',
        'imgproducto.max'=>'El tamaño maximo es de 3.5 MB'

    ];

    public function mount()
    {
        $this->servicio_id = request('id');
        $datoservicio=Servicios::where('borrado',0)->where('id',$this->servicio_id)->first();
        $this->descripcion=$datoservicio->descripcion;
        $this->funciones=$datoservicio->funciones;
    }

    public function render()
    {
        $productos=Productos::where('borrado',0)->where('servicios_id',$this->servicio_id)->orderBy('id','desc')->get();
        $datoservicio=Servicios::where('borrado',0)->where('id',$this->servicio_id)->first();
        // dd ($datoservicio->nom_servicio);
        return view('livewire.servicio.view', compact('datoservicio','productos') );
    }

    public function GrabarImagenProducto(){
        $archivo=$this->imgproducto->store('public/imagenes');
        $url = Storage::url($archivo);
        $img=Imagenes::create([
            'url_imagen' => $url,
        ]);
    }
    public function GrabarImagenEncargado(){
        $archivo=$this->imgencargado->store('public/imagenes');
        $url = Storage::url($archivo);
        $img=Imagenes::create([
            'url_imagen' => $url,
        ]);
    }

    public function MostrarModal($aux){
        if($aux==2){
            $this->fromproducto=false;
        }
        $this->vermodal = true;
    }
    public function Cancelar(){
        $this->vermodal = false;
        $this->Limpiar();
    }
    public function Limpiar(){
        $this->producto_id=0;
        $this->producto=null;
        $this->descproducto=null;
        $this->imgproducto=null;
        $this->fromproducto=true;

        $this->descencargado=null;
        $this->fechafinal=null;
        $this->fechainicio=null;
        $this->imgencargado=null;
        $this->encontrado=false;
      
        $this->dnicomunero=null;
        $this->nombcomunero=null;
        $this->correo=null;
        $this->telefono=null;
    }

    public function GuardarDescripcion(){
        $servicio=Servicios::findOrFail($this->servicio_id);
        $servicio->update([
            'descripcion' => $this->descripcion
        ]);

        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la descripción del servicio'
        ];
        $this->emit('alertaServicio', $datos);
    }

    public function GuardarFuncion(){
        // $this->funciones=$funciones;
        $servicio=Servicios::findOrFail($this->servicio_id);
        $servicio->update([
            'funciones' => $this->funciones
        ]);
        // dd($this->funciones);
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó las Funciones del sericio'
        ];
        $this->emit('alertaServicio', $datos);
    }

    public function RegistarProducto(){
        $objto=new Resena();
        if($this->producto_id==0){
            $this->validate($this->rulesProducto,$this->msjError);
            $this->validate($this->rulesImgProducto,$this->msjError);
            $this->GrabarImagenProducto();
            $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
            $creado = Productos::create([
                'producto' => $this->producto,
                'descripcion' => $this->descproducto,
                'Activo' => 1,
                'borrado' => 0,
                'imagenes_id'=>$idimg->id,
                'servicios_id'=>$this->servicio_id
            ]);
            
        }else{
            $this->validate($this->rulesProducto,$this->msjError);
            if(is_null($this->imgproducto)){
                $producto=Productos::findOrFail($this->producto_id);
                $creado=$producto->update([
                    'producto' => $this->producto,
                    'descripcion' => $this->descproducto,
                ]);
            }else{
                $this->validate($this->rulesProducto,$this->msjError);
                $this->validate($this->rulesImgProducto,$this->msjError);
                $this->GrabarImagenProducto();
                $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
                $producto=Productos::findOrFail($this->producto_id);
                $oldid=$producto->imagenes_id;
                $creado=$producto->update([
                    'producto' => $this->producto,
                    'descripcion' => $this->descproducto,
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
            $this->Limpiar();
            $this->vermodal = false;
        } else {
            $datos = [
                'modo' => 'bg-danger',
                'mensaje' => 'Error! No se creó el registro.'
            ];
        }
        $this->emit('alertaServicio', $datos);
    }

    public function CambiarVisibilidad($id,$aux){
        if($aux==1){
            $producto=Productos::findOrFail($id);
            if($producto->Activo==0){
                $producto->update([
                    'Activo' => 1
                ]);
            }else{
                $producto->update([
                    'Activo' => 0
                ]);
            }
        }else{
            $encargado=Encargado::findOrFail($id);
            if($encargado->activo==0){
                $encargado->update([
                    'activo' => 1
                ]);
            }else{
                $encargado->update([
                    'Activo' => 0
                ]);
            }

        }
        
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó la visibilidad del elemento'
        ];
        $this->emit('alertaServicio', $datos);
    }

    public function Seleccionar($id,$aux){
        if($aux==1){
            $datoproducto = Productos::findOrFail($id);
            $this->producto_id=$datoproducto->id;
            $this->producto=$datoproducto->producto;
            $this->descproducto=$datoproducto->descripcion;
            $this->MostrarModal(1);
        }    
    }

    public function Buscar(){
        
        $persona=Persona::join('comuneros','persona.id','comuneros.persona_id')
                ->where('persona.borrado',0)
                ->where('comuneros.borrado',0)
                ->where('persona.dni',$this->dnicomunero)->first();
        if(isset($persona->id)){
            $this->encontrado=true;
            $this->persona_id=$persona->id;
            $this->nombcomunero=$persona->apell_pat.' '.$persona->apell_mat.' '.$persona->nombre;
            $this->correo=$persona->email;
            $this->telefono=$persona->telefono;
            $datos = [
                'modo' => 'bg-success',
                'mensaje' => 'Comunero Encontrado'
            ];
        }else{
            $datos = [
                'modo' => 'bg-danger',
                'mensaje' => 'No se encontro ningun registro'
            ];
           
        }
        $this->emit('alertaServicio', $datos);
    }

    public function RegistarEncargado(){
        $objto=new Resena();
        $this->validate($this->rulesEncargado,$this->msjError);
        $this->validate($this->rulesImgEncargado,$this->msjError);
        $this->GrabarImagenEncargado();
        $idimg=Imagenes::select('id')->orderBy('id','desc')->first();
        $creado = Encargado::create([
            'descripcion' => $this->descencargado,
            'fecha_inicio' => $this->fechainicio,
            'fecha_fin' => $this->fechafinal,
            'posicion' =>1,
            'activo' => 1,
            'borrado' => 0,
            'persona_id' => $this->persona_id,
            'imagenes_id'=>$idimg->id,
        ]);
        $idencargado=Encargado::select('id')->orderBy('id','desc')->first();
        $servicio=Servicios::findOrFail($this->servicio_id);
        $servicio->update([
            'encargado_id' => $idencargado->id
        ]);
            $this->Limpiar();
            $this->vermodal = false;;
        $datos = [
            'modo' => 'bg-success',
            'mensaje' => 'Se actualizó las Funciones del sericio'
        ];
        $this->emit('alertaServicio', $datos);
    }

    public function Eliminar($dtos){
        $objto=new Resena();
        if($dtos[1]==1){
            $producto = Productos::findOrFail($dtos[0]);
            $idimg=$producto->imagenes_id;
            $deleted=$producto->update([
                'borrado' => 1,
                'imagenes_id'=>null
            ]);
            $objto->EliminarImg($idimg);
        }else{
            $encargado = Encargado::findOrFail($dtos[0]);
            $servicio = Servicios::findOrFail($this->servicio_id);
            $servicio->update([
                'encargado_id'=>null
            ]);
            $idimg=$encargado->imagenes_id;
            $deleted=$encargado->update([
                'borrado' => 1,
                'imagenes_id'=>null
            ]);
            $objto->EliminarImg($idimg);
        };

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
        $this->emit('alertaServicio', $datos);
    }


}
