<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clientes'; // CORREGIDO: era 'productos'

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'municipio',
        'estado', // FALTABA
        'cp',
        'telefono',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación con órdenes
    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'clientes_id');
    }
}