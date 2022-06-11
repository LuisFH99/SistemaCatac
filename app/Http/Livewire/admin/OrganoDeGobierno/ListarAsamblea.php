<?php

namespace App\Http\Livewire\Admin\OrganoDeGobierno;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Comuneros;
use App\Models\OrganoGobierno;
use App\Models\Persona;
use App\Models\Imagenes;

class ListarAsamblea extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $comuneros=Comuneros::join('persona', 'comuneros.persona_id', '=', 'persona.id')
                    ->select('persona.*','comuneros.imagenes_id','comuneros.codigo','comuneros.activo as activos',DB::raw('@i := @i + 1 as contador'))
                    ->crossJoin(DB::raw('(select @i := 0) as r'))
                    ->where('comuneros.borrado',0)
                    ->where(function ($query) {
                        $query->orWhere('nombre','LIKE','%'.$this->search.'%')
                        ->orWhere('apell_pat','LIKE','%'.$this->search.'%')
                        ->orWhere('apell_mat','LIKE','%'.$this->search.'%')
                        ->orWhere('email','LIKE','%'.$this->search.'%')
                        ->orWhere('DNI','LIKE','%'.$this->search.'%')
                        ->orWhere('telefono','LIKE','%'.$this->search.'%')
                        ->orWhere('codigo','LIKE','%'.$this->search.'%');
                    })->paginate(); 
        $imagenes=Imagenes::get();
        return view('livewire.admin.organo-de-gobierno.listar-asamblea',compact('comuneros','imagenes'));
    }
}
