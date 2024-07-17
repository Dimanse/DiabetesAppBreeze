<?php

namespace App\Livewire;

use Livewire\Component;

class VerCitaComentario extends Component
{
    public $user;
    public $cita;

    public function mount($cita, $user)
    {
        $this->cita = $cita;
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.ver-cita-comentario');
    }
}
