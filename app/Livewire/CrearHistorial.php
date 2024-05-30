<?php

namespace App\Livewire;

use App\Models\Genero;
use App\Models\Historial;
use Livewire\WithFileUploads;
use Livewire\Component;

class CrearHistorial extends Component
{

    public $nombre;
    public $imagen;
    public $genero_id;
    public $fecha_nacimiento;
    public $peso;
    public $estatura;
    public $alergias;
    public $antecedentes_familiares;
    public $enfermedades_cronicas;
    public $procedimientos_quirurgicos;
    public $condiciones_pasadas;
    public $doctor;
    public $clinica;
    public $observaciones;

    use WithFileUploads;
    protected $rules = [
        'nombre' => 'required',
        'imagen' => 'required|image',
        'genero_id' => 'required',
        'fecha_nacimiento' => 'required',
        'peso' => 'required',
        'estatura' => 'required',
        'alergias' => 'required',
        'antecedentes_familiares' => 'nullable',
        'enfermedades_cronicas' => 'nullable',
        'procedimientos_quirurgicos' => 'nullable',
        'condiciones_pasadas' => 'nullable',
        'doctor' => 'required',
        'clinica' => 'required',
        'observaciones' => 'nullable',
    ];

    public function crearHistorial()
    {
        $datos = $this->validate();

        // Almacenar imagen
        $imagen = $this->imagen->store('public/imagenes');
        $datos['imagen'] = str_replace('public/imagenes/', '', $imagen);

        Historial::create([
            'nombre' => $datos['nombre'],
            'imagen' => $datos['imagen'],
            'genero_id' => $datos['genero_id'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'peso' => $datos['peso'],
            'estatura' => $datos['estatura'],
            'alergias' => $datos['alergias'],
            'antecedentes_familiares' => $datos['antecedentes_familiares'] ?? '',
            'enfermedades_cronicas' => $datos['enfermedades_cronicas'] ?? '',
            'procedimientos_quirurgicos' => $datos['procedimientos_quirurgicos'] ?? '',
            'condiciones_pasadas' => $datos['condiciones_pasadas'] ?? '',
            'doctor' => $datos['doctor'],
            'clinica' => $datos['clinica'],
            'observaciones' => $datos['observaciones'] ?? '',
            'user_id' => auth()->user()->id,
        ]);

        // Crear un mensaje
        session()->flash('mensaje', 'Tu perfil se creó correctamente');

        // Redireccionar al usuario
        return redirect()->route('informacion.show');
    }
    public function render()
    {
        $generos = Genero::all();
        return view('livewire.crear-historial', [
            'generos' => $generos,
        ]);
    }
}
