@extends('adminlte::page')

@section('title', 'Detalles del Producto')

@section('content_header')
    <h1>Detalles del Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $producto->nombre_producto }}</h3>
            <div class="card-tools">
                <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('producto.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información General</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $producto->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $producto->nombre_producto }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $producto->descripcion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Precio:</th>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Stock:</th>
                            <td>
                                <span class="badge badge-{{ $producto->stock > 10 ? 'success' : ($producto->stock > 0 ? 'warning' : 'danger') }}">
                                    {{ $producto->stock }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge badge-{{ $producto->estado_producto == 'activo' ? 'success' : ($producto->estado_producto == 'inactivo' ? 'secondary' : 'warning') }}">
                                    {{ ucfirst($producto->estado_producto) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Información Relacional</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Etiqueta:</th>
                            <td>{{ $producto->etiqueta->nombre ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Proveedor:</th>
                            <td>{{ $producto->proveedor->nombre_empresa ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Imagen:</th>
                            <td>
                                @if($producto->imagen_producto)
                                    <img src="{{ asset('images/productos/' . $producto->imagen_producto) }}" 
                                         alt="Imagen del producto" style="max-width: 200px; max-height: 200px;">
                                @else
                                    <span class="text-muted">Sin imagen</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Video:</th>
                            <td>
                                @if($producto->video_producto)
                                    <video controls style="max-width: 200px; max-height: 200px;">
                                        <source src="{{ asset('videos/productos/' . $producto->video_producto) }}" type="video/mp4">
                                        Tu navegador no soporta el elemento video.
                                    </video>
                                @else
                                    <span class="text-muted">Sin video</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado:</th>
                            <td>{{ $producto->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop