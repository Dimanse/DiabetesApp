<?php

namespace App\Livewire;

use App\Models\Tratamiento;
use Livewire\Component;

class MostrarTratamiento extends Component
{
    public $nombre;
    public $hora;
    public $recetado;

    public function eliminarTratamiento(Tratamiento $tratamiento)
    {
        // dd($control->id);
        $tratamiento->delete();
    }

    public $listeners = ['terminosBusqueda' => 'buscar'];
    public function buscar($nombre, $hora, $recetado)
    {
        $this->nombre = $nombre;
        $this->hora = $hora;
        $this->recetado = $recetado;
        // dd($this->hora);
    }
    public function render()
    {
        // $tratamientos = Tratamiento::where('user_id', auth()->user()->id)->orderBy('hora', 'Asc')->paginate(6);

        $tratamientos = Tratamiento::when($this->nombre, function($query){
            $query->where('nombre', 'LIKE', '%' . $this->nombre . '%');
        })
        ->when($this->hora, function($query){
            $query->where('hora', $this->hora);
        })
        ->when($this->recetado, function($query){
            $query->where('recetado', 'LIKE', '%' . $this->recetado . '%');
        })
        ->paginate(10);
        return view('livewire.mostrar-tratamiento', [
            'tratamientos' => $tratamientos,
        ]);
    }
}
