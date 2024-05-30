<?php

namespace App\Livewire;

use App\Models\Genero;
use Livewire\Component;
use App\Models\Informations;
use Livewire\WithFileUploads;

class EditarInformacion extends Component
{

    public $informacion_id;
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


    public function mount()
    {
        $informacion = Informations::where('user_id', auth()->user()->id)->first();
        $this->nombre = $informacion->nombre;

        // dd($informations[0]);
    }

    public function editarInfo()
    {
        $datos = $this->validate();

        // Si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/imagenes');
            $datos['imagen'] = str_replace('public/imagenes/', '', $imagen);
        }

        // Encontrar la informacion a editar
        $informacion = Informations::where('user_id', auth()->user()->id)->first();
       
        dd($informacion);


        // Asignar los valores
            $informacion->nombre = $datos['nombre'];
            $informacion->imagen = $datos['imagen'];
            $informacion->genero_id = $datos['genero_id'];
            $informacion->fecha_nacimiento = $datos['fecha_nacimiento'];
            $informacion->peso = $datos['peso'];
            $informacion->estatura = $datos['estatura'];
            $informacion->alergias = $datos['alergias'];
            $informacion->antecedentes_familiares = $datos['antecedentes_familiares'];
            $informacion->enfermedades_cronicas = $datos['enfermedades_cronicas'];
            $informacion->procedimientos_quirurgicos = $datos['procedimientos_quirurgicos'];
            $informacion->condiciones_pasadas = $datos['condiciones_pasadas'];
            $informacion->doctor = $datos['doctor'];
            $informacion->clinica = $datos['clinica'];
            $informacion->observaciones = $datos['observaciones'];
        // Guardar la glucemia
            $informacion->save();
        //crear un mensaje
        session()->flash('mensaje', 'Tu perfil ha sido
        actualizado correctamente');

        // Redireccionar al usuario
        return redirect()->route('informacion.show');
    }
    public function render()
    {
        $generos = Genero::all();
        return view('livewire.editar-informacion', [
            'generos' => $generos
        ]);
    }
}
