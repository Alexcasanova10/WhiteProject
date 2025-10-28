@extends('adminlte::page')

@section('title', 'Detalles de la Orden')

@section('content_header')
    <h1>Detalles de la Orden #{{ $orden->id }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Orden #{{ $orden->id }}</h3>
            <div class="card-tools">
                <a href="{{ route('ordenes.edit', $orden->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('ordenes.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información de la Orden</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $orden->id }}</td>
                        </tr>
                        <tr>
                            <th>Fecha:</th>
                            <td>{{ $orden->fecha_orden->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
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
                        </tr>
                        <tr>
                            <th>Método de Pago:</th>
                            <td>{{ $orden->metodo_pago }}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><strong>${{ number_format($orden->total, 2) }}</strong></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Información del Cliente</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Cliente:</th>
                            <td>{{ $orden->cliente->nombre }} {{ $orden->cliente->apellido }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $orden->cliente->email }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $orden->cliente->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $orden->cliente->direccion }}, {{ $orden->cliente->municipio }}, {{ $orden->cliente->estado }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h5>Productos de la Orden</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orden->orden_info as $detalle)
                                    <tr>
                                        <td>{{ $detalle->producto->nombre_producto ?? 'N/A' }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>${{ number_format($detalle->precio, 2) }}</td>
                                        <td>${{ number_format($detalle->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                    <td><strong>${{ number_format($orden->total, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop