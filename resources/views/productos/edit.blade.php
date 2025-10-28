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
                                <label for="etiqueta_id">Etiqueta *</label>
                                <select class="form-control" id="etiqueta_id" name="etiqueta_id" required>
                                    <option value="">Seleccione una etiqueta</option>
                                    @foreach($etiquetas as $etiqueta)
                                        <option value="{{ $etiqueta->id }}" 
                                            {{ old('etiqueta_id', $producto->etiqueta_id) == $etiqueta->id ? 'selected' : '' }}>
                                            {{ $etiqueta->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="proveedores_id">Proveedor *</label>
                                <select class="form-control" id="proveedores_id" name="proveedores_id" required>
                                    <option value="">Seleccione un proveedor</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}" 
                                            {{ old('proveedores_id', $producto->proveedores_id) == $proveedor->id ? 'selected' : '' }}>
                                            {{ $proveedor->nombre_empresa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="estado_producto">Estado del Producto *</label>
                                <select class="form-control" id="estado_producto" name="estado_producto" required>
                                    <option value="activo" {{ old('estado_producto', $producto->estado_producto) == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ old('estado_producto', $producto->estado_producto) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    <option value="agotado" {{ old('estado_producto', $producto->estado_producto) == 'agotado' ? 'selected' : '' }}>Agotado</option>
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
                            </div>

                            <div class="form-group">
                                <label for="video_producto">Video del Producto</label>
                                
                                @if($producto->video_producto)
                                    <div class="mb-2">
                                        <video controls style="max-width: 200px; max-height: 200px;">
                                            <source src="{{ asset('videos/productos/' . $producto->video_producto) }}" type="video/mp4">
                                            Tu navegador no soporta el elemento video.
                                        </video>
                                        <br>
                                        <small>Video actual</small>
                                    </div>
                                @endif

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="video_producto" name="video_producto"
                                           accept="video/*">
                                    <label class="custom-file-label" for="video_producto">
                                        {{ $producto->video_producto ? 'Cambiar video...' : 'Seleccionar video...' }}
                                    </label>
                                </div>
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