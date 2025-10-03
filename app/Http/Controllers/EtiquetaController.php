<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etiquetas = Etiqueta::latest()->get();
        return view('etiquetas.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etiquetas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:etiquetas',
            'descripcion' => 'nullable|string|max:500',
            'estado_etiqueta' => 'required|in:activo,inactivo',
        ]);

        Etiqueta::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado_etiqueta' => $request->estado_etiqueta,
        ]);

        return redirect()->route('etiquetas.index')
                         ->with('success', 'Etiqueta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('etiquetas.show', compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('etiquetas.edit', compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etiqueta = Etiqueta::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:etiquetas,nombre,' . $etiqueta->id,
            'descripcion' => 'nullable|string|max:500',
            'estado_etiqueta' => 'required|in:activo,inactivo',
        ]);

        $etiqueta->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado_etiqueta' => $request->estado_etiqueta,
        ]);

        return redirect()->route('etiquetas.index')
                         ->with('success', 'Etiqueta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->delete();

        return redirect()->route('etiquetas.index')
                         ->with('success', 'Etiqueta eliminada exitosamente.');
    }
}