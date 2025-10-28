<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::latest()->get();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $etiquetas = Etiqueta::latest()->get();
    //     return view('etiquetas.index', compact('etiquetas'));
    //

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'rfc' => 'required|string|max:13|unique:proveedores',
            'domicilio' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'cp' => 'required|string|size:5',
            'telefono' => 'required|string|size:10',
            'email' => 'required|email|unique:proveedores',
            'password' => 'required|string|min:8',
            'estatus_proveedor' => 'required|in:activo,inactivo,suspendido'
        ]);

        // Hashear la contraseña antes de guardar
        $validated['password'] = Hash::make($validated['password']);

        Proveedor::create($validated);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $validated = $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'rfc' => [
                'required',
                'string',
                'max:13',
                Rule::unique('proveedores')->ignore($proveedor->id)
            ],
            'domicilio' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'cp' => 'required|string|size:5',
            'telefono' => 'required|string|size:10',
            'email' => [
                'required',
                'email',
                Rule::unique('proveedores')->ignore($proveedor->id)
            ],
            'password' => 'nullable|string|min:8',
            'estatus_proveedor' => 'required|in:activo,inactivo,suspendido'
        ]);

        // Solo actualizar la contraseña si se proporcionó una nueva
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $proveedor->update($validated);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado exitosamente.');
    }
}