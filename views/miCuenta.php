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
                    <p class="p3">Te damos la bienvenida, <?php echo $usuario->getUsuario(); ?></p>
                </div>

                <div id="seccionesMenuLateral">

                    <button id="botonMostrarPerfil" type="button"><h8>PERFIL</h8></button>
                    <hr>
                    <button id="botonMostrarMisPedidos" type="button"><h8>MIS PEDIDOS</h8></button>
                    <hr>
                    <button id="botonMostrarAtencionCliente" type="button"><h8>ATENCIÓN AL CLIENTE</h8></button>

                    <div id="seccionAdmin" class="<?php if($isAdmin){?> mostrar <?php }else{?> ocultar <?php }?>">
                        <hr>
                        <a href="?controller=admin"><h8>ADMIN</h8></a>
                    </div>

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
                    <div id="contenedorDatos" class="contenedorDatos mostrar">
                        <div class="contenidoDatos container-fluid">
                            <div class="row">

                                <div class="col-3">
                                    <p class="p5 bold">Usuario</p>
                                </div>
                                <div class="col-8">
                                    <p class="p5"><?php echo $usuario->getUsuario(); ?></p>
                                </div>
                                <div class="col-1">
                                    <button id="botonEditarDatos" type="button"><p class="p5 naranja bold">Editar</p></button>
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
                                    <button id="guardarEditarDatos" type="button"><p class="p5 naranja bold">Guardar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="nombreCompleto" class="p5 bold">Nombre completo</label>
                                </div>
                                <div class="col-8">
                                    <input id="nombreCompleto" name="nombreCompleto" value="<?= $usuario->getNombreCompleto() ?>">
                                </div>
                                <div class="col-1">
                                    <button id="descartarEditarDatos" type="button"><p class="p5 naranja bold">Descartar</p></button>
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
                    <div id="contenedorDirecciones" class="contenedorDatos">
                        <div class="contenidoDatos container-fluid">
                            <div class="row">

                                <!-- Fila de títulos -->
                                <div class="col-1">
                                    <p class="p5 bold">Nº</p>
                                </div>
                                <div class="col-2">
                                    <p class="p5 bold">Código postal</p>
                                </div>
                                <div class="col-2">
                                    <p class="p5 bold">Ciudad</p>
                                </div>
                                <div class="col-7">
                                    <p class="p5 bold">Calle</p>
                                </div>

                                <!-- Por cada dirección -->
                                <?php

                                $contador = 1;
                                foreach($direcciones as $direccion){
                                    ?>

                                    <div class="col-1">
                                        <p class="p5 bold"><?= $contador ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="p5"><?= $direccion->getCodigoPostal() ?></p>
                                    </div>
                                    <div class="col-2">
                                        <p class="p5"><?= $direccion->getCiudad() ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="p5"><?= $direccion->getCalle() ?></p>
                                    </div>
                                    <div class="col-1">
                                        <a href="?controller=usuario&action=eliminarDireccion&value=<?= $direccion->getId() ?>" class="p5 bold naranja">Eliminar</a>
                                    </div>

                                    <?php
                                    $contador += 1;
                                }
                                ?>

                                <div class="col-12">
                                    <button id="añadirDireccion" type="button"><p class="p5 naranja bold">Añadir</p></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="contenedorAñadirDirecciones" class="contenedorDatos">
                        <div class="contenidoDatos container-fluid">
                            <form id="formularioAñadirDirecciones" class="row" action="?controller=usuario&action=añadirDirecciones" method="POST">

                                <div class="col-1">
                                    <p class="bold">Añadir:</p>
                                </div>
                                <div class="col-2">
                                    <input id="codigoPostal" name="codigoPostal" placeholder="Código postal">
                                </div>
                                <div class="col-2">
                                    <input id="ciudad" name="ciudad" placeholder="Ciudad">
                                </div>
                                <div class="col-5">
                                    <input id="calle" name="calle" placeholder="Dirección completa" style="width: 100%">
                                </div>
                                <div class="col-1">
                                    <button id="descartarAñadirDireccion" type="button" class="p5 naranja bold">Descartar</button>
                                </div>
                                <div class="col-1">
                                    <button id="guardarAñadirDireccion" type="button"><p class="p5 naranja bold">Añadir</p></button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- Datos bancarios -->
                    <div class="tituloDatos">
                        <h6>DATOS BANCARIOS</h6>
                    </div>

                    <button id="desbloquearDatosBancarios" type="button"><p class="p5">Mostrar datos bancarios</p></button>

                    <div id="contenedorDatosBancarios" class="contenedorDatos">
                        <div class="contenidoDatos container-fluid">
                            <div class="row">

                                <div class="col-3">
                                    <p class="p5 bold">Tarjeta de crédito</p>
                                </div>
                                <div class="col-8">
                                    <p class="p5">**** **** **** *<?= substr($usuario->getTarjetaBancaria(), -3) ?></p>
                                </div>
                                <div class="col-1">
                                    <button id="editarDatosBancarios" type="button"><p class="p5 naranja bold">Editar</p></button>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">Fecha de caducidad</p>
                                </div>
                                <div class="col-8">
                                    <p class="p5"><?= $usuario->getFechaVencimiento() ?></p>
                                </div>
                                <div class="col-1">
                                    <button id="añadirDatosBancarios" type="button"><p class="p5 naranja bold">Añadir</p></button>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">CVV</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5">***</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="contenedorEditarDatosBancarios" class="contenedorEditarDatos">
                        <div class="contenidoDatos container-fluid">
                            <form id="formularioEditarDatosBancarios" class="row" action="?controller=usuario&action=editarDatosBancarios" method="POST">

                                <div class="col-3">
                                    <label for="tarjeta" class="p5 bold">Tarjeta de crédito</label>
                                </div>
                                <div class="col-8">
                                    <input id="tarjeta" name="tarjeta" value="<?= $usuario->getTarjetaBancaria() ?>">
                                </div>
                                <div class="col-1">
                                    <button id="guardarEditarDatosBancarios" type="button"><p class="p5 naranja bold">Guardar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="fechaCaducidad" class="p5 bold">Fecha de caducidad</label>
                                </div>
                                <div class="col-8">
                                    <input id="fechaCaducidad" name="fechaCaducidad" type="date" value="<?= $usuario->getFechaVencimiento() ?>">
                                </div>
                                <div class="col-1">
                                    <button id="descartarEditarDatosBancarios" type="button"><p class="p5 naranja bold">Descartar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="cvv" class="p5 bold">CVV</label>
                                </div>
                                <div class="col-9">
                                    <input id="cvv" name="cvv" value="<?= $usuario->getCvv() ?>">
                                </div>

                            </form>
                        </div>
                    </div>


                </div>

                <!-- MIS PEDIDOS -->
                <div id="contenedorMisPedidos" class="container-fluid">
                    <!-- Datos principales -->
                    <div class="tituloDatos">
                        <h6>MIS PEDIDOS</h6>
                    </div>

                    <div class="contenedorDatos row">

                        <!-- TABLA PEDIDOS -->
                        <div class="col-1">
                            <p class="p5 bold">ID</p>
                        </div>
                        <div class="col-2">
                            <p class="p5 bold">Fecha</p>
                        </div>
                        <div class="col-8">
                            <p class="p5 bold">Productos</p>
                        </div>
                        <div class="col-1">
                            <p class="p5 bold">Precio</p>
                        </div>

                        <?php

                            foreach($pedidos as $pedido){

                                ?>

                                <hr>

                                <div class="col-1">
                                    <p class="p5"><?= $pedido->getId() ?></p>
                                </div>
                                <div class="col-2">
                                    <p class="p5"><?= $pedido->getFecha() ?></p>
                                </div>
                                <div class="col-8">
                                    <a href="?controller=usuario&action=pedido&id=<?= $pedido->getId()?>">Ver los productos de este pedido</a>
                                </div>
                                <div class="col-1">
                                    <p class="p5"><?= $pedido->getPrecioFinal() ?></p>
                                </div>

                                <?php
                                
                            }
                        ?>

                    </div>
                </div>

                <!-- ATENCIÓN AL CLIENTE -->
                <div id="contenedorAtencionCliente">
                    <!-- Datos principales -->
                    <div class="tituloDatos">
                        <h6>ATENCIÓN AL CLIENTE</h6>
                    </div>

                    <div class="contenedorDatos">

                        <p>Atención al cliente</p>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT DE ANIMACIONES Y BOTONES -->
    <script>

        document.addEventListener('DOMContentLoaded', () => {

        // Función para alternar la visibilidad
        function toggleVisibility(elements, visibility) {
            elements.forEach(element => {
                element.style.display = visibility;
            });
        }

        /* ----- DEFINICIÓN DE LOS ELEMENTOS ----- */

        /* -- BARRA LATERAL -- */
        const botonMostrarPerfil = 'botonMostrarPerfil';
        const botonMostrarPedidos = 'botonMostrarMisPedidos';
        const botonMostrarAtencionCliente = 'botonMostrarAtencionCliente';

        const contenedorPerfil = 'contenedorPerfil';
        const contenedorMisPedidos = 'contenedorMisPedidos';
        const contenedorAtencionCliente = 'contenedorAtencionCliente';

        /* -- CONTENIDO PRINCIPAL -- */

        // Contenedor perfil
        const contenedorDatos = 'contenedorDatos';
        const contenedorEditarDatos = 'contenedorEditarDatos';
        const formularioEditarDatos = 'formularioEditarDatos';

        const botonEditarDatos = 'botonEditarDatos';
        const botonGuardarEditarDatos = 'guardarEditarDatos';
        const botonDescartarEditarDatos = 'descartarEditarDatos';

        // Contenedor direcciones
        const contenedorDirecciones = 'contenedorDirecciones';
        const contenedorAñadirDirecciones = 'contenedorAñadirDirecciones';
        const formularioAñadirDirecciones = 'formularioAñadirDirecciones';

        const botonAñadirDirecciones = 'añadirDireccion';
        const botonDescartarAñadirDireccion = 'descartarAñadirDireccion';
        const botonGuardarAñadirDireccion = 'guardarAñadirDireccion';

        // Contenedor Tarjeta Bancaria
        const contenedorDatosBancarios = 'contenedorDatosBancarios';
        const contenedorEditarDatosBancarios = 'contenedorEditarDatosBancarios';
        const formularioEditarDatosBancarios = 'formularioEditarDatosBancarios';

        const botonDesbloquearDatosBancarios = 'desbloquearDatosBancarios';
        const botonEditarDatosBancarios = 'editarDatosBancarios';
        const botonDescartarEditarDatosBancarios = 'descartarEditarDatosBancarios';
        const botonGuardarEditarDatosBancarios = 'guardarEditarDatosBancarios';

        /* ----- FUNCIONES DE LOS ELEMENTOS ----- */

        /* -- BARRA LATERAL -- */
        document.getElementById(botonMostrarPerfil).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorPerfil)], 'block');
            toggleVisibility([document.getElementById(contenedorMisPedidos), document.getElementById(contenedorAtencionCliente)], 'none');
        });

        document.getElementById(botonMostrarPedidos).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorMisPedidos)], 'block');
            toggleVisibility([document.getElementById(contenedorPerfil), document.getElementById(contenedorAtencionCliente)], 'none');
        });

        document.getElementById(botonMostrarAtencionCliente).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorAtencionCliente)], 'block');
            toggleVisibility([document.getElementById(contenedorPerfil), document.getElementById(contenedorMisPedidos)], 'none');
        });

        /* -- CONTENIDO PRINCIPAL -- */

        // Contenedor perfil
        document.getElementById(botonEditarDatos).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorDatos)], 'none');
            toggleVisibility([document.getElementById(contenedorEditarDatos)], 'block');
        });

        document.getElementById(botonGuardarEditarDatos).addEventListener('click', () => {
            document.getElementById(formularioEditarDatos).submit();
            toggleVisibility([document.getElementById(contenedorDatos)], 'block');
            toggleVisibility([document.getElementById(contenedorEditarDatos)], 'none');
        });

        document.getElementById(botonDescartarEditarDatos).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorDatos)], 'block');
            toggleVisibility([document.getElementById(contenedorEditarDatos)], 'none');
        });

        // Contenedor direcciones
        document.getElementById(botonAñadirDirecciones).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorDirecciones)], 'none');
            toggleVisibility([document.getElementById(contenedorAñadirDirecciones)], 'block');
        });

        document.getElementById(botonDescartarAñadirDireccion).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorDirecciones)], 'block');
            toggleVisibility([document.getElementById(contenedorAñadirDirecciones)], 'none');
        });

        document.getElementById(botonGuardarAñadirDireccion).addEventListener('click', () => {
            document.getElementById(formularioAñadirDirecciones).submit();
            toggleVisibility([document.getElementById(contenedorDirecciones)], 'block');
            toggleVisibility([document.getElementById(contenedorAñadirDirecciones)], 'none');
        });

        // Contenedor datos bancarios
        document.getElementById(botonDesbloquearDatosBancarios).addEventListener('click', () => {
            toggleVisibility([document.getElementById(botonDesbloquearDatosBancarios)], 'none');
            toggleVisibility([document.getElementById(contenedorDatosBancarios)], 'block');
        });

        document.getElementById(botonEditarDatosBancarios).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorDatosBancarios)], 'none');
            toggleVisibility([document.getElementById(contenedorEditarDatosBancarios)], 'block');
        });

        document.getElementById(botonGuardarEditarDatosBancarios).addEventListener('click', () => {
            document.getElementById(formularioEditarDatosBancarios).submit();
            toggleVisibility([document.getElementById(contenedorDatosBancarios)], 'block');
            toggleVisibility([document.getElementById(contenedorEditarDatosBancarios)], 'none');
        });

        document.getElementById(botonDescartarEditarDatosBancarios).addEventListener('click', () => {
            toggleVisibility([document.getElementById(contenedorDatosBancarios)], 'block');
            toggleVisibility([document.getElementById(contenedorEditarDatosBancarios)], 'none');
        });

        });
    </script>

</body>
</html>