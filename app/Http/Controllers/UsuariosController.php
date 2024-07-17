<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Historia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public $termino;

    public $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino)
    {
        $this->termino = $termino;

    }
    public function index()
    {
        // $users = DB::table('users')->get();
        // $users = User::all();



        $users = User::when($this->termino, function($query){
            $query->where('nombre', 'LIKE','%' . $this->termino . '%');
        })->get();
        // $follower = $user->followers;
        // dd($user);
        // $glucemia = $user->glucemia;
        // dd($glucemia);
        // $user = User::find(auth()->user()->id);
        // $historia = Historia::where('user_id', auth()->user()->id)->get();
        // dd($historia);
        return view('usuarios.index', [
            'users' => $users,
            // 'historia' => $historia,
        ]);
    }
}
