<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class ComentariosTratamientoController extends Controller
{
    public function show(Tratamiento $tratamiento)
    {
        $user = $tratamiento->user;
        return view('comentariotratamiento.show', [
            'user' => $user,
            'tratamiento' => $tratamiento,
        ]);
    }
}
