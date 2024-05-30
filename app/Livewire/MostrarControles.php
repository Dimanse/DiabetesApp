<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Control;
use Livewire\Component;

class MostrarControles extends Component
{
    public function eliminarControl(Control $control)
    {
        // dd($control->id);
        $control->delete();
        
    }
    public function render()
    {
        $controles = Control::where('user_id', auth()->user()->id)->latest('fecha')->latest('hora')->paginate(6);
        // dd($controles);

        return view('livewire.mostrar-controles', [

            'controles' => $controles,
        ]);
    }
}
