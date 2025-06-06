@extends('layouts.app2')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva acta de posesión (MEDIDAS Y COLINDANCIAS)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style> body {
            background: linear-gradient(to right, #f2f2f2, #e9ecef);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .encabezado {
            background-color: #28a745;
            color: white;
            padding: 1.1rem 1rem;
            margin-top: 10px;
            margin-bottom: 40px;
            width: 100vw;
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

        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-acta {
            background-color: #fff;
            padding: 30px 35px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
            margin: 40px auto;
            max-width: 950px;
        }

       .header-acta {
    background-color: rgb(237, 240, 240);
    color:rgb(75, 74, 74);
    padding: 16px 22px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center; /* <-- Esto centra horizontalmente */
    text-align: center;       /* <-- Esto asegura que el texto esté centrado */
    margin-bottom: 30px;
}


        .header-acta h2 {
            font-size: 1.9rem;
            font-weight: 700;
            margin: 0;
        }

        .form-label i {
            margin-right: 6px;
            color: #014221;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 15px;
            color: #014221;
            border-bottom: 2px solid #014221;
            padding-bottom: 6px;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 6px;
            background-color: #f9f9f9;
            transition: 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: #014221;
            background-color: #fff;
            box-shadow: 0 0 0 0.15rem rgba(1, 66, 33, 0.25);
        }

        .btn-guardar {
            background-color: #014221;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            padding: 10px 34px;
            border-radius: 6px;
            transition: 0.3s ease-in-out;
        }

        .btn-guardar:hover {
            background-color: #002e17;
        }

        input[type="file"] {
            background-color: #fafafa;
            padding: 7px 10px;
        }

        @media (max-width: 576px) {
            .container-acta {
                padding: 20px;
                margin: 30px 10px;
            }

            .header-acta h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<!-- Cajón verde con ancho completo y más pegado arriba -->
<div class="encabezado">
    <h2 class="titulo-principal mb-0">
        <i class="bi bi-file-earmark-text-fill me-2"></i>
        Nueva acta de posesión (MEDIDAS Y COLINDANCIAS)
    </h2>
</div>
<div class="container-acta">
    <div class="header-acta">
        <i class="bi bi-file-earmark-text-fill fs-3"></i>
    <h2>Formulario de Acta de Posesión</h2>
</div>


    <form action="/procesar-formulario" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="section-title">Información General</div>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label"><i class=""></i># Folio</label>
                <input type="text" name="folio" class="form-control" placeholder="Ej: 00125" required>
            </div>
            <div class="col-md-4">
                <label class="form-label"><i class="bi bi-clock"></i>Hora</label>
                <input type="time" name="hora" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label"><i class="bi bi-calendar-day"></i>Día</label>
                <input type="text" name="dia" class="form-control" placeholder="Ej: 15" required>
            </div>
            <div class="col-md-4">
                <label class="form-label"><i class="bi bi-calendar-month"></i>Mes</label>
                <input type="text" name="mes" class="form-control" placeholder="Ej: Junio" required>
            </div>
            <div class="col-md-4">
                <label class="form-label"><i class="bi bi-calendar2"></i>Año</label>
                <input type="number" name="anio" class="form-control" placeholder="Ej: 2025" required>
            </div>
        </div>

        <div class="section-title">Personas Involucradas</div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-person-dash"></i>Nombre de quien cede</label>
                <input type="text" name="nombre_cede" class="form-control" placeholder="Ej: Juan Pérez Gómez" required>
            </div>
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-person-check"></i>Nombre de quien recibe</label>
                <input type="text" name="nombre_recibe" class="form-control" placeholder="Ej: María López Ríos" required>
            </div>
            <div class="col-12">
                <label class="form-label"><i class="bi bi-geo-alt-fill"></i>Colonia</label>
                <input type="text" name="colonia" class="form-control" placeholder="Ej: Col. Centro" required>
            </div>
        </div>

        <div class="section-title">Medidas y Colindancias</div>
        @php
            $lados = ['Norte', 'Sur', 'Oriente', 'Poniente'];
        @endphp
        @foreach ($lados as $lado)
        <div class="row g-3 mb-2">
            <div class="col-md-6">
                <label class="form-label">{{ $lado }} – Medida (m)</label>
                <input type="text" name="{{ strtolower($lado) }}_medida" class="form-control" placeholder="Ej: 15.5" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">{{ $lado }} – Colindancia</label>
                <input type="text" name="{{ strtolower($lado) }}_colindancia" class="form-control" placeholder="Ej: Calle Reforma" required>
            </div>
        </div>
        @endforeach

        <div class="section-title">Firmas del Comisariado</div>
        <p class="text-muted mb-3">Seleccione las imágenes escaneadas de las firmas correspondientes:</p>
        @php
            $firmas = [
                'firma1' => 'Presidente del Comisariado Ejidal',
                'firma2' => 'Secretario del Comisariado Ejidal',
                'firma3' => 'Tesorero del Comisariado Ejidal',
            ];
        @endphp
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-upload"></i>Firma del vigilante</label>
                <input type="file" name="firma_vigilante" class="form-control" accept="image/*" required>
            </div>
            @foreach ($firmas as $key => $nombre)
                <div class="col-md-6">
                    <label class="form-label"><i class="bi bi-upload"></i>Firma – {{ $nombre }}</label>
                    <input type="file" name="{{ $key }}" class="form-control" accept="image/*" required>
                </div>
            @endforeach
        </div>

        <div class="section-title mt-4">Firmas de Cede y Recibe</div>
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-pencil-fill"></i>Firma de quien cede</label>
                <input type="file" name="firma_cede" class="form-control" accept="image/*" required>
            </div>
            <div class="col-md-6">
                <label class="form-label"><i class="bi bi-pencil-fill"></i>Firma de quien recibe</label>
                <input type="file" name="firma_recibe" class="form-control" accept="image/*" required>
            </div>
        </div>

        <div class="text-center mt-5">
            <button type="submit" class="btn btn-success btn-guardar">
                <i class="bi bi-save me-2"></i>Guardar Acta
            </button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
