<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos.create', compact('categorias', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedors,id',
            'imagen_producto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la imagen si se subió
        if ($request->hasFile('imagen_producto')) {
            $imageName = time().'.'.$request->imagen_producto->extension();
            $request->imagen_producto->move(public_path('images/productos'), $imageName);
            $data['imagen_producto'] = $imageName;
        }

        Producto::create($data);

        return redirect()->route('producto.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos.edit', compact('producto', 'categorias', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedors,id',
            'imagen_producto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la imagen si se subió una nueva
        if ($request->hasFile('imagen_producto')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen_producto && file_exists(public_path('images/productos/'.$producto->imagen_producto))) {
                unlink(public_path('images/productos/'.$producto->imagen_producto));
            }
            
            $imageName = time().'.'.$request->imagen_producto->extension();
            $request->imagen_producto->move(public_path('images/productos'), $imageName);
            $data['imagen_producto'] = $imageName;
        }

        $producto->update($data);

        return redirect()->route('producto.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('producto.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}