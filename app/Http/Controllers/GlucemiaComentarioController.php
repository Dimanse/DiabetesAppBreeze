<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Glucemia;
use Illuminate\Http\Request;
use App\Models\GlucemiaComentario;

class GlucemiaComentarioController extends Controller
{
    public function store(Request $request)
    {
        // dd('Comentando');
        // dd(auth()->user()->id);

        // Validar
       

        // Imprimir el mensaje
        // return back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
