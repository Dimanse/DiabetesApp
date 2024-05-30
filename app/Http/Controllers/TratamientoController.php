<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function show()
    {
        $tratamientos = Tratamiento::where('user_id', auth()->user()->id)->get();
        $usuario = User::find(auth()->user()->id);
        return view('tratamiento.show', [
            'usuario' => $usuario,
            'tratamientos' => $tratamientos
        ]);
    }

    public function create()
    {
        $usuario = User::find(auth()->user()->id);
        return view('tratamiento.create', [
            'usuario' => $usuario,
        ]);
    }

    public function editar(Tratamiento $tratamiento)
    {
        // dd($tratamiento);
        $usuario = User::find(auth()->user()->id);
        return view('tratamiento.editar', [
            'usuario' => $usuario,
            'tratamiento' => $tratamiento,
        ]);
    }
}
