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

                    <button id="botonMostrarPerfil" type="button"><h8>PERFIL</h8></button>
                    <hr>
                    <button id="botonMostrarMisPedidos" type="button"><h8>MIS PEDIDOS</h8></button>
                    <hr>
                    <button id="botonMostrarAtencionCliente" type="button"><h8>ATENCIÓN AL CLIENTE</h8></button>

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
                <div id="contenedorMisPedidos">
                    <!-- Datos principales -->
                    <div class="tituloDatos">
                        <h6>MIS PEDIDOS</h6>
                    </div>

                    <div class="contenedorDatos">

                        <?php

                            foreach($pedidos as $pedido) {

                                echo "PEDIDO: ".$pedido->getId();
                                echo "OFERTA: ".$pedido->getOfertaId();
                                echo "DESCUENTO: ".$pedido->getDescuento();
                                echo "PRECIO: ".$pedido->getPrecioFinal();
                                echo "ESTADO: ".$pedido->getEstado();
                                echo "FECHA: ".$pedido->getFecha()."<br><br>";

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

    <a href="?controller=general&action=admin">ADMIN</a>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT DE ANIMACIONES Y BOTONES -->
    <script>

        document.addEventListener('DOMContentLoaded', () => {

            /* ----- DEFINICIÓN DE LOS ELEMENTOS ----- */

            /* -- BARRA LATERAL -- */
            const botonMostrarPerfil = document.getElementById('botonMostrarPerfil');
            const botonMostrarPedidos = document.getElementById('botonMostrarMisPedidos');
            const botonMostrarAtencionCliente = document.getElementById('botonMostrarAtencionCliente');

            const contenedorPerfil = document.getElementById('contenedorPerfil');
            const contenedorMisPedidos = document.getElementById('contenedorMisPedidos');
            const contenedorAtencionCliente = document.getElementById('contenedorAtencionCliente');

            console.log("botonMostrarPerfil");

            /* -- CONTENIDO PRINCIPAL -- */

            // Contenedor perfil
            const contenedorDatos = document.getElementById('contenedorDatos');
            const contenedorEditarDatos = document.getElementById('contenedorEditarDatos');
            const formularioEditarDatos = document.getElementById('formularioEditarDatos');

            const botonEditarDatos = document.getElementById('botonEditarDatos');
            const botonGuardarEditarDatos = document.getElementById('guardarEditarDatos');
            const botonDescartarEditarDatos = document.getElementById('descartarEditarDatos');

            // Contenedor direcciones
            const contenedorDirecciones = document.getElementById('contenedorDirecciones');
            const contenedorAñadirDirecciones = document.getElementById('contenedorAñadirDirecciones');
            const formularioAñadirDirecciones = document.getElementById('formularioAñadirDirecciones');

            const botonAñadirDirecciones = document.getElementById('añadirDireccion');
            const botonDescartarAñadirDireccion = document.getElementById('descartarAñadirDireccion');
            const botonGuardarAñadirDireccion = document.getElementById('guardarAñadirDireccion');

            // Contenedor Tarjeta Bancaria
            const contenedorDatosBancarios = document.getElementById('contenedorDatosBancarios');
            const contenedorEditarDatosBancarios = document.getElementById('contenedorEditarDatosBancarios');
            const formularioEditarDatosBancarios = document.getElementById('formularioEditarDatosBancarios');

            const botonDesbloquearDatosBancarios = document.getElementById('desbloquearDatosBancarios');
            const botonEditarDatosBancarios = document.getElementById('editarDatosBancarios');
            const botonDescartarEditarDatosBancarios = document.getElementById('descartarEditarDatosBancarios')
            const botonGuardarEditarDatosBancarios = document.getElementById('guardarEditarDatosBancarios');

            


            /* ----- FUNCIONES DE LOS ELEMENTOS ----- */

            /* -- BARRA LATERAL -- */
            botonMostrarPerfil.addEventListener('click', () => {
                contenedorPerfil.style.display = 'block';
                contenedorMisPedidos.style.display = 'none';
                contenedorAtencionCliente.style.display = 'none';
            });
            botonMostrarPedidos.addEventListener('click', () => {
                contenedorPerfil.style.display = 'none';
                contenedorMisPedidos.style.display = 'block';
                contenedorAtencionCliente.style.display = 'none';
            });
            botonMostrarAtencionCliente.addEventListener('click', () => {
                contenedorPerfil.style.display = 'none';
                contenedorMisPedidos.style.display = 'none';
                contenedorAtencionCliente.style.display = 'block';
            });

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

            // Contenedor direcciones
            botonAñadirDirecciones.addEventListener('click', () => {
                contenedorDirecciones.style.display = 'none';
                contenedorAñadirDirecciones.style.display = 'block';
            });
            botonDescartarAñadirDireccion.addEventListener('click', () => {
                contenedorDirecciones.style.display = 'block';
                contenedorAñadirDirecciones.style.display = 'none';
            });
            botonGuardarAñadirDireccion.addEventListener('click', () => {
                formularioAñadirDirecciones.submit();
                contenedorDirecciones.style.display = 'block';
                contenedorAñadirDirecciones.style.display = 'none';
            });

            // Contenedor datos bancarios
            botonDesbloquearDatosBancarios.addEventListener('click', () => {
                botonDesbloquearDatosBancarios.style.display = 'none';
                contenedorDatosBancarios.style.display = 'block';
            });
            botonEditarDatosBancarios.addEventListener('click', () => {
                contenedorDatosBancarios.style.display = 'none';
                contenedorEditarDatosBancarios.style.display = 'block';
            });
            botonGuardarEditarDatosBancarios.addEventListener('click', () => {
                formularioEditarDatosBancarios.submit();
                contenedorDatosBancarios.style.display = 'block';
                contenedorEditarDatosBancarios.style.display = 'none';
            });
            botonDescartarEditarDatosBancarios.addEventListener('click', () => {
                contenedorDatosBancarios.style.display = 'block';
                contenedorEditarDatosBancarios.style.display = 'none';
            });


        });

    </script>

</body>
</html>