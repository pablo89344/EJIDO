@extends('layouts.app2')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { background-color: #f4f6f9; }
        .encabezado {
            background-color: #28a745;
            color: white;
            padding: 1rem 0rem;
            margin-bottom: 40px;
            width: 100vw;
            text-align: center;
            margin-top: 12px;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }
        .titulo-principal {
            font-size: 2.2rem;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.05);
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(47, 137, 26, 0.05);
        }
        .table thead { background-color: #6c757d; color: #fff; }
        .card-header { background-color: #6c757d !important; color: white; }
        .btn-primary {
            background-color: #495057;
            border-color: #495057;
        }
        .btn-primary:hover {
            background-color: #343a40;
            border-color: #343a40;
        }
        .btn-success {
            background-color: #3ca86b;
            border-color: #3ca86b;
        }
        .btn-success:hover {
            background-color: #2e8d57;
            border-color: #2e8d57;
        }
        .modal-header {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

<!-- Encabezado -->
<div class="encabezado">
    <h2 class="titulo-principal mb-0">
        <i class="fas fa-users icono"></i> Panel de Administración de Usuarios
    </h2>
</div>

<div class="container py-4">

    <!-- Formulario agregar -->
    <div class="card mb-4">
        <div class="card-header"><i class="bi bi-person-plus-fill"></i> Agregar Nuevo Usuario</div>
        <div class="card-body">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label"><i class="bi bi-person-fill"></i> Nombre de Usuario</label>
                        <input type="text" name="user_name" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><i class="bi bi-key-fill"></i> Contraseña</label>
                        <input type="password" name="user_pass" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><i class="bi bi-person-badge-fill"></i> Tipo de Usuario</label>
                        <select name="user_tipo" class="form-select" required>
                            <option value="0">Usuario</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><i class="bi bi-envelope-fill"></i> Correo</label>
                        <input type="email" name="correo" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><i class="bi bi-geo-alt-fill"></i> Dirección</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><i class="bi bi-telephone-fill"></i> Teléfono</label>
                        <input type="text" name="numero_telefono" class="form-control" required>
                    </div>
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i> Guardar Usuario</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabla usuarios -->
    <div class="card">
        <div class="card-header"><i class="bi bi-people-fill"></i> Listado de Usuarios</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><i class="bi bi-person-fill"></i> Nombre</th>
                        <th><i class="bi bi-envelope-fill"></i> Correo</th>
                        <th><i class="bi bi-geo-alt-fill"></i> Dirección</th>
                        <th><i class="bi bi-telephone-fill"></i> Teléfono</th>
                        <th><i class="bi bi-shield-lock-fill"></i> Tipo</th>
                        <th><i class="bi bi-tools"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->user_name }}</td>
                        <td>{{ $usuario->correo }}</td>
                        <td>{{ $usuario->direccion }}</td>
                        <td>{{ $usuario->numero_telefono }}</td>
                        <td>{{ $usuario->user_tipo == 1 ? 'Administrador' : 'Usuario' }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $usuario->id }}">
                                <i class="bi bi-pencil-fill"></i> Editar
                            </button>

                            <!-- Modal editar -->
                            <div class="modal fade" id="editModal{{ $usuario->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Editar Usuario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label"><i class="bi bi-person-fill"></i> Nombre</label>
                                                    <input type="text" name="user_name" class="form-control" value="{{ $usuario->user_name }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label"><i class="bi bi-key-fill"></i> Nueva Contraseña</label>
                                                    <input type="password" name="user_pass" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label"><i class="bi bi-person-badge-fill"></i> Tipo</label>
                                                    <select name="user_tipo" class="form-select" required>
                                                        <option value="0" {{ $usuario->user_tipo == 0 ? 'selected' : '' }}>Usuario</option>
                                                        <option value="1" {{ $usuario->user_tipo == 1 ? 'selected' : '' }}>Administrador</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label"><i class="bi bi-envelope-fill"></i> Correo</label>
                                                    <input type="email" name="correo" class="form-control" value="{{ $usuario->correo }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label"><i class="bi bi-geo-alt-fill"></i> Dirección</label>
                                                    <input type="text" name="direccion" class="form-control" value="{{ $usuario->direccion }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label"><i class="bi bi-telephone-fill"></i> Teléfono</label>
                                                    <input type="text" name="numero_telefono" class="form-control" value="{{ $usuario->numero_telefono }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                                                <button type="submit" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón Eliminar con SweetAlert -->
                            <form method="POST" class="d-inline form-eliminar" action="{{ route('usuarios.destroy', $usuario->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-eliminar"><i class="bi bi-trash-fill"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($usuarios->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-muted">No hay usuarios registrados.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // SweetAlert2 para eliminar
    document.querySelectorAll('.btn-eliminar').forEach(boton => {
        boton.addEventListener('click', function () {
            const form = this.closest('form');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Toasts para feedback
    @if(session('success'))
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    @endif

    @if(session('deleted'))
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '{{ session('deleted') }}',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    @endif
</script>
</body>
</html>
@endsection
