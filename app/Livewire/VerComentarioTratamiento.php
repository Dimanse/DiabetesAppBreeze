<?php

namespace App\Livewire;

use App\Notifications\NuevoComentarioTratamiento;
use Livewire\Component;
use App\Models\ComentarioTratamiento;
use App\Notifications\NuevoComentario;

class VerComentarioTratamiento extends Component
{
    public $tratamiento;
    public $user;
    public $comentario;
    public function mount($tratamiento, $user)
    {
        $this->tratamiento = $tratamiento;
        $this->user = $user;
    }

    protected $rules = [
        'comentario' => 'required',
    ];

    public function crearComentario()
    {
        // dd($this->glucemia->id);
        $datos = $this->validate();

        ComentarioTratamiento::create([
            'comentario' => $datos['comentario'],
            'user_id' => auth()->user()->id,
            'tratamiento_id' => $this->tratamiento->id,
        ]);

        $this->user->notify(new NuevoComentarioTratamiento($this->comentario, $this->tratamiento->nombre, $this->tratamiento->id, auth()->user()->id));

        session()->flash('mensaje', 'Comentario realizado correctamente');
        return redirect()->route('tratamientos.show', $this->user);
    }
    public function eliminarComentario(ComentarioTratamiento $comentario)
    {
        // dd($control->id);
        $comentario->delete();
        return redirect()->back();

    }
    public function render()
    {
        return view('livewire.ver-comentario-tratamiento');
    }
}
