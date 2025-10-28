@extends('adminlte::page')

@section('title', 'Detalles del Cliente')

@section('content_header')
    <h1>Detalles del Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $cliente->nombre }} {{ $cliente->apellido }}</h3>
            <div class="card-tools">
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Personal</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $cliente->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $cliente->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Apellido:</th>
                            <td>{{ $cliente->apellido }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $cliente->email }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $cliente->telefono }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Dirección</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Dirección:</th>
                            <td>{{ $cliente->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Municipio:</th>
                            <td>{{ $cliente->municipio }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>{{ $cliente->estado }}</td>
                        </tr>
                        <tr>
                            <th>Código Postal:</th>
                            <td>{{ $cliente->cp }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado:</th>
                            <td>{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop