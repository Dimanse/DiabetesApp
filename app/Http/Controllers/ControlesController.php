<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\User;
use Illuminate\Http\Request;

class ControlesController extends Controller
{
    //
    public function show()
    {
        $usuario = User::find(auth()->user()->id);
        return view('controles.show', [
            'usuario' => $usuario,
        ]);
    }

    public function store(Request $request)
    {
        $usuario = User::find(auth()->user()->id);
        return view('controles.create', [
            'usuario' => $usuario,
        ]);
    }
    public function editar(Control $control)
    {
        // dd($control);
        $usuario = User::find(auth()->user()->id);
        return view('controles.editar', [
            'usuario' => $usuario,
            'control' => $control
        ]);
    }
}
