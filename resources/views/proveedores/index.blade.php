@extends('adminlte::page')

@section('title', 'Lista de Proveedores')

@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Proveedor
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

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>RFC</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre_empresa }}</td>
                        <td>{{ $proveedor->rfc }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>
                            <span class="badge badge-{{ $proveedor->estatus_proveedor == 'activo' ? 'success' : ($proveedor->estatus_proveedor == 'inactivo' ? 'warning' : 'danger') }}">
                                {{ ucfirst($proveedor->estatus_proveedor) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop