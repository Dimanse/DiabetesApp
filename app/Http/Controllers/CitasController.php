<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function show()
    {
        $usuario = User::find(auth()->user()->id);
        return view('citas.show', [
            'usuario' => $usuario,
        ]);
    }

    public function create()
    {
        $usuario = User::find(auth()->user()->id);
        return view('citas.create', [
            'usuario' => $usuario,
        ]);
    }

    public function editar(Cita $cita)
    {
        $usuario = User::find(auth()->user()->id);
        // dd($cita);
        return view('citas.editar', [
            'usuario' => $usuario,
            'cita' => $cita,
        ]);
    }
}
