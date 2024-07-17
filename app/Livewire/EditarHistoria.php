<?php

namespace App\Livewire;

use App\Models\Genero;
use Livewire\Component;
use App\Models\Historia;
use Livewire\WithFileUploads;

class EditarHistoria extends Component
{
    public $historia_id;
    public $nombre;
    public $imagen;
    public $genero_id;
    public $fecha_nacimiento;
    public $peso;
    public $estatura;
    public $alergias;
    public $antecedentes_familiares;
    public $enfermedades_cronicas;
    public $procedimientos_quirurgicos;
    public $condiciones_pasadas;
    public $doctor;
    public $clinica;
    public $observaciones;
    public $imagen_nueva;


    use WithFileUploads;

    protected $rules = [
        'nombre' => 'required',
        'imagen_nueva' => 'nullable|image',
        'genero_id' => 'required',
        'fecha_nacimiento' => 'required',
        'peso' => 'required',
        'estatura' => 'required',
        'alergias' => 'nullable',
        'antecedentes_familiares' => 'nullable',
        'enfermedades_cronicas' => 'nullable',
        'procedimientos_quirurgicos' => 'nullable',
        'condiciones_pasadas' => 'nullable',
        'doctor' => 'required',
        'clinica' => 'required',
        'observaciones' => 'nullable',
    ];


    public function mount(Historia $historia)
    {
        $this->historia_id = $historia->id;
        $this->nombre = $historia->nombre;
        $this->imagen = $historia->imagen;
        $this->genero_id = $historia->genero_id;
        $this->fecha_nacimiento = $historia->fecha_nacimiento;
        $this->peso = $historia->peso;
        $this->estatura = $historia->estatura;
        $this->alergias = $historia->alergias ?? '';
        $this->antecedentes_familiares = $historia->antecedentes_familiares ?? '';
        $this->enfermedades_cronicas = $historia->enfermedades_cronicas ?? '';
        $this->procedimientos_quirurgicos = $historia->procedimientos_quirurgicos ?? '';
        $this->condiciones_pasadas = $historia->condiciones_pasadas ?? '';
        $this->doctor = $historia->doctor;
        $this->clinica = $historia->clinica;
        $this->observaciones = $historia->observaciones ?? '';


        // dd($historial);
    }

    public function editHistoria()
    {
        $datos = $this->validate();

        // Si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/imagenes');
            $datos['imagen'] = str_replace('public/imagenes/', '', $imagen);
        }

        // Encontrar la informacion a editar
            $historia = Historia::find($this->historia_id);

        // Asignar los valores
            $historia->nombre = $datos['nombre'];
            $historia->imagen = $datos['imagen'] ?? $historia->imagen;
            $historia->genero_id = $datos['genero_id'];
            $historia->fecha_nacimiento = $datos['fecha_nacimiento'];
            $historia->peso = $datos['peso'];
            $historia->estatura = $datos['estatura'];
            $historia->alergias = $datos['alergias'];
            $historia->antecedentes_familiares = $datos['antecedentes_familiares'];
            $historia->enfermedades_cronicas = $datos['enfermedades_cronicas'];
            $historia->procedimientos_quirurgicos = $datos['procedimientos_quirurgicos'];
            $historia->condiciones_pasadas = $datos['condiciones_pasadas'];
            $historia->doctor = $datos['doctor'];
            $historia->clinica = $datos['clinica'];
            $historia->observaciones = $datos['observaciones'];
        // Guardar el perfil
            $historia->save();
        //crear un mensaje
        session()->flash('mensaje', 'Tu historia ha sido
        actualizada correctamente');

        // Redireccionar al usuario
        return redirect()->route('historia.index');
    }
    public function render()
    {
        $generos = Genero::all();
        return view('livewire.editar-historia', [
            'generos' => $generos,
        ]);
    }
}
