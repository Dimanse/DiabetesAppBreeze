<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Historia;

class MostrarHistoria extends Component
{
    public function eliminarHistoria(Historia $historia)
    {
        // dd($historia->id);
        $historia->delete();
    }
    public function render()
    {
        $historia = Historia::where('user_id', auth()->user()->id)->get();
        $user = User::find(auth()->user()->id);
        // dd($historia[0]->imagen);
        return view('livewire.mostrar-historia', [
            'user' => $user,
            'historia' => $historia[0],
        ]);
    }
}
