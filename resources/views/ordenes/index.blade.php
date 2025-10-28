@extends('adminlte::page')

@section('title', 'Lista de Órdenes')

@section('content_header')
    <h1>Órdenes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('ordenes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Orden
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($ordenes->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Método Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $orden)
                    <tr>
                        <td>{{ $orden->id }}</td>
                        <td>{{ $orden->fecha_orden->format('d/m/Y') }}</td>
                        <td>{{ $orden->cliente->nombre }} {{ $orden->cliente->apellido }}</td>
                        <td>${{ number_format($orden->total, 2) }}</td>
                        <td>
                            <span class="badge badge-{{ 
                                $orden->estado == 'Entregado' ? 'success' : 
                                ($orden->estado == 'Cancelado' ? 'danger' : 
                                ($orden->estado == 'Procesando' ? 'warning' : 
                                ($orden->estado == 'Enviado' ? 'info' : 'secondary'))) 
                            }}">
                                {{ $orden->estado }}
                            </span>
                        </td>
                        <td>{{ $orden->metodo_pago }}</td>
                        <td>
                            <a href="{{ route('ordenes.show', $orden->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('ordenes.edit', $orden->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('ordenes.destroy', $orden->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta orden?')">
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
                No hay órdenes registradas.
            </div>
            @endif
        </div>
    </div>
@stop