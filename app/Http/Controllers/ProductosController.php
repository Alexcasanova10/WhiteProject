<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Producto;
use App\Models\Etiqueta;
use App\Models\Proveedor;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['etiqueta', 'proveedor'])->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $etiquetas = Etiqueta::all();
        $proveedores = Proveedor::all();
        return view('productos.create', compact('etiquetas', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen_producto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_producto' => 'nullable|mimes:mp4,mov,avi|max:10240', // CORREGIDO: video validation
            'estado_producto' => 'required|string|in:activo,inactivo,agotado',
            'etiqueta_id' => 'required|exists:etiquetas,id',           
            'proveedores_id' => 'required|exists:proveedores,id', // CORREGIDO: proveedores_id
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen_producto')) {
            $imageName = time().'.'.$request->imagen_producto->extension();
            $request->imagen_producto->move(public_path('images/productos'), $imageName);
            $data['imagen_producto'] = $imageName;
        }

        // Manejar el video
        if ($request->hasFile('video_producto')) {
            $videoName = time().'_video.'.$request->video_producto->extension();
            $request->video_producto->move(public_path('videos/productos'), $videoName);
            $data['video_producto'] = $videoName;
        }

        Producto::create($data);

        return redirect()->route('producto.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    public function show(string $id)
    {
        $producto = Producto::with(['etiqueta', 'proveedor'])->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $etiquetas = Etiqueta::all(); // CORREGIDO: etiquetas no categorias
        $proveedores = Proveedor::all();
        return view('productos.edit', compact('producto', 'etiquetas', 'proveedores'));
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'etiqueta_id' => 'required|exists:etiquetas,id', // CORREGIDO
            'proveedores_id' => 'required|exists:proveedores,id', // CORREGIDO
            'imagen_producto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_producto' => 'nullable|mimes:mp4,mov,avi|max:10240',
            'estado_producto' => 'required|string|in:activo,inactivo,agotado',
        ]);

        $data = $request->all();

        // Manejar nueva imagen
        if ($request->hasFile('imagen_producto')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen_producto && file_exists(public_path('images/productos/'.$producto->imagen_producto))) {
                unlink(public_path('images/productos/'.$producto->imagen_producto));
            }
            
            $imageName = time().'.'.$request->imagen_producto->extension();
            $request->imagen_producto->move(public_path('images/productos'), $imageName);
            $data['imagen_producto'] = $imageName;
        }

        // Manejar nuevo video
        if ($request->hasFile('video_producto')) {
            // Eliminar video anterior si existe
            if ($producto->video_producto && file_exists(public_path('videos/productos/'.$producto->video_producto))) {
                unlink(public_path('videos/productos/'.$producto->video_producto));
            }
            
            $videoName = time().'_video.'.$request->video_producto->extension();
            $request->video_producto->move(public_path('videos/productos'), $videoName);
            $data['video_producto'] = $videoName;
        }

        $producto->update($data);

        return redirect()->route('producto.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        
        // Eliminar archivos físicos
        if ($producto->imagen_producto && file_exists(public_path('images/productos/'.$producto->imagen_producto))) {
            unlink(public_path('images/productos/'.$producto->imagen_producto));
        }
        
        if ($producto->video_producto && file_exists(public_path('videos/productos/'.$producto->video_producto))) {
            unlink(public_path('videos/productos/'.$producto->video_producto));
        }
        
        $producto->delete();

        return redirect()->route('producto.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}