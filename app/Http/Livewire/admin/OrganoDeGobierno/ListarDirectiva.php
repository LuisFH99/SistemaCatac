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

class ListarDirectiva extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $funcionarios=Funcionarios::join('persona', 'funcionarios.persona_id', '=', 'persona.id')
                    ->join('comuneros', 'persona.id', '=', 'comuneros.persona_id')
                    ->join('imagenes', 'funcionarios.imagenes_id', '=', 'imagenes.id')
                    ->join('cargo', 'funcionarios.cargo_id', '=', 'cargo.id')
                    ->select('persona.*','imagenes.url_imagen','comuneros.codigo','funcionarios.perfil','funcionarios.fech_inicio',
                            'funcionarios.fech_fin','funcionarios.profesion','funcionarios.url_cv',
                            'funcionarios.estado as activos','cargo.cargo',DB::raw('@i := @i + 1 as contador'))
                    ->crossJoin(DB::raw('(select @i := 0) as r'))
                    ->where('funcionarios.borrado',0)->where('funcionarios.sub_organos_gobierno_id',3)
                    ->where(function ($query) {
                        $query->orWhere('nombre','LIKE','%'.$this->search.'%')
                        ->orWhere('apell_pat','LIKE','%'.$this->search.'%')
                        ->orWhere('apell_mat','LIKE','%'.$this->search.'%')
                        ->orWhere('DNI','LIKE','%'.$this->search.'%')
                        ->orWhere('fech_inicio','LIKE','%'.$this->search.'%')
                        ->orWhere('fech_fin','LIKE','%'.$this->search.'%')
                        ->orWhere('cargo','LIKE','%'.$this->search.'%')
                        ->orWhere('perfil','LIKE','%'.$this->search.'%');
                    })->paginate();
        return view('livewire.admin.organo-de-gobierno.listar-directiva',compact('funcionarios')); 
    }
}
