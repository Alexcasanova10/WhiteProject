@extends('adminlte::page')

@section('title', 'Crear Proveedor')

@section('content_header')
    <h1>Crear Nuevo Proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nombre_empresa">Nombre de la Empresa:</label>
                    <input type="text" name="nombre_empresa" id="nombre_empresa" 
                           class="form-control @error('nombre_empresa') is-invalid @enderror" 
                           value="{{ old('nombre_empresa') }}" required>
                    @error('nombre_empresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rfc">RFC:</label>
                    <input type="text" name="rfc" id="rfc" 
                           class="form-control @error('rfc') is-invalid @enderror" 
                           value="{{ old('rfc') }}" 
                           maxlength="13" required>
                    @error('rfc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" 
                           class="form-control @error('domicilio') is-invalid @enderror" 
                           value="{{ old('domicilio') }}" required>
                    @error('domicilio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" id="ciudad" 
                           class="form-control @error('ciudad') is-invalid @enderror" 
                           value="{{ old('ciudad') }}" required>
                    @error('ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cp">Código Postal:</label>
                    <input type="text" name="cp" id="cp" 
                           class="form-control @error('cp') is-invalid @enderror" 
                           value="{{ old('cp') }}" 
                           maxlength="5" required>
                    @error('cp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono" 
                           class="form-control @error('telefono') is-invalid @enderror" 
                           value="{{ old('telefono') }}" 
                           maxlength="10" required>
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estatus_proveedor">Estatus del Proveedor:</label>
                    <select name="estatus_proveedor" id="estatus_proveedor" 
                            class="form-control @error('estatus_proveedor') is-invalid @enderror" required>
                        <option value="activo" {{ old('estatus_proveedor') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estatus_proveedor') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        <option value="suspendido" {{ old('estatus_proveedor') == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                    </select>
                    @error('estatus_proveedor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Proveedor
                    </button>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        // Mismo JavaScript que en la vista edit para validaciones
        document.getElementById('telefono').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        document.getElementById('cp').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        document.getElementById('rfc').addEventListener('input', function(e) {
            this.value = this.value.toUpperCase().replace(/[^A-Z0-9-]/g, '');
        });
    </script>
@stop