<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComentarioCita extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cita_id',
        'comentario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
