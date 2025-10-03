@extends('adminlte::page')

@section('title', 'Ver Etiqueta')

@section('content_header')
    <h1>Detalles de la Etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información de la Etiqueta</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $etiqueta->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $etiqueta->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $etiqueta->descripcion ?: 'Sin descripción' }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <span class="badge badge-{{ $etiqueta->estado_etiqueta == 'activo' ? 'success' : 'danger' }}">
                                    {{ ucfirst($etiqueta->estado_etiqueta) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $etiqueta->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado:</th>
                            <td>{{ $etiqueta->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('etiquetas.edit', $etiqueta->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('etiquetas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la lista
                </a>
            </div>
        </div>
    </div>
@stop