<?php

namespace App\Livewire;

use Livewire\Component;

class FiltrarTratamientos extends Component
{
    public $nombre;
    public $hora;
    public $recetado;

    public function leerDatosFormulario()
    {
        // dd('buscando');
        $this->dispatch('terminosBusqueda', $this->nombre, $this->hora, $this->recetado);
    }
    public function render()
    {
        return view('livewire.filtrar-tratamientos');
    }
}
