<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_Info extends Model
{
    use HasFactory;

    protected $table = 'orden_info';

    protected $fillable = [
        'cantidad',
        'precio',
        'subtotal',
        'orden_id',
        'productos_id'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    // Relación con orden
    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_id');
    }

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'productos_id');
    }
}