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



 <!-- Imagen principal en la parte superior -->
<div class="va"><img src="{{ asset('imagenes/va.jpg') }}" class="imgtop img-fluid" alt="inicio.png"></div>

<div class="container">
    <div class="row align-items-center">
        <!-- Sección de texto sobre el ejido -->
        <div class="col-lg-6 d-flex justify-content-center flex-column">
            <h2 class="text-center">¿Qué es un ejido?</h2>
            <p class="text-center">
                El ejido es un tipo de demarcación de tierras que se encuentran afuera de
                los pueblos en forma de pastizales y bosques, y por tanto eran de uso
                común, por lo que eran libres para expandir los asentamientos humanos.
            </p>
            <p class="text-center">
                También el Parcelario es el documento que acredita el derecho que tiene
                el ejidatario, comunero o posesionario a usar y disfrutar de una parcela.
            </p>
            <p class="text-center">
                <span class="icono"><i class="material-icons">book</i></span>
                Infórmate más <a target="_blank" href="https://www.diputados.gob.mx/sia/coord/refconst_lviii/html/242.htm#:~:text=En%20M%C3%A9xico%20se%20ha%20considerado,solicitantes%2C%20consider%C3%A1ndolos%20como%20propiedad%20social.1">Ejidos</a> en páginas oficiales.
            </p>
        </div>
        <!-- Imagen relacionada con el ejido -->
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('imagenes/señor.jpg') }}" alt="Señor en ejido" class="iamgen-edit img-fluid img-thumbnail responsive-img">
        </div>
    </div>
</div>

<div class="container">
    <div class="row align-items-center">
        <!-- Imagen de muestra de un ejido -->
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <img src="{{ asset('imagenes/vistacamp.jpg') }}" alt="Muestra de un ejido" class="iamgen-edit img-fluid img-thumbnail responsive-img">
        </div>
        <!-- Sección de texto sobre el origen histórico del ejido -->
        <div class="col-lg-6 d-flex justify-content-center flex-column">
            <h2 class="text-center">Origen histórico</h2>
            <p class="text-center">
                El sistema de ejidos en México tiene su origen en la reforma agraria
                que se llevó a cabo a principios del siglo XX, particularmente durante
                el gobierno de Lázaro Cárdenas en la década de 1930. La intención era
                redistribuir la tierra para crear una sociedad más equitativa.
            </p>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="text-center section-title">Características</h2>
    <div class="row">
        <div class="col-md-6">
            <p>
                <strong>1. Propiedad colectiva:</strong> La tierra es propiedad de la comunidad ejidal
                en su conjunto. Los ejidatarios tienen derechos de uso y disfrute,
                pero no pueden vender la tierra de manera individual.
            </p>
            <p>
                <strong>2. Asamblea:</strong> Es el órgano máximo de toma de decisiones en el ejido.
                En la asamblea se discuten y aprueban asuntos importantes,
                como la asignación de tierras, decisiones económicas y otros
                asuntos relevantes para la comunidad.
            </p>
        </div>
        <div class="col-md-6">
            <p>
                <strong>3. Parcelas:</strong> La tierra se divide en parcelas que son asignadas
                a la dotación de los ejidatarios para su cultivo.
                Estas parcelas se distribuyen de manera equitativa
                entre los miembros de la comunidad.
            </p>
            <p>
                <strong>4. Derechos de herencia y sucesión:</strong> Los derechos sobre la tierra ejidal
                pueden ser heredados, pero generalmente deben ser ejercidos por miembros
                de la misma comunidad. La venta a personas externas está prohibida.
            </p>
            <p>
                <strong>5. Prohibición de venta individual:</strong> La venta de tierras a particulares
                no puede llevarse a cabo, la venta debe realizarse por intermedio de la
                asamblea ejidal y debe beneficiar a toda la comunidad. Los ejidatarios
                no pueden vender sus parcelas de forma individual.
            </p>
        </div>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .container {
        padding: 0 15px;
    }
    .imgtop {
        width: 100%;
        height: 70vh; /* 70% de la altura de la ventana */
        object-fit: cover; /* Asegura que la imagen cubra toda el área disponible */
        margin-top: 0;
    }
    .section-title {
        margin-bottom: 40px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
        color: #333;
        font-weight: 600;
        font-size: 2rem;
    }
    p {
        color: #555;
        line-height: 1.6;
    }
    .va{margin-top: 50px;}
</style>

<!-- Pie de página -->
<footer class="border-top footer text-muted" style="padding: 20px 0;">
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
