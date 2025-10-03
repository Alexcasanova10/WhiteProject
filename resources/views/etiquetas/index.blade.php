@extends('adminlte::page')

@section('title', 'Lista de Etiquetas')

@section('content_header')
    <h1>Etiquetas</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('etiquetas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Etiqueta
            </a>
        </div>
        <div class="card-body">
            @if($etiquetas->count() > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($etiquetas as $etiqueta)
                        <tr>
                            <td>{{ $etiqueta->id }}</td>
                            <td>{{ $etiqueta->nombre }}</td>
                            <td>{{ $etiqueta->descripcion ?: 'Sin descripción' }}</td>
                            <td>
                                <span class="badge badge-{{ $etiqueta->estado_etiqueta == 'activo' ? 'success' : 'danger' }}">
                                    {{ ucfirst($etiqueta->estado_etiqueta) }}
                                </span>
                            </td>
                            <td>{{ $etiqueta->created_at->format('d/m/Y') }}</td>
                            <td width="150">
                                <a href="{{ route('etiquetas.show', $etiqueta->id) }}" class="btn btn-info btn-sm" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('etiquetas.edit', $etiqueta->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('etiquetas.destroy', $etiqueta->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta etiqueta?')">
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
                    No hay etiquetas registradas aún.
                </div>
            @endif
        </div>
    </div>
@stop

@section('css')
    <style>
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
        }
    </style>
@stop