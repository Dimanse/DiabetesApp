<?php

namespace App\Livewire;

use App\Models\Control;
use App\Models\Horario;
use Livewire\Component;

class EditarGlucemia extends Component
{
    public $control_id;
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
    public function mount(Control $control)
    {
        $this->control_id = $control->id;
        $this->fecha = $control->fecha;
        $this->hora = $control->hora;
        $this->horario_id = $control->horario_id;
        $this->comentario_hora = $control->comentario_hora;
        $this->glucemia = $control->glucemia;
        $this->observaciones = $control->observaciones;
    }

    public function editarGlucemia()
    {
        $datos = $this->validate();

        // Encontrar la glucemia a editar
            $control = Control::find($this->control_id);
        // Asignar los valores
            $control->fecha = $datos['fecha'];
            $control->hora = $datos['hora'];
            $control->horario_id = $datos['horario_id'];
            $control->comentario_hora = $datos['comentario_hora'];
            $control->glucemia = $datos['glucemia'];
            $control->observaciones = $datos['observaciones'];
        // Guardar la glucemia
            $control->save();
        //crear un mensaje
        session()->flash('mensaje', 'Tu glucemia ha sido
        actualizada correctamente');

        // Redireccionar al usuario
        return redirect()->route('controles.show');
    }
    public function render()
    {
        $horarios = Horario::all();
        return view('livewire.editar-glucemia', [
            'horarios' => $horarios,
        ]);
    }
}
