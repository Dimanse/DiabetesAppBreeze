<?php

namespace App\Livewire;

use App\Models\Glucemia;
use Livewire\Component;

class VerGrafica extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        $glucemias = Glucemia::where('user_id', $this->user->id)->pluck('fecha', 'glucemia');
        $labels = $glucemias->keys();
        $data = $glucemias->values();
        // dd($data);
        return view('livewire.ver-grafica', [
            'glucemias' => $glucemias,
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
