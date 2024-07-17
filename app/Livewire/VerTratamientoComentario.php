<?php

namespace App\Livewire;

use Livewire\Component;

class VerTratamientoComentario extends Component
{
    public $user;
    public $tratamiento;

    public function mount($tratamiento, $user)
    {
        $this->tratamiento = $tratamiento;
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.ver-tratamiento-comentario');
    }
}
