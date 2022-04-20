<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ResenaHistorica;

class Resena extends Component
{
    public function render()
    {
        $resenas=ResenaHistorica::orderBy('activo','desc')->get();
        return view('livewire.resena.view',compact('resenas'));
    }
}
