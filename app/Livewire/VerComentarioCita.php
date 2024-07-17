<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ComentarioCita;
use App\Notifications\NuevoComentario;

class VerComentarioCita extends Component
{
    public $cita;
    public $user;
    public $comentario;
    public function mount($cita, $user)
    {
        $this->cita = $cita;
        $this->user = $user;
    }

    protected $rules = [
        'comentario' => 'required',
    ];

    public function crearComentario()
    {
        // dd($this->glucemia->id);
        $datos = $this->validate();

        ComentarioCita::create([
            'comentario' => $datos['comentario'],
            'user_id' => auth()->user()->id,
            'cita_id' => $this->cita->id,
        ]);

        $this->user->notify(new NuevoComentario($this->comentario, $this->cita->consulta, $this->cita->id, auth()->user()->id));

        session()->flash('mensaje', 'Comentario realizado correctamente');
        return redirect()->route('citas.show', $this->user);
    }
    public function eliminarComentario(ComentarioCita $comentario)
    {
        // dd($control->id);
        $comentario->delete();
        return redirect()->back();

    }
    public function render()
    {
        return view('livewire.ver-comentario-cita');
    }
}
