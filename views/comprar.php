<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/comprar.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    
    <div id="barraNavegacionComprar">
        <a href="?controller=general">
            <img src="media/images/logos/Logo_LA_BUENIZZIMA_6-removebg-preview.png" height="50px">
        </a>
    </div>

    <div id="contenedorPrincpal" class="container-fluid">
        <div id="seccionTitulo" class="row">
            <div id="tituloPagina" class="col-12">
                <h4>PAGAR</h4>
            </div>
        </div>

        <div id="contenidoPagina" class="row">

            <!-- SECCIÓN ENVÍO -->
            <div id="seccionEnvio" class="col-7">
                <div id="contenedorTitulo">
                    <div id="tituloEnvio">
                        <h6>Envío</h6>
                    </div>
                    <div id="subtituloEnvio">
                        <p class="p5">Dónde quieres que te enviemos las pizzas?</p>
                    </div>
                </div>

                <div id="sinSesion">
                    <h7>No has iniciado sesión!</h7>
                    <p>Para que te podamos entregar tu comida, debes iniciar sesión con tu cuenta.</p>
                    <p>Haz click <a href="?controller=usuario&action=login">aquí</a> para iniciar sesión.</p>
                </div>

                <div id="sinDatosBancarios">
                    <h7>La cuenta no tiene datos bancarios!</h7>
                    <p>Para que te podamos entregar tu comida, debes introducir tus datos bancarios.</p>
                    <p>Haz click <a href="?controller=usuario">aquí</a> y agrega los datos de tu tarjeta.</p>
                </div>

                <div id="sinDirecciones">
                    <h7>Sin direcciones</h7>
                    <p>Para que te podamos entregar tu comida, debes añadir una dirección.</p>
                    <p>Haz click <a href="?controller=usuario">aquí</a> para entrar en tu cuenta.</p>
                </div>

                <div id="listadoDirecciones">

                    <form id="formularioDirecciones" action="?controller=carrito&action=seleccionarDireccion" method="POST">

                        <select id="direccion" name="direccion" class="form-select" multiple required>

                            <?php

                                foreach($direcciones as $direccion){

                                    ?>
                                    
                                    <option class="direccionSeleccionable" value="<?= $direccion->getId() ?>">
                                        <p class="p5 bold"><?= $direccion->getCalle()?></p>
                                    </option>

                                    <?php

                                }
                            ?>

                        </select>

                        <button id="botonEnviarDireccion" type="submit" class="p4 bold">Seleccionar</button>

                    </form>

                </div>

                <!-- Dirección seleccionada correctamente -->
                <div id="direccionSeleccionada">
                    <p>Los productos se enviarán a la dirección seleccionada.</p>
                </div>
            </div>

            <!-- SECCION RESUMEN -->
            <div id="seccionResumen" class="col-5">
                <div id="contenedorSeccionResumen">

                    <div id="contenedorCesta">
                        <h7>RESUMEN DE LA CESTA</h7>

                        <div id="contenedorResumenProductos">

                            <?php

                                foreach($productosCarrito as $productoCarrito){

                                    $producto = $productoCarrito['producto'];
                                    $cantidad = $productoCarrito['cantidad'];

                                    ?>

                                    <div class="contenedorProducto container-fluid">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="<?= $producto->getImagen() ?>" width="100px">
                                            </div>
                                            <div class="col-9">
                                                <p class="p3 bold">Producto: <?= $producto->getNombre() ?></p>
                                                <p class="p5">Cantidad: <?= $cantidad ?></p>
                                                <p class="p5">Precio: <?= $cantidad*$producto->getPrecio() ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <?php

                                }

                            ?>

                        </div>

                    </div>

                    <hr>

                    <div id="contenedorResumen" class="container-fluid">
                        <h7>RESUMEN DEL PEDIDO</h7>

                        <div class="row">

                            <div class="col-8">
                                <p>Subtotal de artículos</p>
                            </div>
                            <div class="col-4">
                                <p><?php echo $precioProductos ?> €</p>
                            </div>

                            <div class="col-8">
                                <p>Envío</p>
                            </div>
                            <div class="col-4">
                                <p>GRATIS</p>
                            </div>

                            <div id="contenedorDescuento" class="container-fluid col-12">
                                <dav class="row">
                                    <div class="col-8">
                                        <p>Descuento</p>
                                    </div>
                                    <div class="col-4">
                                        <p>-<?= $descuentoAplicado ?> €</p>
                                    </div>
                                </dav>
                            </div>

                            <div class="col-8">
                                <p>Dirección de entrega</p>
                            </div>
                            <div class="col-4">
                                <p><?php if(isset($direccionActual)){echo $direccionActual->getCalle();}else{echo "Seleccione una dirección";} ?></p>
                            </div>

                            <div class="col-8">
                                <p class="p4"><b>Total</b> (incl. 21% IVA)</p>
                            </div>
                            <div class="col-4">
                                <p><?php if(isset($descuentoAplicado) && $descuentoAplicado != null){echo $precioConDescuento; }else{echo $precioSinDescuento; } ?> €</p>
                            </div>

                        </div>

                        <div id="datosInvalidos">
                            <p>Para poder pagar, primero rellena todos los datos.</p>
                        </div>

                        <a id="botonPagar" href="?controller=carrito&action=comprar">
                            <div class="botonPedirAhoraPrimario">
                                <p class="p4 bold">Pagar ahora</p>
                            </div>
                        </a>
                        
                    </div>
                </div>
                
            </div>
            
        </div>
        

    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- VISTA DE LA PÁGINA -->
    <script>

        // Variables externas
        const sesionActual = <?= isset($_SESSION['usuarioActual']) ? $_SESSION['usuarioActual'] : 'null'; ?>;
        const cantidadDirecciones = <?= isset($cantidadDirecciones) ? $cantidadDirecciones : 'null'; ?>;
        const direccionActual = <?= isset($_SESSION['direccionActual']) ? $_SESSION['direccionActual'] : 'null'; ?>;
        const datosBancariosValidos = <?= isset($datosBancariosValidos) ? $datosBancariosValidos : 'null'; ?>;

        const valorDescuento = <?= isset($descuentoAplicado) ? $descuentoAplicado : 'null'; ?>;

        document.addEventListener('DOMContentLoaded', () => {

            /* ----- DEFINICIÓN DE LOS ELEMENTOS ----- */

            // Contenedor direcciones
            const contenedorTitulo = document.getElementById('contenedorTitulo');
            const contenedorSinSesion = document.getElementById('sinSesion');
            const contenedorSinDatosBancarios = document.getElementById('sinDatosBancarios');
            const contenedorsinDirecciones = document.getElementById('sinDirecciones');
            const contenedorFormularioDirecciones = document.getElementById('listadoDirecciones');
            const contenedorDireccionSeleccionada = document.getElementById('direccionSeleccionada');

            // Boton enviar direccion
            const botonEnviarFormulario = document.getElementById('botonMostrarPerfil');

            // Contenedor Descuento
            const contenedorDescuento = document.getElementById('contenedorDescuento');

            // Validación datos
            const contenedorDatosInvalidos = document.getElementById('datosInvalidos');
            const botonPagar = document.getElementById('botonPagar')


            /* -- FUNCIONES -- */

            if(sesionActual != null){

                // Sesión iniciada
                contenedorSinSesion.style.display = 'none';

                if(datosBancariosValidos){

                    // Datos bancarios válidos
                    contenedorSinDatosBancarios.style.display = 'none';

                    if(cantidadDirecciones > 0){

                        // Al menos una dirección
                        contenedorsinDirecciones.style.display = 'none';

                        if(direccionActual){

                            // Dirección ya añadida
                            contenedorTitulo.style.display = 'none';
                            contenedorFormularioDirecciones.style.display = 'none';
                            contenedorDireccionSeleccionada.style.display = 'block';

                            contenedorDatosInvalidos.style.display = 'none';
                            botonPagar.style.display = 'block';
                        }else{

                            //Dirección por añadir
                            contenedorTitulo.style.display = 'block';
                            contenedorFormularioDirecciones.style.display = 'block';
                            contenedorDireccionSeleccionada.style.display = 'none';

                            contenedorDatosInvalidos.style.display = 'block';
                            botonPagar.style.display = 'none';
                        }

                    }else{

                        // Usuario sin direcciones
                        contenedorsinDirecciones.style.display = 'block';
                        contenedorFormularioDirecciones.style.display = 'none';
                        contenedorDireccionSeleccionada.style.display = 'none';
                    } 

                }else{

                    // Usuario sin datos bancarios
                    contenedorSinDatosBancarios.style.display = 'block';
                    contenedorsinDirecciones.style.display = 'none';
                    contenedorFormularioDirecciones.style.display = 'none';
                    contenedorDireccionSeleccionada.style.display = 'none';

                }                               
                

            }else{

                // No se ha iniciado sesión
                contenedorSinSesion.style.display = 'block';
                contenedorSinDatosBancarios.style.display = 'none';
                contenedorsinDirecciones.style.display = 'none';
                contenedorFormularioDirecciones.style.display = 'none';
                contenedorDireccionSeleccionada.style.display = 'none';

            }

            if(valorDescuento == 0){
                contenedorDescuento.style.display = 'none';
            }else{
                contenedorDescuento.style.display = 'block';
            }

        });

    </script>

</body>
</html>