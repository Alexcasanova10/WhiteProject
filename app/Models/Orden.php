<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'fecha_orden',
        'estado',
        'metodo_pago',
        'total',
        'clientes_id'
    ];

    protected $casts = [
        'fecha_orden' => 'date',
        'total' => 'decimal:2',
    ];

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    // Relación con orden_info (detalles de la orden) - CORREGIDO
    public function orden_info()
    {
        return $this->hasMany(Orden_Info::class, 'orden_id');
    }

    // Relación con productos a través de orden_info - CORREGIDO
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'orden_info', 'orden_id', 'productos_id')
                    ->withPivot('cantidad', 'precio', 'subtotal')
                    ->withTimestamps();
    }
}