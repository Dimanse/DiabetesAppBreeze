<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Glucemia;
use App\Models\GlucemiaComentario;

class VerGlucemias extends Component
{
    // public $glucemias;
    public $user;
    public function mount( $user)
    {
        $this->user = $user;
        // $this->glucemias = $glucemias;

    }

    public function render()
    {

        // $comentarios = GlucemiaComentario::where('glucemia_id', $this->glucemia->id)->get();
        // dd($this->user);

        $glucemias = Glucemia::where('user_id', $this->user->id)->latest('fecha')->latest('hora')->paginate(9);
        // dd($glucemias);
        return view('livewire.ver-glucemias', [
            'glucemias' => $glucemias,
        ]);
    }
}
