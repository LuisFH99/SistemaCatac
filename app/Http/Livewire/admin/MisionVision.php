<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Mision;
use App\Models\Vision;

class MisionVision extends Component
{
    public function render()
    {
        $misiones=Mision::all();
        $visiones=Vision::all();
        return view('livewire.misionvision.view',compact('misiones','visiones'));
    }
}
