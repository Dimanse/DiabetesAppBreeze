<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('citas.index', [
            'user' => $user,
        ]);
    }

    public function store()
    {
        $user = User::find(auth()->user()->id);
        return view('citas.create', [
            'user' => $user,
        ]);
    }

    public function edit(Cita $cita)
    {
        $user = User::find(auth()->user()->id);
        // dd($cita);
        return view('citas.edit', [
            'user' => $user,
            'cita' => $cita,
        ]);
    }

    public function show(User $user)
    {
        // dd($user->glucemia);
        $citas = Cita::where('user_id', auth()->user()->id)->latest('fecha')->latest('hora')->paginate(9);
        // dd($citas);
        return view('citas.show', [
            'user' => $user,
            'citas' => $citas,

        ]);
    }
}
