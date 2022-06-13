<?php

namespace App\Http\Livewire\Admin\InstrumentoGestion;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\InstrumentosGestion;
use App\Models\Modificatorias;
use App\Models\TipoInstrumento;

class ListarInstrumento extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $instrumentosGestion1=Modificatorias::join('instrumentos_gestion', 'modificatorias.instrumentos_gestion_id', '=', 'instrumentos_gestion.id')
                    ->join('tipo_instrumento', 'instrumentos_gestion.tipo_instrumento_id', '=', 'tipo_instrumento.id')
                    ->select('modificatorias.id as id',DB::raw('0 as descripcion'), 'modificatorias.url_doc as url', 
                                'modificatorias.fecha as fecha','modificatorias.activo as activo',
                                'modificatorias.instrumentos_gestion_id as idt',DB::raw('concat("Modificatoria de ",tipo_instrumento.tipo)  as tipo'),
                                DB::raw('2 as aux'),DB::raw('@i := @i + 1 as contador'))
                    ->crossJoin(DB::raw('(select @i := 0) as r'))
                    ->where('modificatorias.borrado',0)
                    ->where(function ($query) {
                        $query->orWhere('descripcion','LIKE','%'.$this->search.'%')
                        ->orWhere('url_documento','LIKE','%'.$this->search.'%')
                        ->orWhere('tipo','LIKE','%'.$this->search.'%');
                    });
        $instrumentosGestion=InstrumentosGestion::join('tipo_instrumento', 'instrumentos_gestion.tipo_instrumento_id', '=', 'tipo_instrumento.id')
                    ->select('instrumentos_gestion.id as id','instrumentos_gestion.descripcion as descripcion', 
                                'instrumentos_gestion.url_documento  as url',DB::raw('0 as fecha'),
                                'instrumentos_gestion.activo as activo','instrumentos_gestion.tipo_instrumento_id  as idt',
                                'tipo_instrumento.tipo  as tipo',DB::raw('1 as aux'),DB::raw('@i := @i + 1 as contador'))
                    ->crossJoin(DB::raw('(select @i := 0) as r'))
                    ->where('instrumentos_gestion.borrado',0)
                    ->where(function ($query) {
                        $query->orWhere('descripcion','LIKE','%'.$this->search.'%')
                        ->orWhere('url_documento','LIKE','%'.$this->search.'%')
                        ->orWhere('tipo','LIKE','%'.$this->search.'%');
                    })->union($instrumentosGestion1)->paginate();
        return view('livewire.admin.instrumento-gestion.listar-instrumento',compact('instrumentosGestion')); 
    }
}
