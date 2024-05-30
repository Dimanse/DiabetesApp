<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\User;
use App\Models\Genero;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function show()
    {
        $usuario = User::find(auth()->user()->id);
        $historial = Historial::find(auth()->user()->perfil);

        // dd($historial);
        return view('informacion.show', [
            'usuario' => $usuario,
            'historial' => $historial,
        ]);
    }
    public function store(Request $request)
    {
        $generos = Genero::all();
        // dd($generos);
        $usuario = User::find(auth()->user()->id);
        return view('informacion.create', [
            'usuario' => $usuario,
            'generos' => $generos,
        ]);
    }

    public function edit(Historial $historial)
    {
        // $generos = Genero::all();
        $usuario = User::find(auth()->user()->id);
        // $historial = Historial::where('user_id', $usuario->id)->first();
        
        
        
        
        return view('informacion.editar', [
            'usuario' => $usuario,
            // 'generos' => $generos,
            'historial' => $historial,
        ]);
    }

    // public function editar(Control $control)
    // {
    //     // dd($control);
    //     $usuario = User::find(auth()->user()->id);
    //     return view('controles.editar', [
    //         'usuario' => $usuario,
    //         'control' => $control
    //     ]);
    // }
}
