<?php

namespace App\Livewire;

use App\Notifications\NuevoComentarioGlucemia;
use Livewire\Component;
use App\Models\GlucemiaComentario;

class ComentarioGlucemia extends Component
{
    public $glucemia;
    public $user;
    public $comentario;
    public function mount($glucemia, $user)
    {
        $this->glucemia = $glucemia;
        $this->user = $user;
    }

    protected $rules = [
        'comentario' => 'required',
    ];

    public function crearComentario()
    {
        // dd($this->glucemia->id);
        $datos = $this->validate();

        GlucemiaComentario::create([
            'comentario' => $datos['comentario'],
            'user_id' => auth()->user()->id,
            'glucemia_id' => $this->glucemia->id,
        ]);

        $this->user->notify(new NuevoComentarioGlucemia($this->comentario, $this->glucemia->fecha, $this->glucemia->id, auth()->user()->id));

        session()->flash('mensaje', 'Comentario realizado correctamente');
        return redirect()->route('glucemias.show', $this->user);

    }
    public function eliminarComentario(GlucemiaComentario $comentario)
    {
        // dd($control->id);
        $comentario->delete();
        return redirect()->back();

    }
    public function render()
    {
        return view('livewire.comentario-glucemia');
    }
}
