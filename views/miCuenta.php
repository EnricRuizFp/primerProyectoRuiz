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
                    <hr>
                    <button id="botonCambiarContraseña"><h8>CAMBIAR LA CONTRASEÑA</h8></button>

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
                    <div class="contenedorDatos">
                        <div class="contenidoDatos container-fluid">
                            <div class="row">

                                <div class="col-3">
                                    <p class="p5 bold">Usuario</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?php echo $usuario->getUsuario(); ?></p>
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

                    <!-- Dirección -->
                    <div class="tituloDatos">
                        <h6>DIRECCIÓN</h6>
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
                        <h6>DATOS BANCARIOS</h>
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

        const botonMostrarDatosBancarios = document.getElementById('desbloquearDatosBancarios');
        const contenedorDatosBancarios = document.getElementById('contenedorDatosBancarios');

        botonMostrarDatosBancarios.addEventListener('click', function() {
            botonMostrarDatosBancarios.style.display = 'none';
            contenedorDatosBancarios.style.display = 'block';
        });

    </script>

</body>
</html>