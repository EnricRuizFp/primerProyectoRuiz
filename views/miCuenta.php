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
            <div id="menuLateral" class="col-12 col-xl-3">

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
            <div id="contenidoPrincipal" class="col-12 col-xl-9">

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
                                <div class="col-7 col-sm-8">
                                    <p class="p5"><?php echo $usuario->getUsuario(); ?></p>
                                </div>
                                <div class="col-2 col-sm-1">
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
                                <div class="col-7 col-sm-8">
                                    <input id="usuario" name="usuario" value="<?= $usuario->getUsuario() ?>">
                                </div>
                                <div class="col-2 col-sm-1">
                                    <button id="guardarEditarDatos" type="button"><p class="p5 naranja bold">Guardar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="nombreCompleto" class="p5 bold">Nombre completo</label>
                                </div>
                                <div class="col-7 col-sm-8">
                                    <input id="nombreCompleto" name="nombreCompleto" value="<?= $usuario->getNombreCompleto() ?>">
                                </div>
                                <div class="col-2 col-sm-1">
                                    <button id="descartarEditarDatos" type="button"><p class="p5 naranja bold">Descartar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="correo" class="p5 bold">Correo</label>
                                </div>
                                <div class="col-7 col-sm-8">
                                    <input id="correo" name="correo" value="<?= $usuario->getEmail() ?>">
                                </div>

                                <div class="col-3">
                                    <label for="telefono" class="p5 bold">Teléfono</label>
                                </div>
                                <div class="col-7 col-sm-8">
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
                                <div class="columnaNumero col-1">
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

                                    <div class="columnaNumero col-md-1">
                                        <p class="p5 bold"><?= $contador ?></p>
                                    </div>
                                    <div class="col-2 col-md-2">
                                        <p class="p5"><?= $direccion->getCodigoPostal() ?></p>
                                    </div>
                                    <div class="col-2 col-md-2">
                                        <p class="p5"><?= $direccion->getCiudad() ?></p>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <p class="p5"><?= $direccion->getCalle() ?></p>
                                    </div>
                                    <div class="col-2 col-md-1">
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

                                <div class="columnaNumero col-md-1">
                                    <p class="bold">Añadir:</p>
                                </div>
                                <div class="col-3 col-md-2">
                                    <input id="codigoPostal" name="codigoPostal" placeholder="Código postal">
                                </div>
                                <div class="col-3 col-md-2">
                                    <input id="ciudad" name="ciudad" placeholder="Ciudad">
                                </div>
                                <div class="col-6 col-md-4 col-xl-5">
                                    <input id="calle" name="calle" placeholder="Dirección completa" style="width: 100%">
                                </div>
                                <div class="col-6 col-md-2 col-xl-1">
                                    <button id="descartarAñadirDireccion" type="button" class="p5 naranja bold">Descartar</button>
                                </div>
                                <div class="col-6 col-md-1">
                                    <button id="guardarAñadirDireccion" type="button"><p class="p5 naranja bold">Añadir</p></button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- Datos bancarios -->
                    <div class="tituloDatos">
                        <h6>DATOS BANCARIOS</h6>
                    </div>

                    <div id="contenedorDatosBancarios" class="contenedorDatos">

                        <div class="contenidoDatos container-fluid">

                            <?php

                                if(isset($_SESSION['datosBancariosIncorrectos']) && $_SESSION['datosBancariosIncorrectos']){
                                    echo "<p class='p4 red bold'>Los datos introducidos no son correctos.</p>";
                                }elseif(!$validacionDatosBancarios){
                                    echo "<p class='p4 red bold'>Debe introducir los datos bancarios para poder comprar.</p>";
                                }
                            ?>

                            <div class="row">

                                <div class="col-3">
                                    <p class="p5 bold">Tarjeta de crédito</p>
                                </div>
                                <div class="col-7 col-md-8">
                                    <p class="p5">**** **** **** *<?= substr($usuario->getTarjetaBancaria(), -3) ?></p>
                                </div>
                                <div class="col-2 col-md-1">
                                    <?php if($validacionDatosBancarios){ ?>
                                        <button id="editarDatosBancarios" type="button"><p class="p5 naranja bold">Editar</p></button>
                                    <?php }else{ ?>
                                        <button id="editarDatosBancarios" type="button"><p class="p5 naranja bold">Añadir</p></button>
                                    <?php } ?>
                                </div>

                                <div class="col-3">
                                    <p class="p5 bold">Fecha de caducidad</p>
                                </div>
                                <div class="col-9">
                                    <p class="p5"><?= $usuario->getFechaVencimiento() ?></p>
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
                                <div class="col-7 col-md-8">
                                    <input id="tarjeta" name="tarjeta" value="<?= $usuario->getTarjetaBancaria() ?>">
                                </div>
                                <div class="col-2 col-md-1">
                                    <button id="guardarEditarDatosBancarios" type="button"><p class="p5 naranja bold">Guardar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="fechaCaducidad" class="p5 bold">Fecha de caducidad</label>
                                </div>
                                <div class="col-7 col-md-8">
                                    <input id="fechaCaducidad" name="fechaCaducidad" type="date" value="<?= $usuario->getFechaVencimiento() ?>">
                                </div>
                                <div class="col-2 col-md-1">
                                    <button id="descartarEditarDatosBancarios" type="button"><p class="p5 naranja bold">Descartar</p></button>
                                </div>

                                <div class="col-3">
                                    <label for="cvv" class="p5 bold">CVV</label>
                                </div>
                                <div class="col-7 col-md-8">
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

                    <?php 
                    
                    if($pedidos){

                    ?>

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
                                    <p class="p5"><?= $pedido->getPrecioFinal() ?> €</p>
                                </div>

                                <?php
                                
                            }
                        ?>

                    </div>

                    <?php

                    }else{

                    ?>

                    <div class="contenedorDatos row">
                        <p>No tienes pedidos disponibles.</p>
                        <p>Haz <a href="?controller=general&action=productos" class="bold naranja">clic aquí</a> para realizar tu primer pedido.</p>
                    </div>

                    <?php

                    }

                    ?>


                    
                </div>

                <!-- ATENCIÓN AL CLIENTE -->
                <div id="contenedorAtencionCliente" class="container-fluid">
                    <!-- Datos principales -->
                    <div class="tituloDatos">
                        <h6>ATENCIÓN AL CLIENTE</h6>
                    </div>

                    <div class="contenedorDatos row container-fluid">

                        <div class="col-12 row">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="col-12 col-sm-1">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier"> 
                                    <path d="M10 19H6.2C5.0799 19 4.51984 19 4.09202 18.782C3.71569 18.5903 3.40973 18.2843 3.21799 17.908C3 17.4802 3 16.9201 3 15.8V8.2C3 7.0799 3 6.51984 3.21799 6.09202C3.40973 5.71569 3.71569 5.40973 4.09202 5.21799C4.51984 5 5.0799 5 6.2 5H17.8C18.9201 5 19.4802 5 19.908 5.21799C20.2843 5.40973 20.5903 5.71569 20.782 6.09202C21 6.51984 21 7.0799 21 8.2V10M20.6067 8.26229L15.5499 11.6335C14.2669 12.4888 13.6254 12.9165 12.932 13.0827C12.3192 13.2295 11.6804 13.2295 11.0677 13.0827C10.3743 12.9165 9.73279 12.4888 8.44975 11.6335L3.14746 8.09863M14 21L16.025 20.595C16.2015 20.5597 16.2898 20.542 16.3721 20.5097C16.4452 20.4811 16.5147 20.4439 16.579 20.399C16.6516 20.3484 16.7152 20.2848 16.8426 20.1574L21 16C21.5523 15.4477 21.5523 14.5523 21 14C20.4477 13.4477 19.5523 13.4477 19 14L14.8426 18.1574C14.7152 18.2848 14.6516 18.3484 14.601 18.421C14.5561 18.4853 14.5189 18.5548 14.4903 18.6279C14.458 18.7102 14.4403 18.7985 14.405 18.975L14 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                                </g>
                            </svg>
                            <h7 class="col-12 col-sm-4">Correo electrónico</h7>
                            <p class="col-12 col-sm-7">Escribe al correo electrónico para cualquier duda o sugerencia: enricruizfp@ibf.cat</p>
                        </div>

                        <div class="col-12 row contenedorInferior">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="col-12 col-sm-1">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506C10.2012 8.49408 10.2643 8.31637 10.2763 8.1317C10.2899 7.92227 10.2096 7.70153 10.0491 7.26005L8.88299 4.05321C8.745 3.67376 8.67601 3.48403 8.55442 3.3441C8.44701 3.22049 8.31089 3.12515 8.15802 3.06645C7.98496 3 7.78308 3 7.37932 3H4.56201C4.08188 3 3.84181 3 3.63598 3.09925C3.4655 3.18146 3.29814 3.33701 3.2037 3.50103C3.08968 3.69907 3.07375 3.91662 3.04189 4.35173C3.01413 4.73086 3 5.11378 3 5.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <h7 class="col-12 col-sm-4">Teléfono</h7>
                            <p class="col-12 col-sm-7">Llámanos por teléfono para obtener más información o preguntar dudas. Teléfono de empresa: 123456789</p>
                        </div>

                        <div class="col-12 row contenedorInferior">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="col-12 col-sm-1">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier"> 
                                    <path d="M9 20L3 17V4L9 7M9 20L15 17M9 20V7M15 17L21 20V7L15 4M15 17V4M9 7L15 4" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                                </g>
                            </svg>
                            <h7 class="col-12 col-sm-4">Visítanos</h7>
                            <p class="col-12 col-sm-7">Acércate al restaurante para consultar dudas. Ubicación: Calle mayor 23, Barcelona.</p>
                        </div>

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