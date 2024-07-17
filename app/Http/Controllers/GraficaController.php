<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GraficaController extends Controller
{
    public function show(User $user)
    {
        return view('grafica.show', [
            'user' => $user,
        ]);
    }
}
