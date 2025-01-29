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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #fdd835;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 50px;
            margin-right: 10px;
        }

        .navbar-nav {
            display: flex;
            justify-content: space-between;
            flex: 1;
            text-align: center;
        }

        .navbar-nav .nav-item {
            flex-grow: 1;
        }

        .navbar-nav .nav-link {
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px 10px; /* Reducción del padding */
            font-size: 14px; /* Reducción del tamaño de la fuente */
        }

        .navbar-nav .nav-link i {
            margin-right: 5px;
        }

        .navbar-nav .nav-link:hover {
            background-color: #ffc107;
            border-radius: 5px;
            color: #000;
        }

        /* Ajuste de la altura del encabezado */
        .navbar {
            height: 60px; /* Se reduce la altura */
        }

        main {
            flex: 1;
            margin-top: 80px; /* Espacio suficiente para que el contenido no quede cubierto por el navbar */
        }

        footer {
            background-color: #ffffff;
            padding: 20px 0;
            text-align: center;
            color: #333;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <!-- Encabezado -->
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <!-- Logo y nombre de la marca -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('imagenes/logo.png') }}" alt="Logo">
                SADEVH
            </a>
            <!-- Botón de navegación para pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- Enlace a la página de inicio -->
                    <li class="nav-item">
                        <a class="nav-link" href="/welcome">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <!-- Enlace a Estado del Acta -->
                    <li class="nav-item">
                        <a class="nav-link" href="/estado-acta">
                            <i class="fas fa-file-alt"></i> Estado del Acta
                        </a>
                    </li>
                    <!-- Enlace a Ubicación del Terreno -->
                    <li class="nav-item">
                        <a class="nav-link" href="/ubicacion-terreno">
                            <i class="fas fa-map-marker-alt"></i> Ubicación del Terreno
                        </a>
                    </li>
                    <!-- Enlace a Control de Usuarios -->
                    <li class="nav-item">
                        <a class="nav-link" href="/usuarios">
                            <i class="fas fa-users-cog"></i> Control de Usuarios
                        </a>
                    </li>
                    <!-- Enlace a Creación de Actas -->
                    <li class="nav-item">
                        <a class="nav-link" href="/creacion-actas">
                            <i class="fas fa-edit"></i> Creación de Actas
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido de la página -->
    <main>
        <!-- Aquí va el contenido de la página -->
    </main>

    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
