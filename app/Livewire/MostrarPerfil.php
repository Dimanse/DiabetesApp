<?php

namespace App\Livewire;

use App\Models\Historial;
use Livewire\Component;

class MostrarPerfil extends Component
{
    public function eliminarHistoria(Historial $historia)
    {
        $historia->delete();
    } 
    public function render()
    {
        $historial = Historial::find(auth()->user()->perfil);
        return view('livewire.mostrar-perfil', [
            'historial' => $historial,
        ]);
    }
}
