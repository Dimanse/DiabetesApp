<?php

namespace App\Livewire;

use App\Models\Genero;
use App\Models\Historial;
use Livewire\WithFileUploads;
use Livewire\Component;

class EditarHistorial extends Component
{
    public $historial_id;
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
    public $imagen_nueva;


    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required',
        'imagen_nueva' => 'required|image',
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


    public function mount(Historial $historial)
    {
        $this->historial_id = $historial->id;
        $this->nombre = $historial->nombre;
        $this->imagen = $historial->imagen;
        $this->genero_id = $historial->genero_id;
        $this->fecha_nacimiento = $historial->fecha_nacimiento;
        $this->peso = $historial->peso;
        $this->estatura = $historial->estatura;
        $this->alergias = $historial->alergias;
        $this->antecedentes_familiares = $historial->antecedentes_familiares ?? '';
        $this->enfermedades_cronicas = $historial->enfermedades_cronicas ?? '';
        $this->procedimientos_quirurgicos = $historial->procedimientos_quirurgicos ?? '';
        $this->condiciones_pasadas = $historial->condiciones_pasadas ?? '';
        $this->doctor = $historial->doctor;
        $this->clinica = $historial->clinica;
        $this->observaciones = $historial->observaciones ?? '';


        // dd($historial);
    }

    public function editHistorial()
    {
        $datos = $this->validate();
        
        // Si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/imagenes');
            $datos['imagen'] = str_replace('public/imagenes/', '', $imagen);
        }

        // Encontrar la informacion a editar
            $historial = Historial::find($this->historial_id);
            
        // Asignar los valores
            $historial->nombre = $datos['nombre'];
            $historial->imagen = $datos['imagen'] ?? $historial->imagen;
            $historial->genero_id = $datos['genero_id'];
            $historial->fecha_nacimiento = $datos['fecha_nacimiento'];
            $historial->peso = $datos['peso'];
            $historial->estatura = $datos['estatura'];
            $historial->alergias = $datos['alergias'];
            $historial->antecedentes_familiares = $datos['antecedentes_familiares'];
            $historial->enfermedades_cronicas = $datos['enfermedades_cronicas'];
            $historial->procedimientos_quirurgicos = $datos['procedimientos_quirurgicos'];
            $historial->condiciones_pasadas = $datos['condiciones_pasadas'];
            $historial->doctor = $datos['doctor'];
            $historial->clinica = $datos['clinica'];
            $historial->observaciones = $datos['observaciones'];
        // Guardar el perfil
            $historial->save();
        //crear un mensaje
        session()->flash('mensaje', 'Tu perfil ha sido
        actualizado correctamente');

        // Redireccionar al usuario
        return redirect()->route('informacion.show');
    }
    public function render()
    {
        $generos = Genero::all();
        return view('livewire.editar-historial', [
            'generos' =>$generos,
        ]);
    }
}
