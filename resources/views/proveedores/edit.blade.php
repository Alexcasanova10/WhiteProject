@extends('adminlte::page')

@section('title', 'Editar Proveedor')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre_empresa">Nombre de la Empresa:</label>
                    <input type="text" name="nombre_empresa" id="nombre_empresa" 
                           class="form-control @error('nombre_empresa') is-invalid @enderror" 
                           value="{{ old('nombre_empresa', $proveedor->nombre_empresa) }}" required>
                    @error('nombre_empresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rfc">RFC:</label>
                    <input type="text" name="rfc" id="rfc" 
                           class="form-control @error('rfc') is-invalid @enderror" 
                           value="{{ old('rfc', $proveedor->rfc) }}" 
                           maxlength="13" required>
                    @error('rfc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" 
                           class="form-control @error('domicilio') is-invalid @enderror" 
                           value="{{ old('domicilio', $proveedor->domicilio) }}" required>
                    @error('domicilio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" id="ciudad" 
                           class="form-control @error('ciudad') is-invalid @enderror" 
                           value="{{ old('ciudad', $proveedor->ciudad) }}" required>
                    @error('ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cp">Código Postal:</label>
                    <input type="text" name="cp" id="cp" 
                           class="form-control @error('cp') is-invalid @enderror" 
                           value="{{ old('cp', $proveedor->cp) }}" 
                           maxlength="5" required>
                    @error('cp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono" 
                           class="form-control @error('telefono') is-invalid @enderror" 
                           value="{{ old('telefono', $proveedor->telefono) }}" 
                           maxlength="10" required>
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $proveedor->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña (dejar en blanco para no cambiar):</label>
                    <input type="password" name="password" id="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Ingresa nueva contraseña solo si deseas cambiarla">
                    <small class="form-text text-muted">Mínimo 8 caracteres</small>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estatus_proveedor">Estatus del Proveedor:</label>
                    <select name="estatus_proveedor" id="estatus_proveedor" 
                            class="form-control @error('estatus_proveedor') is-invalid @enderror" required>
                        <option value="activo" {{ old('estatus_proveedor', $proveedor->estatus_proveedor) == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estatus_proveedor', $proveedor->estatus_proveedor) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        <option value="suspendido" {{ old('estatus_proveedor', $proveedor->estatus_proveedor) == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                    </select>
                    @error('estatus_proveedor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Proveedor
                    </button>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // Validación para solo números en teléfono y CP
        document.getElementById('telefono').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        document.getElementById('cp').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Validación para RFC (solo mayúsculas, números y guiones)
        document.getElementById('rfc').addEventListener('input', function(e) {
            this.value = this.value.toUpperCase().replace(/[^A-Z0-9-]/g, '');
        });

        // Mostrar/ocultar contraseña
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
@stop