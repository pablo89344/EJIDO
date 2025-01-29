
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <!-- Enlace a la hoja de estilos de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <!-- Sección de inicio de sesión -->
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 custom-margin">

        <div class="text-center mb-3">
            <h1 class="fw-bold text-dark" style="font-size: 30px;">Bienvenido</h1>
            <p class="text-muted" style="font-size: 14px;">Por favor, inicia sesión para continuar</p>
        </div>

      <!-- Contenedor para la imagen del logo -->
      <div class="text-center mb-4">
        <img src="{{ asset(path: 'imagenes/logolog.png') }}" class="imgtop img-fluid" alt="Imagen logo" style="max-width: 150px;">
        </div>

        <!-- Contenedor principal del formulario de inicio de sesión -->
        <div class="card shadow-sm p-3" style="width: 100%; max-width: 350px; border-radius: 12px;">
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Token de seguridad -->

                <!-- Campo de nombre de usuario -->
                <div class="mb-2">
                    <label for="user_name" class="form-label fw-semibold" style="font-size: 14px;">Nombre de Usuario</label>
                    <input type="text" class="form-control form-control-sm" id="user_name" name="user_name" placeholder="Ingresa tu usuario" required>
                </div>

                <!-- Campo de contraseña -->
                <div class="mb-2">
                    <label for="user_pass" class="form-label fw-semibold" style="font-size: 14px;">Contraseña</label>
                    <input type="password" class="form-control form-control-sm" id="user_pass" name="user_pass" placeholder="Ingresa tu contraseña" required>
                </div>

                <!-- Botón de Login -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-sm fw-bold">login</button>
                </div>
            </form>

            <!-- Mostrar errores si existen -->
            @if ($errors->any())
                <div class="alert alert-danger mt-2" role="alert" style="font-size: 12px;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>

    <!-- Pie de página -->
    <footer class="text-center text-muted py-2 border-top" style="font-size: 12px;">
        <small>&copy; 2024 - SDEVH - <a href="/Privacy" class="text-decoration-none">Privacidad</a></small>
    </footer>

    <style>
        /* Personalización de estilos */
        body {
            font-family: 'Inter', Arial, sans-serif;
            font-size: 14px; /* Tamaño de fuente global */
            background-color: #f8fafc;
        }

        .custom-margin {
            margin-top: 35px; /* Ajusta este valor según tus necesidades */
        }

        .form-control {
            border-radius: 8px;
            background-color: #f1f5f9;
            font-size: 13px; /* Reduce el tamaño de texto de los campos */
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.3);
        }

        .btn-success {
            border-radius: 8px;
            font-size: 13px; /* Reduce el tamaño del texto en el botón */
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .btn-success:hover {
            background-color: #198754;
            transform: scale(1.05);
        }

        .card {
            background-color: #ffffff;
            border: none;
        }

        footer a {
            color: #0d6efd;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Scripts de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
