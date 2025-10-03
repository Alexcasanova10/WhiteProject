@extends('adminlte::page')

@section('title', 'Crear Nuevo Producto')

@section('content_header')
    <h1>Crear Nuevo Producto</h1>
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
                        <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
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

                            <div class="form-group">
                                <label for="nombre_producto">Nombre del Producto *</label>
                                <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror" 
                                       id="nombre_producto" name="nombre_producto" 
                                       value="{{ old('nombre_producto') }}" required>
                                @error('nombre_producto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                          id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio">Precio *</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
                                                   id="precio" name="precio" value="{{ old('precio') }}" required min="0">
                                        </div>
                                        @error('precio')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stock">Stock *</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                                               id="stock" name="stock" value="{{ old('stock') }}" required min="0">
                                        @error('stock')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="categoria_id">Categoría *</label>
                                <select class="form-control @error('categoria_id') is-invalid @enderror" 
                                        id="categoria_id" name="categoria_id" required>
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" 
                                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="proveedor_id">Proveedor *</label>
                                <select class="form-control @error('proveedor_id') is-invalid @enderror" 
                                        id="proveedor_id" name="proveedor_id" required>
                                    <option value="">Seleccione un proveedor</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}" 
                                            {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                            {{ $proveedor->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('proveedor_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="estado_producto">Estado del Producto</label>
                                <select class="form-control @error('estado_producto') is-invalid @enderror" 
                                        id="estado_producto" name="estado_producto">
                                    <option value="activo" {{ old('estado_producto', 'activo') == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ old('estado_producto') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    <option value="agotado" {{ old('estado_producto') == 'agotado' ? 'selected' : '' }}>Agotado</option>
                                </select>
                                @error('estado_producto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="imagen_producto">Imagen del Producto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('imagen_producto') is-invalid @enderror" 
                                           id="imagen_producto" name="imagen_producto" accept="image/*">
                                    <label class="custom-file-label" for="imagen_producto">Seleccionar imagen...</label>
                                </div>
                                @error('imagen_producto')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Formatos permitidos: jpeg, png, jpg, gif. Tamaño máximo: 2MB
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="video_producto">Video del Producto (URL)</label>
                                <input type="url" class="form-control @error('video_producto') is-invalid @enderror" 
                                       id="video_producto" name="video_producto" 
                                       value="{{ old('video_producto') }}" 
                                       placeholder="https://ejemplo.com/video.mp4">
                                @error('video_producto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Opcional: Ingresa la URL de un video del producto
                                </small>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Guardar Producto
                                </button>
                                <a href="{{ route('producto.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Cancelar
                                </a>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-undo"></i> Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Información Adicional</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h6><i class="fas fa-info-circle"></i> Campos Requeridos</h6>
                            <small>Todos los campos marcados con (*) son obligatorios.</small>
                        </div>
                        <div class="alert alert-warning">
                            <h6><i class="fas fa-exclamation-triangle"></i> Recomendaciones</h6>
                            <small>
                                <ul class="mb-0 pl-3">
                                    <li>Usa imágenes de buena calidad</li>
                                    <li>Verifica los precios antes de guardar</li>
                                    <li>Actualiza el stock regularmente</li>
                                </ul>
                            </small>
                        </div>
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
        .invalid-feedback {
            display: block;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
    </style>
@stop

@section('js')
    <script>
        // Mostrar el nombre del archivo seleccionado
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Seleccionar imagen...';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });

        // Validación en tiempo real para precio y stock
        document.getElementById('precio').addEventListener('input', function(e) {
            if (this.value < 0) {
                this.value = 0;
            }
        });

        document.getElementById('stock').addEventListener('input', function(e) {
            if (this.value < 0) {
                this.value = 0;
            }
        });

        // Confirmación antes de enviar el formulario
        document.querySelector('form').addEventListener('submit', function(e) {
            const precio = document.getElementById('precio').value;
            const stock = document.getElementById('stock').value;
            
            if (precio <= 0) {
                e.preventDefault();
                alert('El precio debe ser mayor a 0');
                return false;
            }
            
            if (stock < 0) {
                e.preventDefault();
                alert('El stock no puede ser negativo');
                return false;
            }
        });
    </script>
@stop