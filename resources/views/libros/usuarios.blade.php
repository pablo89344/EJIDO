@extends('layouts.app2')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .table th {
            background-color: #f8f9fa;
            text-align: left;
        }
        .btn-custom {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .container {
            margin-top: 200px;
        }
        .boton{margin-top: 50px;}
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="mb-3">
        <div class="boton">
            <button type="button" class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#modalCrearUsuario">
                <i class="bi bi-person-plus"></i> Crear nuevo usuario
            </button>
        </div>
    </div>
        
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Número de Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->user_name }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>{{ $usuario->numero_telefono }}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm btn-custom"
                        data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"
                        onclick="cargarDatosModal(
                            {{ $usuario->id }}, 
                            '{{ $usuario->user_name }}',
                            '{{ $usuario->correo }}',
                            '{{ $usuario->direccion }}',
                            '{{ $usuario->numero_telefono }}',
                            '{{ $usuario->user_tipo }}'
                        )">
                        <i class="bi bi-pencil-square"></i> Editar
                    </button>
        
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')" class="btn btn-danger btn-sm btn-custom">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal para editar usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                <!-- Este botón cierra el modal automáticamente -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarUsuario" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="edit_user_id" name="id">

                    <div class="mb-3">
                        <label for="edit_user_name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="edit_user_name" name="user_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_user_pass" class="form-label">Nueva Contraseña (Opcional):</label>
                        <input type="password" class="form-control" id="edit_user_pass" name="user_pass">
                    </div>
                    <div class="mb-3">
                        <label for="edit_correo" class="form-label">Correo:</label>
                        <input type="email" class="form-control" id="edit_correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_direccion" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" id="edit_direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_numero_telefono" class="form-label">Número de Teléfono:</label>
                        <input type="text" class="form-control" id="edit_numero_telefono" name="numero_telefono" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_user_tipo" class="form-label">Tipo de Usuario:</label>
                        <select class="form-control" id="edit_user_tipo" name="user_tipo" required>
                            <option value="1">Administrador</option>
                            <option value="0">Secretario</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
                        <label for="user_pass" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="user_pass" name="user_pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo:</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero_telefono" class="form-label">Número de Teléfono:</label>
                        <input type="text" class="form-control" id="numero_telefono" name="numero_telefono" required>
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

<script>
function cargarDatosModal(id, nombre, correo, direccion, telefono, tipo) {
    document.getElementById("edit_user_id").value = id;
    document.getElementById("edit_user_name").value = nombre;
    document.getElementById("edit_correo").value = correo;
    document.getElementById("edit_direccion").value = direccion;
    document.getElementById("edit_numero_telefono").value = telefono;
    document.getElementById("edit_user_tipo").value = tipo;

    document.getElementById("formEditarUsuario").action = "/usuarios/" + id;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
