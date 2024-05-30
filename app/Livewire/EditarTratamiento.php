<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tratamiento;
use Livewire\WithFileUploads;

class EditarTratamiento extends Component
{
    public $tratamiento_id;
    public $hora;
    public $nombre;
    public $gramos;
    public $imagen;
    public $cantidad;
    public $recetado;
    public $cuando;
    public $observaciones;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'hora' => 'required',
        'nombre' => 'required',
        'gramos' => 'nullable',
        'imagen_nueva' => 'nullable|image',
        'cantidad' => 'required',
        'recetado' => 'nullable',
        'cuando' => 'nullable',
        'observaciones' => 'nullable',
    ];

    public function mount(Tratamiento $tratamiento)
    {
        $this->tratamiento_id = $tratamiento->id;
        $this->hora = $tratamiento->hora;
        $this->nombre = $tratamiento->nombre;
        $this->gramos = $tratamiento->gramos ?? '';
        $this->imagen = $tratamiento->imagen ?? '';
        $this->cantidad = $tratamiento->cantidad;
        $this->recetado = $tratamiento->recetado ?? '';
        $this->cuando = $tratamiento->cuando ?? '';
        $this->observaciones = $tratamiento->observaciones ?? '';
    }

    public function editarTratamiento()
    {
        $datos = $this->validate();

        // Si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/medicamentos');
            $datos['imagen'] = str_replace('public/medicamentos/', '', $imagen);
        }

        $tratamiento = Tratamiento::find($this->tratamiento_id);

            $tratamiento->hora = $datos['hora'];
            $tratamiento->nombre = $datos['nombre'];
            $tratamiento->gramos = $datos['gramos'] ?? '';
            $tratamiento->imagen = $datos['imagen'] ?? $tratamiento->imagen;
            $tratamiento->cantidad = $datos['cantidad'];
            $tratamiento->recetado = $datos['recetado'] ?? '';
            $tratamiento->cuando = $datos['cuando'] ?? '';
            $tratamiento->observaciones = $datos['observaciones'] ?? '';
            $tratamiento->user_id = auth()->user()->id;

            $tratamiento->save();

            //crear un mensaje
            session()->flash('mensaje', 'Tu tratamiento ha sido
            actualizado correctamente');

            // Redireccionar al usuario
            return redirect()->route('tratamiento.show');
    }
   
    public function render()
    {
        return view('livewire.editar-tratamiento');
    }
}
