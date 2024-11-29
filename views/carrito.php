<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/carrito.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    
    <div class="barraNavegacion fixed-top">
        <?php include_once "views/others/navbar.php"; ?>
    </div>

    <div id="contenedorPrincpal" class="container-fluid">
        <div class="row">
            <div id="tituloPagina" class="col-12">
                <h4>TU CESTA</h4>
            </div>
        </div>
        

        <div id="contenidoPagina" class="row">

            <!-- SECCIÓN CARRITO -->
            <div id="contenedorProductos" class="col-sm-12 col-md-12 col-lg-8 col-xl-8">

                <?php

                if(empty($productosCarrito)){
                    ?>
                    <div id="carritoSinArticulos">
                        <p class="p4"><?php echo "No tienes artículos en tu cesta" ?></p>
                        <a href="?controller=general&action=productos">
                            <div class="botonPedirAhoraPrimario" id="botonVolverAComprar">
                                <p class="p4 bold">VOLVER A COMPRAR</p>
                            </div>
                        </a>
                    </div>
                    <?php
                }else{
                
                ?>
                
                <hr>
                <div id="tituloProductos" class="container">
                    <div class="row">
                        <div id="nombreProducto" class="col-6">
                            <p class="p4 bold">Producto</p>
                        </div>
                        <div id="precioProducto" class="col-2">
                            <p class="p4 bold">Precio por unidad</p>
                        </div>
                        <div id="cantidadProducto" class="col-2">
                            <p class="p4 bold">Cantidad</p>
                        </div>
                        <div id="totalProducto" class="col-2">
                            <p class="p4 bold">Total</p>
                        </div>
                    </div>
                </div>
                <hr>

                <?php

                    // Foreach de los productos en la cesta
                    foreach($productosCarrito as $productoCarrito) {

                        $producto = $productoCarrito['producto'];
                        $cantidad = $productoCarrito['cantidad'];

                        ?>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="producto col-6">
                                    <div class="imagenProducto">
                                        <img src="<?= $producto->getImagen() ?>" width="120px">
                                    </div>
                                    <div class="detallesProducto">
                                        <div class="tituloProducto">
                                            <p class="p3 bold"><?= ucfirst($producto->getNombre()) ?></p>
                                        </div>
                                        <div class="ingredientesProducto">
                                            <p class="p5"> Ingredientes: 
                                                <?php

                                                $ingredientes = IngredienteDAO::getIngredientesDefault($producto->getId());
                                                
                                                foreach($ingredientes as $ingrediente){
                                                    echo " ".$ingrediente->getNombre()." ";
                                                }

                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="precio col-2">
                                    <p class="p5 bold"><?php echo $producto->getPrecio(); ?></p>
                                </div>
                                <div class="cantidad col-2">
                                    
                                    <div class="contador">
                                        <a href="?controller=carrito&action=quitar&value=<?= $producto->getId() ?>">-</a>
                                        <span class="valor"><?= $cantidad ?></span>
                                        <a href="?controller=carrito&action=añadir&value=<?= $producto->getId() ?>">+</a>
                                    </div>
                                    
                                </div>
                                <div class="cantidad col-2">
                                    <p class="p5 bold"><?php echo "€ ".$producto->getPrecio()*$cantidad; ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <?php
                    }

                    ?>

                    <div id="contenedorAyuda" class="container">
                        <div class="row">
                            <div id="contenedorCentradoAyuda" class="col-6 mx-auto">
                                <div id="tituloAyuda">
                                    <p class="p4 bold">Asistencia al cliente</p>
                                </div>
                                <div id="subtituloAyuda">
                                    <p class="p4">¿ Necesitas ayuda ?</p>
                                </div>
                                <div id="contenidoAyuda">
                                    <p class="p4">Haga <a href="?controller=general&action=contacto" class="bold">clic aquí</a> para ponerse en contacto con nosotros.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php

                }

                ?>

            </div>

            <!-- SECCIÓN PAGAR -->
            <div id="contenedorCarrito" class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                
                <div id="contenedorCompra">
                    <div id="contenedorTitulo">
                        <h7>RESUMEN DEL PEDIDO</h7>
                    </div>
                    <div id="contenedorPrecios" class="container-fluid">
                        <div class="row">
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p4">Subtotal artículos</p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p4">€ <?= $precioProductos?></p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p4">Envío</p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p4">GRATIS</p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p4"><b>Total</b> (incl. 21% IVA)</p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p4 bold">€ <?= $precioProductos?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="contenedorCodigoPromocional" class="container">
                        <div class="row">
                            <div class="col-10">
                                <h8>AGREGAR CÓDIGO PROMOCIONAL</h8>
                            </div>
                            <div class="col-2">
                                <svg id="botonMostrarContenedorCodigoPromocional" width="50%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#0F0F0F"/>
                                </svg>
                            </div>
                        </div>

                        <form id="contenedorIntroducirCodigo" action="?controller=carrito&action=oferta" method="POST">
                            <input 
                                id="codigoPromocional" 
                                name="codigoPromocional" 
                                placeholder="Introducir código"
                                value="<?php echo isset($_POST['codigoPromocional']) ? htmlspecialchars($_POST['codigoPromocional']) : ""; ?>"
                            >
                            <button type="submit"><b>></b></button>
                        </form>

                        <div id="contenedorErrorCodigo">
                            <p>El codigo no es válido.</p>
                        </div>

                        <div id="contenedorCodigoAplicado">
                            <p>El código de descuento se ha aplicado correctamente.</p>
                        </div>

                    </div>
                    <hr>
                    
                </div>

            </div>
        </div>
        

    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- SCRIPTS -->
    <script>

        /* -- DESGLOSE DEL APARTADO DE OFERTAS -- */

        // Obtener botón y contenedor
        const mostrarBtn = document.getElementById('botonMostrarContenedorCodigoPromocional');
        const contenido = document.getElementById('contenedorIntroducirCodigo');

        // Añadir evento de click al botón
        mostrarBtn.addEventListener('click', () => {
            // Si el contenedor está oculto
            if (contenido.style.height === '0px' || contenido.style.height === '') {
                contenido.style.height = contenido.scrollHeight + 'px'; // Desplegar
                contenido.style.visibility = 'visible'; 
                contenido.style.opacity = '1';
                contenido.classList.add('mostrado'); // Añadimos clase para el borde
            } else {
                contenido.style.height = '0px'; // Colapsar
                contenido.style.visibility = 'hidden'; 
                contenido.style.opacity = '0';
                contenido.classList.remove('mostrado'); // Quitamos la clase para el borde
            }
        });


        /* -- OFERTA APLICADA -- */
        <?php if ($_SESSION['oferta'] == "SI"): ?>

            // Mostrar el div de éxito
            document.getElementById('contenedorCodigoAplicado').style.display = 'block';
            document.getElementById('contenedorErrorCodigo').style.display = 'none';

        <?php elseif (!$_SESSION['oferta'] == "NO"): ?>

            // Mostrar el div de error
            document.getElementById('contenedorCodigoAplicado').style.display = 'none';
            document.getElementById('contenedorErrorCodigo').style.display = 'block';

        <?php else: ?>

            // Si no hay oferta válida o inválida, ocultamos ambos divs
            document.getElementById('contenedorCodigoAplicado').style.display = 'none';
            document.getElementById('contenedorErrorCodigo').style.display = 'none';
        
        <?php endif; ?>


    </script>

</body>
</html>