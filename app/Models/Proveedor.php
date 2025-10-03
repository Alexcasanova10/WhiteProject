<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Proveedor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'proveedores'; // Especifica el nombre de la tabla

    protected $fillable = [
        'nombre_empresa',
        'rfc',
        'domicilio',
        'ciudad',
        'cp',
        'telefono',
        'email',
        'password',
        'estatus_proveedor'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}