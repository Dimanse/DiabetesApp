<?php

namespace App\Livewire;

use App\Models\Cita;
use Livewire\Component;

class CrearCita extends Component
{
    public $fecha;
    public $hora;
    public $clinica;
    public $consulta;
    public $doctor;
    public $sala;
    public $observaciones;

    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'clinica' => 'required',
        'consulta' => 'nullable',
        'doctor' => 'nullable',
        'sala' => 'nullable',
        'observaciones' => 'nullable',
    ];

    public function crearCita()
    {
        $datos = $this->validate();

        // dd(auth()->user()->id);
        // return;

        Cita::create([
            'fecha' => $datos['fecha'],
            'hora' => $datos['hora'],
            'clinica' => $datos['clinica'],
            'consulta' => $datos['consulta'] ?? '',
            'doctor' => $datos['doctor'] ?? '',
            'sala' => $datos['sala'] ?? '',
            'observaciones' => $datos['observaciones'] ?? '',
            'user_id' => auth()->user()->id,
        ]);

        //crear un mensaje
        session()->flash('mensaje', 'Tu cita ha sido creada');

        // Redireccionar al usuario
        return redirect()->route('citas.show');


    }
    public function render()
    {
        return view('livewire.crear-cita');
    }
}
