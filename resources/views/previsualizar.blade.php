@extends('layouts.app2')

@section('content')
<!-- Bootstrap 5 + Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .header-bar-full {
        background-color: #28a745;
        color: white;
        padding: 1rem 1rem;
        margin-top: 10px;
        margin-bottom: 40px;
        width: 100vw;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .header-bar-full h2 {
        font-weight: 700;
        font-size: 2.1rem;
        margin-bottom: 0.5rem;
    }

    .header-bar-full p {
        font-size: 1.1rem;
        margin: 0;
    }

    .info-box {
        background-color: #ffffff;
        border-left: 6px solidrgb(74, 81, 77);
        border-radius: 12px;
        padding: 1.5rem 2rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        margin-bottom: 2.5rem;
    }

    .info-box h5 {
        font-weight: 600;
        font-size: 1.3rem;
        color: #343a40;
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .label {
        color: #6c757d;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 0.2rem;
    }

    .value {
        color: #212529;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .icon-circle {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .custom-btn-warning {
        background: linear-gradient(135deg, #ffc107, #ffca2c);
        color: #212529;
        font-weight: 600;
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(255, 193, 7, 0.3);
        transition: 0.3s ease;
    }

    .custom-btn-warning:hover {
        background: linear-gradient(135deg, #e0a800, #d39e00);
        color: white;
    }

    .custom-btn-success {
        background: linear-gradient(135deg, #198754, #157347);
        color: white;
        font-weight: 600;
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(25, 135, 84, 0.3);
        transition: 0.3s ease;
    }

    .custom-btn-success:hover {
        background: linear-gradient(135deg, #146c43, #0f5132);
        color: white;
    }

    .pdf-container {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        height: 80vh;
    }

    .pdf-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

<!-- Encabezado verde ancho completo -->
<div class="header-bar-full">
    <h2><i class="bi bi-eye-fill me-2"></i>Vista previa del acta de posesión</h2>
    <p>Verifica la información del acta antes de continuar con el proceso</p>
</div>

<div class="container">
    <!-- Apartado de folio y receptor -->
    <div class="info-box mb-5 shadow-lg">
        <div class="row g-4 align-items-center">
            <!-- Título y datos -->
            <div class="col-md-8">
                <h5>
                    <i class="bi bi-file-earmark-text-fill text-success me-2 fs-4"></i>
                    Detalles del Acta de Posesión
                </h5>

                <div class="d-flex align-items-center mb-3">
                    <div class="me-3">
                        <span class="icon-circle bg-success">
                            <i class="bi bi-hash fs-5 text-white"></i>
                        </span>
                    </div>
                    <div>
                        <div class="label">Folio</div>
                        <div class="value fw-semibold">{{ $folio }}</div>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="icon-circle bg-primary">
                            <i class="bi bi-person-circle fs-5 text-white"></i>
                        </span>
                    </div>
                    <div>
                        <div class="label">Recibe los derechos</div>
                        <div class="value fw-semibold">{{ $nombre_recibe }}</div>
                    </div>
                </div>
            </div>

            <!-- Botones uniformes -->
            <div class="col-md-4 text-md-end d-flex flex-column align-items-end justify-content-center gap-3 mt-3 mt-md-0">
                <a href="{{ route('acta.editar', $folio) }}" class="btn custom-btn-warning w-100">
                    <i class="bi bi-pencil-square me-1"></i> Editar
                </a>
                <form method="GET" action="{{ route('acta.continuar', $folio) }}" class="w-100">
                    <button type="submit" class="btn custom-btn-success w-100">
                        <i class="bi bi-check2-circle me-1"></i> Continuar proceso
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Visor de PDF -->
    <div class="pdf-container">
        <iframe src="{{ asset('storage/actas/' . $nombreArchivoPDF) }}" allowfullscreen></iframe>
    </div>
</div>
@endsection
