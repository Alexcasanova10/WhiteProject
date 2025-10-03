@extends('adminlte::page')

@section('title', 'Editar Etiqueta')

@section('content_header')
    <h1>Editar Etiqueta: {{ $etiqueta->nombre }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('etiquetas.update', $etiqueta->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre">Nombre de la Etiqueta:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $etiqueta->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3">{{ old('descripcion', $etiqueta->descripcion) }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado_etiqueta">Estado:</label>
                    <select name="estado_etiqueta" id="estado_etiqueta" class="form-control @error('estado_etiqueta') is-invalid @enderror" required>
                        <option value="activo" {{ old('estado_etiqueta', $etiqueta->estado_etiqueta) == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estado_etiqueta', $etiqueta->estado_etiqueta) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado_etiqueta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Etiqueta
                    </button>
                    <a href="{{ route('etiquetas.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop