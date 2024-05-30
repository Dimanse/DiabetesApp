<?php

namespace App\Livewire;

use App\Models\Cita;
use Livewire\Component;

class EditarCita extends Component
{

    public $cita_id;
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

    public function mount(Cita $cita)
    {
        $this->cita_id = $cita->id;
        $this->fecha = $cita->fecha;
        $this->hora = $cita->hora;
        $this->clinica = $cita->clinica;
        $this->consulta = $cita->consulta;
        $this->doctor = $cita->doctor;
        $this->sala = $cita->sala;
        $this->observaciones = $cita->observaciones;
    }

    public function editarCita()
    {
        $datos = $this->validate();

        $cita = Cita::find($this->cita_id);

        
            $cita->fecha = $datos['fecha'];
            $cita->hora = $datos['hora'];
            $cita->clinica = $datos['clinica'];
            $cita->consulta = $datos['consulta'] ?? '';
            $cita->doctor = $datos['doctor'] ?? '';
            $cita->sala = $datos['sala'] ?? '';
            $cita->observaciones = $datos['observaciones'] ?? '';
            $cita->user_id = auth()->user()->id;

            $cita->save();
        

        //crear un mensaje
        session()->flash('mensaje', 'Tu cita ha sido actualizada con exito');

        // Redireccionar al usuario
        return redirect()->route('citas.show');


    }
    public function render()
    {
        return view('livewire.editar-cita');
    }
}
