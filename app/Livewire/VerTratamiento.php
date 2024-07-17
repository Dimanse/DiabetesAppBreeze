<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tratamiento;

class VerTratamiento extends Component
{
    public $user;
    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        $tratamientos = Tratamiento::where('user_id', $this->user->id)->latest('hora')->paginate(10);
        // dd($tratamientos);
        return view('livewire.ver-tratamiento', [
            'tratamientos' => $tratamientos,
        ]);
    }
}
