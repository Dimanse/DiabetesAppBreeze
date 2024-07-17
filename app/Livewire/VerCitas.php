<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Cita;
use Livewire\Component;

class VerCitas extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        // dd(Carbon::now()->isoFormat('dddd D \d\e MMMM \d\e\l Y')); //"lunes 15 de julio del 2024"

        // dd(Carbon::now()->toTimeString()); //"15:30:27"
        // dd(Carbon::now()->Format('d-m-Y')); //"15-07-2024"
        $citas = Cita::where('user_id', $this->user->id)->latest('hora')->paginate(6);
        // dd( $citas[0]->fecha || $citas[0]->hora);
        return view('livewire.ver-citas', [
            'citas' => $citas,
        ]);
    }
}
