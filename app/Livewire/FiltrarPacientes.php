<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FiltrarPacientes extends Component
{
    public $termino;

    public function leerDatosFormulario()
    {
        // dd('Buscando');
        $this->dispatch('terminosBusqueda', $this->termino);
    }
    public function render()
    {

        return view('livewire.filtrar-pacientes', [

        ]);
    }
}
