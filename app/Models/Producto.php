<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'precio', // FALTABA
        'stock',
        'imagen_producto',
        'video_producto',
        'estado_producto',
        'etiqueta_id', // CORREGIDO: era 'etiqueta_id' no 'etiqueta_id'
        'proveedores_id' // CORREGIDO: en la migración es 'proveedores_id'
    ];

    // Relaciones
    public function etiqueta()
    {
        return $this->belongsTo(Etiqueta::class, 'etiqueta_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedores_id');
    }
}