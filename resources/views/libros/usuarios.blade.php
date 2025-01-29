@extends('layouts.app2')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>

    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearUsuario">
        Crear Nuevo Usuario
    </button>
    <br><br>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->user_name }}</td>
               
                    <td>
    <!-- Enlace de edición -->
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario" onclick="cargarDatosModal({{ $usuario->id }})">
        Editar
    </button> | 
    <!-- Formulario de eliminación -->
    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')" class="btn btn-danger">Eliminar</button>
    </form>
</td>

                </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal para crear nuevo usuario -->
<div class="modal fade" id="modalCrearUsuario" tabindex="-1" aria-labelledby="modalCrearUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearUsuarioLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_pass" class="form-label">Usuario_pass:</label>
                        <input type="text" class="form-control" id="user_pass" name="user_pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_tipo" class="form-label">Tipo de Usuario:</label>
                        <select class="form-control" id="user_tipo" name="user_tipo" required>
                            <option value="1">Administrador</option>
                            <option value="0">Secretario</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Indicar que es una solicitud PUT para actualizar -->
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name', $usuario->user_name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_pass" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="Dejar vacío si no se desea cambiar">
                    </div>
                    <div class="mb-3">
                        <label for="user_tipo" class="form-label">Tipo de Usuario:</label>
                        <select class="form-control" id="user_tipo" name="user_tipo" required>
                            <option value="1" {{ $usuario->user_tipo == 1 ? 'selected' : '' }}>Administrador</option>
                            <option value="0" {{ $usuario->user_tipo == 0 ? 'selected' : '' }}>Secretario</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
