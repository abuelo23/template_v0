@extends('layout.index')

@section('title', 'Editar Usuario')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Editar Usuario: {{ $user->nombre }} {{ $user->apellido }}</h5>
    </div>
    <div class="card-body">

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="cedula" name="cedula" value="{{ old('cedula', $user->cedula) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo', $user->codigo) }}">
                </div>
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $user->nombre) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido', $user->apellido) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" value="{{ old('usuario', $user->usuario) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="oficina" class="form-label">Oficina</label>
                    <input type="text" class="form-control @error('oficina') is-invalid @enderror" id="oficina" name="oficina" value="{{ old('oficina', $user->oficina) }}">
                </div>
                <div class="col-md-6">
                    <hr>
                    <p class="text-muted">Dejar en blanco para no cambiar la contraseña.</p>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar usuario</button>
            </div>
        </form>
    </div>
</div>

{{-- Script para mostrar errores de validación con SweetAlert2 --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    @if ($errors->any())
        let errorMessages = `
            <ul class="list-group list-group-flush text-start">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        `;

        Swal.fire({
            title: '<strong>Error de Validación</strong>',
            icon: 'error',
            html: errorMessages,
            focusConfirm: false,
            confirmButtonText: 'Entendido'
        });
    @endif
});
</script>
@endsection
