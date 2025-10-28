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
                                <label for="etiqueta_id">Etiqueta *</label>
                                <select class="form-control @error('etiqueta_id') is-invalid @enderror" 
                                        id="etiqueta_id" name="etiqueta_id" required>
                                    <option value="">Seleccione una etiqueta</option>
                                    @foreach($etiquetas as $etiqueta)
                                        <option value="{{ $etiqueta->id }}" 
                                            {{ old('etiqueta_id') == $etiqueta->id ? 'selected' : '' }}>
                                            {{ $etiqueta->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('etiqueta_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="proveedores_id">Proveedor *</label>
                                <select class="form-control @error('proveedores_id') is-invalid @enderror" 
                                        id="proveedores_id" name="proveedores_id" required>
                                    <option value="">Seleccione un proveedor</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}" 
                                            {{ old('proveedores_id') == $proveedor->id ? 'selected' : '' }}>
                                            {{ $proveedor->nombre_empresa }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('proveedores_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="estado_producto">Estado del Producto *</label>
                                <select class="form-control @error('estado_producto') is-invalid @enderror" 
                                        id="estado_producto" name="estado_producto" required>
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
                                <label for="video_producto">Video del Producto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('video_producto') is-invalid @enderror" 
                                           id="video_producto" name="video_producto" accept="video/*">
                                    <label class="custom-file-label" for="video_producto">Seleccionar video...</label>
                                </div>
                                @error('video_producto')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Formatos permitidos: mp4, mov, avi. Tamaño máximo: 10MB
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
        </div>
    </div>
@stop