<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Usuarios extends Authenticatable
{
    use HasFactory;

   protected $table= 'usuarios';
   
   protected $fillable = [
        'user_name',
        'user_pass',
        'user_tipo',
        'correo',
        'direccion',
        'numero_telefono',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_pass',
    ];

    public function getAuthPassword()
    {
        return $this->user_pass;
    }

    public $timestamps = false;
}