<?php

namespace App\Livewire;

use App\Models\Horario;
use Livewire\Component;
use App\Models\Glucemia;

class EditarGlucemia extends Component
{

    public $glucemia_id;
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
        'comentario_hora' => 'required',
        'glucemia' => 'required',
        'observaciones' => 'nullable',
    ];
    public function mount(Glucemia $glucemia)
    {
        $this->glucemia_id = $glucemia->id;
        $this->fecha = $glucemia->fecha;
        $this->hora = $glucemia->hora;
        $this->horario_id = $glucemia->horario_id;
        $this->comentario_hora = $glucemia->comentario_hora;
        $this->glucemia = $glucemia->glucemia;
        $this->observaciones = $glucemia->observaciones;
    }

    public function editarGlucemia()
    {
        $datos = $this->validate();

        // Encontrar la glucemia a editar
            $glucemia = Glucemia::find($this->glucemia_id);
        // Asignar los valores
            $glucemia->fecha = $datos['fecha'];
            $glucemia->hora = $datos['hora'];
            $glucemia->horario_id = $datos['horario_id'];
            $glucemia->comentario_hora = $datos['comentario_hora'];
            $glucemia->glucemia = $datos['glucemia'];
            $glucemia->observaciones = $datos['observaciones'];
        // Guardar la glucemia
            $glucemia->save();
        //crear un mensaje
        session()->flash('mensaje', 'Tu glucemia ha sido
        actualizada correctamente');

        // Redireccionar al usuario
        return redirect()->route('glucemias.index');
    }
    public function render()
    {

        $horarios = Horario::all();
        return view('livewire.editar-glucemia', [
            'horarios' => $horarios,
        ]);
    }
}
