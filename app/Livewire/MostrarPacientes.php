<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class MostrarPacientes extends Component
{
    public $termino;

    public $listeners = ['terminosBusqueda' => 'buscar'];
    public function buscar($termino)
    {
        $this->termino = $termino;
    }
    public function render()
    {

        $users = User::when($this->termino, function($query){
            $query->where('name', 'LIKE','%' . $this->termino . '%');
        })->paginate(10);
        return view('livewire.mostrar-pacientes', [
            'users' => $users,
        ]);
    }
}
