@extends('adminlte::page')

@section('title', 'Editar Orden')

@section('content_header')
    <h1>Editar Orden</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ordenes.update', $orden->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_orden">Fecha de Orden *</label>
                            <input type="date" name="fecha_orden" id="fecha_orden" 
                                   class="form-control @error('fecha_orden') is-invalid @enderror" 
                                   value="{{ old('fecha_orden', $orden->fecha_orden->format('Y-m-d')) }}" required>
                            @error('fecha_orden')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clientes_id">Cliente *</label>
                            <select name="clientes_id" id="clientes_id" 
                                    class="form-control @error('clientes_id') is-invalid @enderror" required>
                                <option value="">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" 
                                        {{ old('clientes_id', $orden->clientes_id) == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('clientes_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Estado *</label>
                            <select name="estado" id="estado" 
                                    class="form-control @error('estado') is-invalid @enderror" required>
                                <option value="Pendiente" {{ old('estado', $orden->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="Procesando" {{ old('estado', $orden->estado) == 'Procesando' ? 'selected' : '' }}>Procesando</option>
                                <option value="Enviado" {{ old('estado', $orden->estado) == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="Entregado" {{ old('estado', $orden->estado) == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                <option value="Cancelado" {{ old('estado', $orden->estado) == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="metodo_pago">Método de Pago *</label>
                            <select name="metodo_pago" id="metodo_pago" 
                                    class="form-control @error('metodo_pago') is-invalid @enderror" required>
                                <option value="Efectivo" {{ old('metodo_pago', $orden->metodo_pago) == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="Tarjeta" {{ old('metodo_pago', $orden->metodo_pago) == 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                                <option value="Transferencia" {{ old('metodo_pago', $orden->metodo_pago) == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                            </select>
                            @error('metodo_pago')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="total">Total *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" step="0.01" name="total" id="total" 
                               class="form-control @error('total') is-invalid @enderror" 
                               value="{{ old('total', $orden->total) }}" required>
                    </div>
                    @error('total')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mostrar productos de la orden (solo lectura) -->
                <div class="form-group">
                    <label>Productos en la Orden</label>
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Orden
                    </button>
                    <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop