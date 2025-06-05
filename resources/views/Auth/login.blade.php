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
            background-color: #f8f9fa;
        }

        .card {
            width: 90%; /* Se ajusta al tamaño de la pantalla */
            max-width: 450px;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background: #fff;
            text-align: center;
        }

        .card h3 {
            font-size: 1.6rem;
            margin-bottom: 15px;
            color: #212529;
        }

        .card p {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            background-color: #eef2f7;
            font-size: 16px;
            height: 45px;
        }

        .btn-success {
            border-radius: 8px;
            font-size: 16px;
            height: 45px;
            transition: all 0.3s ease;
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .footer {
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
        }

        @media (max-width: 576px) {
            .card {
                padding: 20px;
            }

            .card h3 {
                font-size: 1.4rem;
            }

            .form-control {
                font-size: 14px;
                height: 40px;
            }

            .btn-success {
                font-size: 14px;
                height: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <h3 class="fw-bold">Plataforma Ejidal Villa de Huetamo</h3>
        <p>Accede a tu cuenta para continuar</p>

        <div class="text-center my-3">
            <img src="{{ asset('imagenes/logolog.png') }}" alt="Logo" style="width: 100px;">
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="correo" class="form-label fw-semibold">Correo Electrónico</label>
                <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" value="{{ old('correo') }}" required>
                @error('correo')
                    <div class="text-danger mt-2" style="font-size: 12px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="user_pass" class="form-label fw-semibold">Contraseña</label>
                <input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="Ingresa tu contraseña" required>
                @error('user_pass')
                    <div class="text-danger mt-2" style="font-size: 12px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success fw-bold">Ingresar</button>
            </div>
        </form>

        <div class="mt-3">
            <a href="#" class="text-primary" style="font-size: 0.9rem;">¿Olvidaste tu contraseña?</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
