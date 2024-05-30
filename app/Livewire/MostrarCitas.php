<?php

namespace App\Livewire;

use App\Models\Cita;
use Livewire\Component;

class MostrarCitas extends Component
{
    public function eliminarCita(Cita $cita)
    {
        // dd($cita);
        // dd($control->id);
        $cita->delete();
    }
    public function render()
    {
        $citas = Cita::where('user_id', auth()->user()->id)->orderBy('fecha', 'Asc')->paginate(6);
        return view('livewire.mostrar-citas', [
            'citas' => $citas
        ]);
    }
}
