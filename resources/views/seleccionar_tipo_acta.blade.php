@extends('layouts.app2')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tipos de Actas Ejidales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #f2f2f2, #e9ecef);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Encabezado ajustado: menos margen superior y ancho completo */
        .encabezado {
            background-color: #28a745;
            color: white;
            padding: 1.1rem 1rem;
            margin-top: 10px;           /* ahora más pegado arriba */
            margin-bottom: 40px;
            width: 100vw;               /* ocupa todo el ancho del viewport */
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .titulo-principal {
            font-size: 2.2rem;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.05);
            margin: 0;
        }

        /* Resto de estilos para las tarjetas de actas */
        .card-acta {
            background-color: white;
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            text-decoration: none; /* Para que, si hay enlace, no subraye */
            color: inherit;        /* Para que el texto no cambie de color en el enlace */
        }

        .card-acta:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2rem;
            color: rgb(159, 166, 173);
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 0.75rem;
            color: rgb(62, 94, 128);
        }

        .card-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<!-- Cajón verde con ancho completo y más pegado arriba -->
<div class="encabezado">
    <h2 class="titulo-principal mb-0">
        <i class="bi bi-file-earmark-text-fill me-2"></i>
        Seleccione el tipo de acta que desea consultar o generar
    </h2>
</div>

<div class="container">
    <div class="row g-4">
        @php
            $tipos = [
                'Acta de posesión',
                'Acta de asamblea',
                'Acta de donación',
                'Acta de fallecimiento',
                'Acta de regularización',
                'Acta de usufructo',
            ];
        @endphp

        @foreach($tipos as $tipo)
            <div class="col-12 col-md-6 col-lg-4">
                @if($tipo === 'Acta de posesión')
                    {{-- Aquí envuelvo solo “Acta de posesión” en un <a> con la ruta definida --}}
                    <a href="{{ route('actaposesion') }}" class="card card-acta text-center p-4">
                        <div class="card-icon">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $tipo }}</h5>
                            <p class="card-text">Acta disponible</p>
                        </div>
                    </a>
                @else
                    {{-- Las demás tarjetas quedan sin enlace por ahora --}}
                    <div class="card card-acta text-center p-4">
                        <div class="card-icon">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $tipo }}</h5>
                            <p class="card-text">Acta disponible</p>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
