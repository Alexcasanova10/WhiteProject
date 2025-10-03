@extends('adminlte::page')

@section('title', 'Detalles del Proveedor')

@section('content_header')
    <h1>Detalles del Proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $proveedor->nombre_empresa }}</h3>
            <div class="card-tools">
                <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary btn-sm">
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
                            <td>{{ $proveedor->id }}</td>
                        </tr>
                        <tr>
                            <th>Empresa:</th>
                            <td>{{ $proveedor->nombre_empresa }}</td>
                        </tr>
                        <tr>
                            <th>RFC:</th>
                            <td>{{ $proveedor->rfc }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $proveedor->email }}</td>
                        </tr>
                        <tr>
                            <th>Estatus:</th>
                            <td>
                                <span class="badge badge-{{ $proveedor->estatus_proveedor == 'activo' ? 'success' : ($proveedor->estatus_proveedor == 'inactivo' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($proveedor->estatus_proveedor) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Información de Contacto</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Domicilio:</th>
                            <td>{{ $proveedor->domicilio }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad:</th>
                            <td>{{ $proveedor->ciudad }}</td>
                        </tr>
                        <tr>
                            <th>Código Postal:</th>
                            <td>{{ $proveedor->cp }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $proveedor->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $proveedor->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Actualizado:</th>
                            <td>{{ $proveedor->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop