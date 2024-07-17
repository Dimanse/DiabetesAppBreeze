<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function index()
    {
        // dd($user);
        $user = User::find(auth()->user()->id);
        return view('tratamientos.index',[
            'user' => $user,
        ]);
    }

    public function show(User $user)
    {
        // dd($user->glucemia);
        // $tratamientos = Tratamiento::where('user_id', auth()->user()->id)->latest('hora')->paginate(9);
        // dd($glucemias);
        return view('tratamientos.show', [
            'user' => $user,
            // 'tratamientos' => $tratamientos,

        ]);
    }

    public function store()
    {
        $user = User::find(auth()->user()->id);
        return view('tratamientos.create', [
            'user' => $user,
        ]);
    }

    public function edit(Tratamiento $tratamiento)
    {
        $user = User::find(auth()->user()->id);
        return view('tratamientos.edit', [
            'tratamiento' => $tratamiento,
            'user' => $user,
        ]);
    }
}
