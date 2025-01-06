<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZAS</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/paginaOfertas.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="barraNavegacion fixed-top">
        <?php include_once "views/others/navbar.php"; ?>
    </div>

    <div class="migasDePan">
        <p class="p5 bold"><a href="?controller=general" class="linkMigasPan">Inicio</a> > Ofertas</p>
    </div>

    <div class="contenedorPrincipal container-fluid">
        <div class="row">
            <div class="contenedorFiltros col-sm-12 col-md-12 col-lg-12 col-xl-2">
                <!-- Para las ofertas, no hay filtros disponibles -->
            </div>

            <div class="contenedorContenido col-sm-12 col-md-12 col-lg-12 col-xl-10 container">
                <?php
                if (isset($_SESSION['usuarioActual']) && !empty($_SESSION['usuarioActual'])) {
                ?>
                <div class="tituloContenedor">
                    <h2>Ofertas</h2>
                </div>
                
                <div class="contenedorProductos container-fluid">
                    <div class="contenidoProductos row">
                        <?php
                        if (count($ofertas) == 0) {
                            ?>
                            <div class="busquedaSinResultados">
                                <p class="p4">No se han encontrado ofertas que coinciden con los filtros de búsqueda.</p>
                            </div>
                            <?php
                        } else {
                            foreach ($ofertas as $oferta) {
                                ?>
                                <div class="contenedorProducto col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                    <div class="separadorImagen">
                                        <h5 class="white"><?= floor($oferta->getDescuento()) ?> <?= $oferta->getTipo() ?></h5>
                                    </div>
                                    <div class="lineaDivisoraContenido">
                                        <hr>
                                    </div>
                                    <div class="contenedorContenidoProducto">
                                        <div class="tituloContenido">
                                            <h7 class="naranja"><?= ucfirst($oferta->getNombre())?></h7>
                                        </div>
                                        <div class="textoContenido">
                                            <p class="p5"><?= ucfirst($oferta->getDescripcion())?></p>
                                            <p class="p4 bold">Disponibilidad:</p>
                                            <p class="p5">Del <?= $oferta->getFechaInicio() ?></p>
                                            <p class="p5">Al <?= $oferta->getFechaFin() ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                } else {
                ?>
                <div id="contenedorSinSesion">
                    <h6>No has iniciado sesión</h6>
                    <p class="p5">Para ver las ofertas debes ser cliente.</p>
                    <p class="p5"><a class="bold" href="?controller=usuario&action=login">Inicia sesión</a> o <a class="bold" href="?controller=usuario&action=register">crea una cuenta</a> ahora.</p>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
