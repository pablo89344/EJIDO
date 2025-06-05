@extends('layouts.app2')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tipos de Actas Ejidales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f2f2f2, #e9ecef);
            font-family: 'Segoe UI', sans-serif;
        }

        header {
            background-color:rgb(77, 160, 77);
            color: white; height: 4rem;
            padding: 5rem 0;
            text-align: center;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .card-acta {
            background-color: white;
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .card-acta:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2rem;
            color:rgb(159, 166, 173);
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 0.75rem;
            color:rgb(62, 94, 128);
        }

        .card-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<header>
    <h1 class="mb-1" style="font-family: 'Segoe UI Semibold', 'Poppins', sans-serif; font-size: 2rem; letter-spacing: 0.5px; line-height: 1.4;">
        Seleccione el tipo de acta que desea consultar o generar
    </h1>
</header>


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
                <div class="card card-acta text-center p-4">
                    <div class="card-icon">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $tipo }}</h5>
                        <p class="card-text">Acta disponible</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
