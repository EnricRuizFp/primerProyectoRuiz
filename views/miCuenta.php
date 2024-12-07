<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/miCuenta.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>

    <!-- NAVBAR -->
    <div class="barraNavegacion fixed-top">
        <?php include_once "views/others/navbar.php"; ?>
    </div>

    <!-- HEADER -->
    <header>
        <div id="tituloPagina">
            <h4>PERFIL</h4>
        </div>
    </header>

    <!-- CONTENEDOR PRINCIPAL -->
    <div id="contenedorPrincipal" class="container-fluid">
        <div class="row">

            <!-- Menú lateral -->
            <div id="menuLateral" class="col-3">

                <div id="bienvenida">
                    <p class="p3">Te damos la bienvenida, <?php echo $usuario->getNombre(); ?></p>
                </div>

                <div id="seccionesMenuLateral">

                    <button id="botonPerfil"><h8>PERFIL</h8></button>
                    <hr>
                    <button id="botonMisPedidos"><h8>MIS PEDIDOS</h8></button>
                    <hr>
                    <button id="botonAtencionCliente"><h8>ATENCIÓN AL CLIENTE</h8></button>

                </div>

            </div>

            <!-- Contenido -->
            <div id="contenidoPrincipal" class="col-9">

                <!-- PERFIL -->
                <div id="contenedorPerfil">

                    <!-- Datos principales -->
                    <div class="tituloDatos">
                        <h6>PERFIL</h6>
                    </div>
                    <div id="contenedorDatos" class="contenedorDatos">
                        <div class="contenidoDatos container-fluid">
                            <div class="row">

                                <div class="col-3">
                                    <p class="p5 bold">Usuario</p>
                                </div>
                                <div class="col-8">
                                    <p class="p5"><?php echo $usuario->getUsuario(); ?></p>
                                </div>
                                <div class="col-1">
                                    <button id="botonEditarDatos"><p class="p5 naranja bold">Editar</p></button>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">Nombre completo</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getNombreCompleto(); ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">Correo</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getEmail(); ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">Teléfono</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getTelefono(); ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">Fecha de registro</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getFechaRegistro(); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="contenedorEditarDatos" class="contenedorEditarDatos">
                        <div class="contenidoDatos container-fluid">
                            <form id="formularioEditarDatos" class="row" action="?controller=usuario&action=editarDatos" method="POST">

                                <div class="col-3">
                                    <label for="usuario" class="p5 bold">Usuario</label>
                                </div>
                                <div class="col-8">
                                    <input id="usuario" name="usuario" value="<?= $usuario->getUsuario() ?>">
                                </div>
                                <div class="col-1">
                                    <button id="guardarEditarDatos"><p class="p5 naranja bold">Guardar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="nombreCompleto" class="p5 bold">Nombre completo</label>
                                </div>
                                <div class="col-8">
                                    <input id="nombreCompleto" name="nombreCompleto" value="<?= $usuario->getNombreCompleto() ?>">
                                </div>
                                <div class="col-1">
                                    <button id="descartarEditarDatos"><p class="p5 naranja bold">Descartar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="correo" class="p5 bold">Correo</label>
                                </div>
                                <div class="col-9">
                                    <input id="correo" name="correo" value="<?= $usuario->getEmail() ?>">
                                </div>

                                <div class="col-3">
                                    <label for="telefono" class="p5 bold">Teléfono</label>
                                </div>
                                <div class="col-9">
                                    <input id="telefono" name="telefono" value="<?= $usuario->getTelefono() ?>">
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="tituloDatos">
                        <h6>DIRECCIONES</h6>
                    </div>
                    <div class="contenedorDatos">
                        <div class="contenidoDatos container-fluid">
                            <div class="row">

                                <div class="col-3">
                                    <p class="p5 bold">Dirección</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getDireccion(); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Datos bancarios -->
                    <div class="tituloDatos">
                        <h6>DATOS BANCARIOS</h6>
                    </div>

                    <button id="desbloquearDatosBancarios"><p class="p5">Mostrar datos bancarios</p></button>

                    <div id="contenedorDatosBancarios" class="contenedorDatos">
                        <div class="contenidoDatos container-fluid">
                            <div class="row">

                                <div class="col-3">
                                    <p class="p5 bold">Tarjeta de crédito</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getTarjetaBancaria(); ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">Fecha de caducidad</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getFechaVencimiento(); ?></p>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">CVV</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getCvv(); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

                <!-- MIS PEDIDOS -->
                <div id="contenedorMisPedidos">
                    <!-- Datos principales -->
                    <div class="tituloDatos">
                        <h6>MIS PEDIDOS</h6>
                    </div>

                    <div class="contenedorDatos">

                        <?php

                            foreach($pedidos as $pedido) {

                                echo "PEDIDO:<br>";
                                echo "ID: ".$pedido->getId();
                                echo "OFERTA: ".$pedido->getOferta();
                                echo "DESCUENTO: ".$pedido->getDescuento();
                                echo "PRECIO: ".$pedido->getPrecioFinal();
                                echo "ESTADO: ".$pedido->getEstadoPedido();

                            }

                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include_once "views/others/footer.php"; ?>

    <a href="?controller=general&action=admin">ADMIN</a>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT DE ANIMACIONES Y BOTONES -->
    <script>

        document.addEventListener('DOMContentLoaded', () => {

            /* ----- DEFINICIÓN DE LOS ELEMENTOS ----- */

            /* -- BARRA LATERAL -- */

            /* -- CONTENIDO PRINCIPAL -- */

            // Contenedor perfil
            const contenedorDatos = document.getElementById('contenedorDatos');
            const contenedorEditarDatos = document.getElementById('contenedorEditarDatos');
            const formularioEditarDatos = document.getElementById('formularioEditarDatos');

            const botonEditarDatos = document.getElementById('botonEditarDatos');
            const botonGuardarEditarDatos = document.getElementById('guardarEditarDatos');
            const botonDescartarEditarDatos = document.getElementById('descartarEditarDatos');


            /* ----- FUNCIONES DE LOS ELEMENTOS ----- */

            /* -- BARRA LATERAL -- */

            /* -- CONTENIDO PRINCIPAL -- */

            // Contenedor perfil
            botonEditarDatos.addEventListener('click', () => {
                contenedorDatos.style.display = 'none';
                contenedorEditarDatos.style.display = 'block';
            });
            botonGuardarEditarDatos.addEventListener('click', () => {
                formularioEditarDatos.submit();
                contenedorDatos.style.display = 'block';
                contenedorEditarDatos.style.display = 'none';
            });
            botonDescartarEditarDatos.addEventListener('click', () => {
                contenedorDatos.style.display = 'block';
                contenedorEditarDatos.style.display = 'none';
            });



        });

    </script>

</body>
</html>