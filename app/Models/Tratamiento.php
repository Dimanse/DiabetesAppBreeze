<?php

namespace App\Models;

use App\Models\User;
use App\Models\ComentarioTratamiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora',
        'nombre',
        'gramos',
        'imagen',
        'cantidad',
        'recetado',
        'cuando',
        'observaciones',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comentarios()
    {
        return $this->hasMany(ComentarioTratamiento::class);
    }
}
