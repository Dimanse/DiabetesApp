<?php

namespace App\Livewire;

use App\Models\Control;
use App\Models\Horario;
use Livewire\Component;

class CrearGlucemia extends Component
{
    public $fecha;
    public $hora;
    public $horario_id;
    public $comentario_hora;
    public $glucemia;
    public $observaciones;

    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'horario_id' => 'required',
        'comentario_hora' => 'required',
        'glucemia' => 'required',
        'observaciones' => 'nullable',
    ];

    public function crearGlucemia()
    {
        $datos = $this->validate();

        // dd(auth()->user()->id);
        // return;

        Control::create([
            'fecha' => $datos['fecha'],
            'hora' => $datos['hora'],
            'horario_id' => $datos['horario_id'] ?? '',
            'comentario_hora' => $datos['comentario_hora'] ?? '',
            'glucemia' => $datos['glucemia'],
            'observaciones' => $datos['observaciones'] ?? '',
            'user_id' => auth()->user()->id,
        ]);

        //crear un mensaje
        session()->flash('mensaje', 'Tu glucemia ha sido guardada correctamente');

        // Redireccionar al usuario
        return redirect()->route('controles.show');


    }

    public function render()
    {



        // Consultar BD
        $horarios = Horario::all();

        return view('livewire.crear-glucemia', [
            'horarios' => $horarios,
        ]);
    }
}
