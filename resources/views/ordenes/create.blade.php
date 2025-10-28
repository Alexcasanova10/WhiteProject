@extends('adminlte::page')

@section('title', 'Crear Orden')

@section('content_header')
    <h1>Crear Nueva Orden</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ordenes.store') }}" method="POST" id="ordenForm">
                @csrf
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

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
                                   value="{{ old('fecha_orden', date('Y-m-d')) }}" required>
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
                                    <option value="{{ $cliente->id }}" {{ old('clientes_id') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido }} - {{ $cliente->email }}
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
                                <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="Procesando" {{ old('estado') == 'Procesando' ? 'selected' : '' }}>Procesando</option>
                                <option value="Enviado" {{ old('estado') == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="Entregado" {{ old('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                <option value="Cancelado" {{ old('estado') == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
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
                                <option value="Efectivo" {{ old('metodo_pago') == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="Tarjeta" {{ old('metodo_pago') == 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                                <option value="Transferencia" {{ old('metodo_pago') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                            </select>
                            @error('metodo_pago')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Sección de Productos -->
                <div class="form-group">
                    <label>Productos *</label>
                    <div id="productos-container">
                        <div class="producto-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="productos[0][id]" class="form-control producto-select" required>
                                            <option value="">Seleccione un producto</option>
                                            @foreach($productos as $producto)
                                                <option value="{{ $producto->id }}" 
                                                        data-precio="{{ $producto->precio }}"
                                                        data-stock="{{ $producto->stock }}">
                                                    {{ $producto->nombre_producto }} - ${{ number_format($producto->precio, 2) }} (Stock: {{ $producto->stock }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="productos[0][cantidad]" class="form-control cantidad-input" 
                                               min="1" value="1" required placeholder="Cantidad">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" step="0.01" name="productos[0][precio]" 
                                               class="form-control precio-input" readonly placeholder="Precio unitario">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger btn-sm remove-producto">×</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-producto" class="btn btn-secondary btn-sm">
                        <i class="fas fa-plus"></i> Agregar Producto
                    </button>
                </div>

                <div class="form-group">
                    <label for="total">Total *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" step="0.01" name="total" id="total" 
                               class="form-control @error('total') is-invalid @enderror" 
                               value="{{ old('total', 0) }}" readonly required>
                    </div>
                    @error('total')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Orden
                    </button>
                    <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
<script>
    let productoIndex = 1;

    // Agregar producto
    document.getElementById('add-producto').addEventListener('click', function() {
        const container = document.getElementById('productos-container');
        const newProducto = document.querySelector('.producto-item').cloneNode(true);
        
        // Actualizar índices
        const inputs = newProducto.querySelectorAll('select, input');
        inputs.forEach(input => {
            const name = input.getAttribute('name').replace('[0]', `[${productoIndex}]`);
            input.setAttribute('name', name);
            if (input.type !== 'hidden') {
                input.value = '';
            }
        });
        
        // Reset valores
        newProducto.querySelector('.cantidad-input').value = 1;
        newProducto.querySelector('.precio-input').value = '';
        
        container.appendChild(newProducto);
        productoIndex++;
    });

    // Remover producto
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-producto')) {
            if (document.querySelectorAll('.producto-item').length > 1) {
                e.target.closest('.producto-item').remove();
                calcularTotal();
            }
        }
    });

    // Cambio de producto
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('producto-select')) {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            const stock = selectedOption.getAttribute('data-stock');
            
            const productoItem = e.target.closest('.producto-item');
            const cantidadInput = productoItem.querySelector('.cantidad-input');
            const precioInput = productoItem.querySelector('.precio-input');
            
            precioInput.value = precio;
            
            // Establecer máximo según stock
            cantidadInput.setAttribute('max', stock);
            
            calcularTotal();
        }
    });

    // Cambio de cantidad
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('cantidad-input')) {
            const productoItem = e.target.closest('.producto-item');
            const precioInput = productoItem.querySelector('.precio-input');
            const precio = parseFloat(precioInput.value) || 0;
            const cantidad = parseInt(e.target.value) || 0;
            
            if (cantidad > parseInt(e.target.max)) {
                e.target.value = e.target.max;
            }
            
            calcularTotal();
        }
    });

    // Calcular total
    function calcularTotal() {
        let total = 0;
        document.querySelectorAll('.producto-item').forEach(item => {
            const cantidad = parseInt(item.querySelector('.cantidad-input').value) || 0;
            const precio = parseFloat(item.querySelector('.precio-input').value) || 0;
            total += cantidad * precio;
        });
        document.getElementById('total').value = total.toFixed(2);
    }
</script>
@stop