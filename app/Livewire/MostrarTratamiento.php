<?php

namespace App\Livewire;

use App\Models\Tratamiento;
use Livewire\Component;

class MostrarTratamiento extends Component
{
    public function eliminarTratamiento(Tratamiento $tratamiento)
    {
        // dd($control->id);
        $tratamiento->delete();
    }
    public function render()
    {
        $tratamientos = Tratamiento::where('user_id', auth()->user()->id)->latest('hora')->paginate(10);
        return view('livewire.mostrar-tratamiento', [
            'tratamientos' => $tratamientos,
        ]);
    }
}
