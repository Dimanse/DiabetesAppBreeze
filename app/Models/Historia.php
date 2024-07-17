<?php

namespace App\Models;

use App\Models\User;
use App\Models\Genero;
use App\Models\LikeHistoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historia extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'imagen',
        'genero_id',
        'fecha_nacimiento',
        'peso',
        'estatura',
        'alergias',
        'antecedentes_familiares',
        'enfermedades_cronicas',
        'procedimientos_quirurgicos',
        'condiciones_pasadas',
        'doctor',
        'clinica',
        'observaciones',
        'user_id'
        
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function likes()
    {
        return $this->hasMany(LikeHistoria::class);
    }

    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    

}
