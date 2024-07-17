<?php

namespace App\Models;

use App\Models\User;
use App\Models\Horario;
use App\Models\GlucemiaComentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Glucemia extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'horario_id',
        'comentario_hora',
        'glucemia',
        'observaciones',
        'user_id'
    ];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
    {
        return $this->hasMany(GlucemiaComentario::class);
    }

    public function likes()
    {
        return $this->hasMany(LikeGlucemia::class);
    }

    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
