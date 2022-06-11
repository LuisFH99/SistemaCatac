<?php

namespace App\Http\Livewire\Admin\OrganoDeGobierno;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Comuneros;
use App\Models\OrganoGobierno;
use App\Models\Persona;
use App\Models\SubOrganosGobierno;
use App\Models\Cargo;
use App\Models\Funcionarios;
use App\Models\Imagenes;

class ListarApoyo extends Component
{
    use WithPagination; 
    public $search; public $aux; public $ruta;
    protected $paginationTheme = "bootstrap";
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $ruta=$this->ruta;
        $subOrganos=SubOrganosGobierno::join('organo_gobierno', 'sub_organos_gobierno.organo_gobierno_id', '=', 'organo_gobierno.id')
                    ->join('sub_organos_gobierno as otro', 'sub_organos_gobierno.sub_organos_gobierno_id', '=', 'otro.id')
                    ->select('sub_organos_gobierno.*','organo_gobierno.nombre as gobierno',DB::raw('@i := @i + 1 as contador'))
                    ->crossJoin(DB::raw('(select @i := 0) as r'))
                    ->where('sub_organos_gobierno.borrado',0)->where('sub_organos_gobierno.sub_organos_gobierno_id',$this->aux)
                    ->where(function ($query) {
                        $query->orWhere('sub_organos_gobierno.nombre','LIKE','%'.$this->search.'%')
                        ->orWhere('sub_organos_gobierno.descripcion','LIKE','%'.$this->search.'%')
                        ->orWhere('organo_gobierno.nombre','LIKE','%'.$this->search.'%');
                    })->paginate();
        return view('livewire.admin.organo-de-gobierno.listar-apoyo',compact('subOrganos','ruta'));
    }
}
