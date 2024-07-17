<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class ComentariosCitasController extends Controller
{
    public function show(Cita $cita)
    {
        $user = $cita->user;
        return view('comentarioscitas.show', [
            'user' => $user,
            'cita' => $cita,
        ]);
    }
}
