<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Glucemia;
use Illuminate\Http\Request;

class GlucemiasController extends Controller
{
    public function index()
    {
        // dd($user);
        $user = User::find(auth()->user()->id);
        return view('glucemias.index',[
            'user' => $user,
        ]);
    }

    public function store()
    {
        $user = User::find(auth()->user()->id);
        return view('glucemias.create', [
            'user' => $user,
        ]);
    }

    public function show(User $user)
    {
        // dd($user->glucemia);
        // $glucemias = Glucemia::where('user_id', $user->id)->latest('fecha')->latest('hora')->paginate(9);
        // dd($glucemias);
        return view('glucemias.show', [
            'user' => $user,
            // 'glucemias' => $glucemias,

        ]);
    }

    public function edit(Glucemia $glucemia)
    {
        $user = User::find(auth()->user()->id);
        return view('glucemias.edit', [
            'glucemia' => $glucemia,
            'user' => $user,
        ]);
    }
}
