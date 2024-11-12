<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navegación</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand img {
            height: 30px; /* Ajusta la altura del logo según sea necesario */
        }
        .navbar-nav .nav-link {
            font-size: 1rem; /* Ajusta el tamaño de las opciones */
        }
        .navbar-icons .nav-link {
            font-size: 1.25rem; /* Tamaño de los iconos */
            color: black; /* Color de los iconos */
        }
        /* Centrar el logo en pantallas pequeñas */
        @media (max-width: 991.98px) {
            .navbar-brand {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }
        }
        /* Asegura que los iconos estén siempre alineados a la derecha */
        .navbar .navbar-icons {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container position-relative">
            <!-- Botón de menú para pantallas pequeñas, alineado a la izquierda -->
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo de la marca, centrado en pantallas pequeñas -->
            <a class="navbar-brand mx-auto" href="#">
                <img src="logo.png" alt="Logo"> LA BUENIZZIMA
            </a>

            <!-- Enlaces de navegación principales -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menús</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Carta</a>
                    </li>
                </ul>
            </div>

            <!-- Iconos a la derecha, sin colapsar -->
            <div class="navbar-icons">
                <a class="nav-link" href="#"><i class="bi bi-search"></i></a>
                <a class="nav-link" href="#"><i class="bi bi-person"></i></a>
                <a class="nav-link" href="#"><i class="bi bi-heart"></i></a>
                <a class="nav-link" href="#"><i class="bi bi-cart"></i></a>
            </div>
        </div>
    </nav>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons (para los íconos de búsqueda, usuario, favoritos, carrito) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
