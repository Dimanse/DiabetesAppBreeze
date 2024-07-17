<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioTratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tratamiento_id',
        'comentario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
