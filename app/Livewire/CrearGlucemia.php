<?php

namespace App\Livewire;

use App\Models\Horario;
use Livewire\Component;
use App\Models\Glucemia;

class CrearGlucemia extends Component
{

    public $fecha;
    public $hora;
    public $horario_id;
    public $comentario_hora;
    public $glucemia;
    public $observaciones;



    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'horario_id' => 'required',
        'comentario_hora' => 'nullable',
        'glucemia' => 'required',
        'observaciones' => 'nullable',


    ];

    public function crearGlucemia()
    {
        $datos = $this->validate();

        // dd(auth()->user()->id);
        // return;

        Glucemia::create([
            'fecha' => $datos['fecha'],
            'hora' => $datos['hora'],
            'horario_id' => $datos['horario_id'],
            'comentario_hora' => $datos['comentario_hora'] ?? '',
            'glucemia' => $datos['glucemia'],
            'observaciones' => $datos['observaciones'] ?? '',
            'user_id' => auth()->user()->id,
        ]);

        //crear un mensaje
        session()->flash('mensaje', 'Tu glucemia ha sido guardada correctamente');

        // Redireccionar al usuario
        return redirect()->route('glucemias.index');


    }

    public function render()
    {
        $horarios = Horario::all();
        return view('livewire.crear-glucemia', [
            'horarios' => $horarios,
        ]);
    }
}
