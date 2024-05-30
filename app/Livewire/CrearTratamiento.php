<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tratamiento;
use Livewire\WithFileUploads;

class CrearTratamiento extends Component
{
    public $hora;
    public $nombre;
    public $gramos;
    public $imagen;
    public $cantidad;
    public $recetado;
    public $cuando;
    public $observaciones;

    use WithFileUploads;

    protected $rules = [
        'hora' => 'required',
        'nombre' => 'required',
        'gramos' => 'nullable',
        'imagen' => 'nullable',
        'cantidad' => 'required',
        'recetado' => 'nullable',
        'cuando' => 'required',
        'observaciones' => 'nullable',
    ];

    public function crearTratamiento()
    {
        $datos = $this->validate();

         // Almacenar imagen
         $imagen = $this->imagen->store('public/medicamentos');
         $datos['imagen'] = str_replace('public/medicamentos/', '', $imagen);

        Tratamiento::create([
            'hora' => $datos['hora'],
            'nombre' => $datos['nombre'],
            'gramos' => $datos['gramos'] ?? '',
            'imagen' => $datos['imagen'] ?? '',
            'cantidad' => $datos['cantidad'],
            'recetado' => $datos['recetado'] ?? '',
            'cuando' => $datos['cuando'],
            'observaciones' => $datos['observaciones'] ?? '',
            'user_id' => auth()->user()->id,
        ]);

        //crear un mensaje
        session()->flash('mensaje', 'Tu tratamiento ha sido guardado correctamente');

        // Redireccionar al usuario
        return redirect()->route('tratamiento.show');


    }
    public function render()
    {
        return view('livewire.crear-tratamiento');
    }
}
