<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Glucemia;

class MostrarGlucemias extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
        // dd($user);
    }
    public function eliminarGlucemia(Glucemia $glucemia)
    {
        // dd($control->id);
        $glucemia->delete();

    }
    public function render()
    {
        $glucemias = Glucemia::where('user_id', auth()->user()->id)->latest('fecha')->latest('hora')->paginate(6);
        $user = User::find(auth()->user()->id);
        // dd($user);
        // $glicemias = Glucemia::where('user_id', $user->glucemia->user_id)->latest('fecha')->latest('hora')->paginate(6);

        // dd($glicemias);
        return view('livewire.mostrar-glucemias', [
            'glucemias' => $glucemias,
            'user' => $user,
        ]);
    }
}
