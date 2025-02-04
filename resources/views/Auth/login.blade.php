<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa; /* Fondo claro */
        }

        .card {
            width: 100%;
            max-width: 450px; /* Ajuste el tamaño de la tarjeta */
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background: #fff;
            text-align: center;
        }

        .card h3 {
            font-size: 1.8rem; /* Ajusté el tamaño del título */
            margin-bottom: 20px;
            color: #212529; /* Color de texto oscuro */
        }

        .card p {
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 10px;
            background-color: #eef2f7; /* Fondo claro para los campos */
            font-size: 16px;
            height: 45px; /* Ajuste de la altura de los campos */
        }

        .form-control:focus {
            border-color: #0d6efd; /* Color del borde al hacer foco */
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.3); /* Sombra de foco */
        }

        .btn-success {
            border-radius: 8px;
            font-size: 18px;
            height: 45px; /* Ajuste de la altura del botón */
            transition: all 0.3s ease;
            background-color: #28a745; /* Color de fondo del botón */
            border: none;
        }

        .btn-success:hover {
            background-color: #218838; /* Color al pasar el mouse */
            transform: translateY(-3px);
        }

        .footer {
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
        }

        .footer-link {
            text-decoration: none;
            color: #0d6efd;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #0056b3;
        }

        .recover-password {
            font-size: 0.9rem;
            color: #0d6efd;
            text-decoration: none;
        }

        .recover-password:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card">
        <h3 class="fw-bold">Plataforma Ejidal Villa de Huetamo </h3>
        <p>Accede a tu cuenta para continuar</p>

        <div class="text-center my-3">
            <img src="{{ asset('imagenes/logolog.png') }}" alt="Logo" style="width: 120px;">
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="correo" class="form-label fw-semibold">Correo Electrónico</label>
                <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" value="{{ old('correo') }}" required>
                @error('correo')
                    <div class="text-danger mt-2" style="font-size: 12px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="user_pass" class="form-label fw-semibold">Contraseña</label>
                <input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="Ingresa tu contraseña" required>
                @error('user_pass')
                    <div class="text-danger mt-2" style="font-size: 12px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success fw-bold">Ingresar</button>
            </div>
        </form>

        <!-- Enlace de recuperación de contraseña -->
        <div class="mt-3">
            <a href="#" class="recover-password">¿Olvidaste tu contraseña?</a>
        </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
