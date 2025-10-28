@extends('adminlte::page')

@section('title', 'Lista de Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('producto.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Producto
            </a>
        </div>
        <div class="card-body">
            @if($productos->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Etiqueta</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>
                            <span class="badge badge-{{ $producto->stock > 10 ? 'success' : ($producto->stock > 0 ? 'warning' : 'danger') }}">
                                {{ $producto->stock }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $producto->estado_producto == 'activo' ? 'success' : ($producto->estado_producto == 'inactivo' ? 'secondary' : 'warning') }}">
                                {{ ucfirst($producto->estado_producto) }}
                            </span>
                        </td>
                        <td>{{ $producto->etiqueta->nombre ?? 'N/A' }}</td>
                        <td>{{ $producto->proveedor->nombre_empresa ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('producto.show', $producto->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                No hay productos registrados.
            </div>
            @endif
        </div>
    </div>
@stop