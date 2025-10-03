<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion', 
        'estado_etiqueta'
    ];

    // Opcional: Si quieres definir valores por defecto
    protected $attributes = [
        'estado_etiqueta' => 'activo',
        'descripcion' => null,
    ];

    // Opcional: Si prefieres usar $guarded en lugar de $fillable
    // protected $guarded = []; // Esto permite asignación masiva de todos los campos
}