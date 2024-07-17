<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cita;
use App\Models\Genero;
use App\Models\Glucemia;
use App\Models\Historia;
use App\Notifications\NuevoComentario;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function glucemia()
    {
        return $this->belongsTo(Glucemia::class);
    }
    public function glucemias()
    {
        return $this->hasMany(Glucemia::class);
    }

    public function tratamiento()
    {
        return $this->hasMany(Tratamiento::class);
    }

	public function cita()
    {
        return $this->hasMany(Cita::class);
    }


    public function historia()
    {
        return $this->hasOne(Historia::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'generos', 'genero');
    }



    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    // Almacenar los que seguimos
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    // Comprobar si un usuario ya sigue a otro
    public function siguiendo(User $user)
    {
        return $this->followers->contains( $user->id );
    }



}
