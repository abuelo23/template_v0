@extends('layout.index')

@section('title', 'Página Principal')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Hello card</h5>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Crear Nuevo Usuario
        </button>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Oficina</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        {{-- Cambia el color de la fila si el usuario está inactivo --}}
                        <tr class="{{ !$user->is_active ? 'table-secondary text-muted' : '' }}">
                            <td>{{ $user->id }}</td>
                            <td>
                                @if ($user->is_active)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>{{ $user->cedula }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->apellido }}</td>
                            <td>{{ $user->usuario }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->oficina }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Editar</a>
                                
                                {{-- Formulario para activar/desactivar --}}
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="form-activate-deactivate">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm {{ $user->is_active ? 'btn-danger' : 'btn-success' }}">
                                        {{ $user->is_active ? 'Desactivar' : 'Activar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="cedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" required>
                        </div>
                        <div class="col-md-6">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="col-md-6">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="oficina" class="form-label">Oficina</label>
                            <input type="text" class="form-control" id="oficina" name="oficina">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Scripts para SweetAlert2 --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Reemplazar la confirmación de activar/desactivar
    const forms = document.querySelectorAll('.form-activate-deactivate');
    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Detener el envío del formulario
            
            const button = this.querySelector('button[type="submit"]');
            const actionText = button.textContent.trim().toLowerCase();

            Swal.fire({
                title: '¿Estás seguro?',
                text: `¡Confirmas que quieres ${actionText} a este usuario!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Sí, ¡${actionText}!`,
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Si se confirma, enviar el formulario
                }
            });
        });
    });

    // 2. Mostrar alertas de éxito desde la sesión de Laravel
    @if (session('status') === 'user-created')
        Swal.fire({
            title: '¡Creado!',
            text: 'El usuario ha sido creado exitosamente.',
            icon: 'success'
        });
    @endif

    @if (session('message'))
        Swal.fire({
            title: '¡Hecho!',
            text: '{{ session('message') }}',
            icon: 'success'
        });
    @endif
});
</script>
@endsection
