<?php

namespace App\Models;

use App\Models\User;
use App\Models\Glucemia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeGlucemia extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function glucemia()
    {
        return $this->belongsTo(Glucemia::class);
    }
}
