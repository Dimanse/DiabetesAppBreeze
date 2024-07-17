<?php

namespace App\Models;

use App\Models\ComentarioCita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'clinica',
        'consulta',
        'doctor',
        'sala',
        'observaciones',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioCita::class);
    }
}
