<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Orden_Info;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = Orden::with(['cliente', 'orden_info'])->get();
        return view('ordenes.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::where('estado_producto', 'activo')->where('stock', '>', 0)->get();
        return view('ordenes.create', compact('clientes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_orden' => 'required|date',
            'estado' => 'required|string|in:Pendiente,Procesando,Enviado,Entregado,Cancelado',
            'metodo_pago' => 'required|string|in:Efectivo,Tarjeta,Transferencia',
            'total' => 'required|numeric|min:0',
            'clientes_id' => 'required|exists:clientes,id',
            'productos' => 'required|array|min:1',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio' => 'required|numeric|min:0',
        ]);

        // Crear la orden
        $orden = Orden::create([
            'fecha_orden' => $request->fecha_orden,
            'estado' => $request->estado,
            'metodo_pago' => $request->metodo_pago,
            'total' => $request->total,
            'clientes_id' => $request->clientes_id,
        ]);

        // Crear los detalles de la orden
        foreach ($request->productos as $productoData) {
            $subtotal = $productoData['cantidad'] * $productoData['precio'];
            
            Orden_Info::create([
                'orden_id' => $orden->id,
                'productos_id' => $productoData['id'],
                'cantidad' => $productoData['cantidad'],
                'precio' => $productoData['precio'],
                'subtotal' => $subtotal,
            ]);

            // Actualizar stock del producto
            $producto = Producto::find($productoData['id']);
            $producto->decrement('stock', $productoData['cantidad']);
        }

        return redirect()->route('ordenes.index')
                         ->with('success', 'Orden creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orden = Orden::with(['cliente', 'orden_info.producto'])->findOrFail($id);
        return view('ordenes.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orden = Orden::with(['orden_info'])->findOrFail($id);
        $clientes = Cliente::all();
        $productos = Producto::where('estado_producto', 'activo')->get();
        return view('ordenes.edit', compact('orden', 'clientes', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orden = Orden::findOrFail($id);

        $request->validate([
            'fecha_orden' => 'required|date',
            'estado' => 'required|string|in:Pendiente,Procesando,Enviado,Entregado,Cancelado',
            'metodo_pago' => 'required|string|in:Efectivo,Tarjeta,Transferencia',
            'total' => 'required|numeric|min:0',
            'clientes_id' => 'required|exists:clientes,id',
        ]);

        $orden->update([
            'fecha_orden' => $request->fecha_orden,
            'estado' => $request->estado,
            'metodo_pago' => $request->metodo_pago,
            'total' => $request->total,
            'clientes_id' => $request->clientes_id,
        ]);

        return redirect()->route('ordenes.index')
                         ->with('success', 'Orden actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orden = Orden::findOrFail($id);
        
        // Restaurar stock de productos - CORREGIDO: orden_info en lugar de ordenInfo
        foreach ($orden->orden_info as $detalle) {
            $producto = Producto::find($detalle->productos_id);
            if ($producto) {
                $producto->increment('stock', $detalle->cantidad);
            }
        }
        
        $orden->delete();

        return redirect()->route('ordenes.index')
                         ->with('success', 'Orden eliminada exitosamente.');
    }
}