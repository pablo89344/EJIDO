@extends('layouts.app2')
@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Enlace a los iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Codificación de caracteres -->
    <meta charset="UTF-8">
    <!-- Configuración para un diseño adaptativo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página -->
    <title>Encabezado y Pie de Página</title>
    <!-- Enlace a la hoja de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
   
</head>

<style>
    /* Estilo general para el cuerpo de la página */
    body {
        font-family: 'Roboto', sans-serif; /* Fuente moderna y limpia */
        background-color: #f4f7f6; /* Fondo suave */
        color: #000; /* Cambiar el color del texto a negro */
        margin: 0;
        padding: 0;
    }

    /* Estilo del contenedor */
    .container {
        padding: 0 15px; /* Relleno de los lados para una mayor limpieza */
    }

    /* Estilo de los títulos principales de las secciones */
    .section-title {
        font-size: 2.5rem; /* Tamaño grande para títulos */
        font-weight: 600; /* Negrita para destacar */
        color: #000; /* Títulos en color negro */
        margin-bottom: 10px; /* Reducir el espacio debajo del título */
        border-bottom: 3px solid #0066cc; /* Línea de separación */
        display: inline-block;
        padding-bottom: 10px; /* Relleno debajo del título */
        text-align: center; /* Centra el título */
    }

    /* Estilo para los párrafos de texto */
    .intro-text {
        font-size: 1.2rem;
        line-height: 1.8; /* Espaciado entre líneas */
        color: #000; /* Color negro para el texto */
        text-align: justify; /* Justificación del texto */
        margin-top: 0; /* Eliminar espacio arriba del texto */
    }

    /* Estilo para las tarjetas */
    .card {
        border-radius: 15px; /* Bordes redondeados */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Sombra sutil para dar profundidad */
        margin-bottom: 30px; /* Espacio inferior entre tarjetas */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Efecto de transición para hover */
    }

    /* Efecto de hover para las tarjetas */
    .card:hover {
        transform: translateY(-10px); /* Eleva la tarjeta al pasar el ratón */
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); /* Aumenta la sombra */
    }

    /* Estilo del cuerpo de las tarjetas */
    .card-body {
        padding: 30px;
    }

    /* Estilo para los títulos dentro de las tarjetas */
    .card-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: rgb(10, 10, 10); /* Azul para destacar el título */
        margin-bottom: 15px; /* Reducir el espacio debajo del título */
    }

    /* Estilo para los textos dentro de las tarjetas */
    .card-text {
        font-size: 1.1rem;
        color: #000; /* Cambiar texto dentro de las tarjetas a negro */
        text-align: justify; /* Justificación del texto dentro de las tarjetas */
    }

    /* Estilo para la imagen principal */
    .img-top {
        height: 70vh; /* 70% de la altura de la ventana */
        object-fit: cover; /* Hace que la imagen cubra el espacio disponible */
        border-radius: 10px; /* Bordes redondeados */
        margin-top: 0;
    }

    .va {
        margin-top: 50px; /* Ajusta este valor según lo necesites para mover la imagen hacia abajo */
    }

    /* Estilo para el pie de página */
    footer {
        background-color: #333; /* Fondo oscuro para el pie de página */
        color: #fff; /* Texto blanco */
        padding: 20px;
        text-align: center;
        margin-top: 40px; /* Espacio encima del pie de página */
    }

    footer a {
        color: #00bcd4; /* Color azul para los enlaces */
    }

    footer a:hover {
        text-decoration: underline; /* Subrayado al pasar el ratón */
    }

    /* Estilos específicos para las tarjetas de características */
    .feature-card {
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    /* Efecto hover para las tarjetas de características */
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    /* Cuerpo de las tarjetas de características */
    .feature-card .card-body {
        padding: 25px;
    }

    /* Títulos dentro de las tarjetas de características */
    .feature-card .card-title {
        font-size: 1.6rem;
        font-weight: 600;
        color: rgb(12, 12, 12);
        margin-bottom: 15px;
    }

    /* Texto dentro de las tarjetas de características */
    .feature-card .card-text {
        font-size: 1rem;
        color: #000; /* Cambiar texto a negro */
        line-height: 1.6;
        text-align: justify;
    }

    /* Diseño de columnas para pantallas grandes */
    .col-md-6 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Diseño de la fila de características */
    .row {
        margin-top: 30px;
    }
</style>

<body>

   <!-- Imagen principal en la parte superior -->
   <div class="va"><img src="{{ asset('imagenes/va.jpg') }}" class="imgtop img-fluid" alt="inicio.png"></div>

    <!-- Sección: ¿Qué es un Ejido? -->
    <div class="container">
        <h2 class="section-title text-center">¿Qué es un Ejido?</h2>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <p class="intro-text">
                    El ejido es un tipo de demarcación de tierras que se encuentran afuera de los pueblos, y son destinados para el uso
                    común de los campesinos, promoviendo la redistribución de la tierra para un uso agrícola y comunitario. Los ejidos
                    permiten a las comunidades rurales organizarse y tener acceso a recursos vitales para su desarrollo.
                </p>
                <p class="intro-text">
                    Los ejidos en México son un componente clave en la historia del país y en el sistema agrario, especialmente desde la
                    Reforma Agraria y el gobierno de Lázaro Cárdenas en la década de 1930.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('imagenes/señor.jpg') }}" alt="Ejido" class="img-fluid img-top rounded">
            </div>
        </div>
    </div>

    <!-- Sección: Historia del Ejido -->
    <div class="container">
        <h2 class="section-title text-center">Historia del Ejido</h2>
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('imagenes/vistacamp.jpg') }}" alt="Vista de Ejido" class="img-fluid img-top rounded">
            </div>
            <div class="col-lg-6">
                <p class="intro-text">
                    El sistema de ejidos tiene su origen en la Reforma Agraria, que buscó redistribuir tierras a los campesinos para
                    promover la justicia social y el bienestar de las comunidades rurales. Esta reforma permitió que las tierras fueran
                    entregadas a los campesinos en un sistema de propiedad colectiva, en donde los ejidatarios compartían los recursos y
                    tomaban decisiones en conjunto para el beneficio de todos.
                </p>
                <p class="intro-text">
                    El sistema de ejidos, con sus modificaciones y mejoras, sigue siendo un pilar fundamental para la organización
                    agraria en México.
                </p>
            </div>
        </div>
    </div>

    <!-- Sección: Características del Ejido -->
    <div class="container">
        <h2 class="section-title text-center">Características del Ejido</h2>
        <div class="row">
            <!-- Propiedad colectiva -->
            <div class="col-md-6">
                <div class="card feature-card">
                    <div class="card-body">
                        <h5 class="card-title">Propiedad Colectiva</h5>
                        <p class="card-text">
                            Los ejidos son propiedad colectiva de la comunidad. Los ejidatarios tienen derechos de uso y disfrute, pero no pueden vender 
                            la tierra individualmente. Este modelo de propiedad colectiva garantiza que la tierra permanezca en manos de la comunidad.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Asamblea Ejidal -->
            <div class="col-md-6">
                <div class="card feature-card">
                    <div class="card-body">
                        <h5 class="card-title">Asamblea Ejidal</h5>
                        <p class="card-text">
                            La asamblea ejidal es el órgano máximo de toma de decisiones dentro del ejido. En esta se toman las decisiones más importantes 
                            sobre la asignación de tierras, uso de recursos y otros temas clave para la comunidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Parcelas -->
            <div class="col-md-6">
                <div class="card feature-card">
                    <div class="card-body">
                        <h5 class="card-title">Parcelas</h5>
                        <p class="card-text">
                            Las tierras ejidales se distribuyen en parcelas que se asignan a los ejidatarios para su explotación agrícola. Estas parcelas 
                            se distribuyen de forma equitativa entre los miembros de la comunidad, según las necesidades y capacidad de trabajo.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Derechos de Herencia -->
            <div class="col-md-6">
                <div class="card feature-card">
                    <div class="card-body">
                        <h5 class="card-title">Derechos de Herencia</h5>
                        <p class="card-text">
                            Los derechos sobre las tierras ejidales pueden ser heredados, pero no pueden ser vendidos a personas fuera de la comunidad. 
                            Este sistema asegura que los ejidos sigan siendo controlados por los miembros de la comunidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <footer>
        <div class="container">
            © 2024 - SDEVH - <a href="/Privacy">Privacidad</a>
        </div>
    </footer>
<!-- Enlace a los scripts de Bootstrap, Popper.js y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>

</html>
