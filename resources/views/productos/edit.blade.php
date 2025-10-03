@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Información del Producto</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('producto.update', $producto->id) }}" method="post" enctype="multipart/form-data">
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

                            <div class="form-group">
                                <label for="nombre_producto">Nombre del Producto *</label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" 
                                       value="{{ old('nombre_producto', $producto->nombre_producto) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" 
                                          rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio">Precio *</label>
                                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" 
                                               value="{{ old('precio', $producto->precio) }}" required min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock">Stock *</label>
                                        <input type="number" class="form-control" id="stock" name="stock" 
                                               value="{{ old('stock', $producto->stock) }}" required min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="categoria_id">Categoría *</label>
                                <select class="form-control" id="categoria_id" name="categoria_id" required>
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" 
                                            {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="proveedor_id">Proveedor *</label>
                                <select class="form-control" id="proveedor_id" name="proveedor_id" required>
                                    <option value="">Seleccione un proveedor</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}" 
                                            {{ old('proveedor_id', $producto->proveedor_id) == $proveedor->id ? 'selected' : '' }}>
                                            {{ $proveedor->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="imagen_producto">Imagen del Producto</label>
                                
                                @if($producto->imagen_producto)
                                    <div class="mb-2">
                                        <img src="{{ asset('images/productos/' . $producto->imagen_producto) }}" 
                                             alt="Imagen actual" style="max-width: 200px; max-height: 200px;">
                                        <br>
                                        <small>Imagen actual</small>
                                    </div>
                                @endif

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen_producto" name="imagen_producto"
                                           accept="image/*">
                                    <label class="custom-file-label" for="imagen_producto">
                                        {{ $producto->imagen_producto ? 'Cambiar imagen...' : 'Seleccionar imagen...' }}
                                    </label>
                                </div>
                                <small class="form-text text-muted">
                                    Formatos permitidos: jpeg, png, jpg, gif. Tamaño máximo: 2MB
                                </small>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Actualizar Producto
                                </button>
                                <a href="{{ route('producto.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .custom-file-input:lang(es) ~ .custom-file-label::after {
            content: "Buscar";
        }
    </style>
@stop

@section('js')
    <script>
        // Mostrar el nombre del archivo seleccionado
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("imagen_producto").files[0]?.name || 'Seleccionar imagen...';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
@stop