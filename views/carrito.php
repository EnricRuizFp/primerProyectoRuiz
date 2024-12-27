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
            <div id="contenedorProductos" class="col-sm-12 col-md-12 col-lg-12 col-xl-8">

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
                                <div class="producto col-md-6 col-sm-12">
                                    <div class="imagenProducto">
                                        <img src="<?= $producto->getImagen() ?>" width="120px">
                                    </div>
                                    <div class="detallesProducto">
                                        <div class="tituloProducto">
                                            <p class="p3 bold"><?= ucfirst($producto->getNombre()) ?></p>
                                        </div>
                                        <?php if($producto->getSeccion() != 'bebidas'){ ?>
                                            <div class="ingredientesProducto">
                                                <p class="p5"><b>Ingredientes: </b>
                                                    <?php

                                                    $ingredientes = IngredienteDAO::getIngredientesDefault($producto->getId());
                                                    
                                                    foreach($ingredientes as $ingrediente){
                                                        echo " ".$ingrediente->getNombre()." ";
                                                    }

                                                    ?>
                                                </p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    
                                </div>
                                <div class="precio col-md-2 col-sm-12">
                                    <p class="p5 bold"><?php echo $producto->getPrecio(); ?></p>
                                </div>
                                <div class="cantidad col-md-2 col-sm-12">
                                    
                                    <div class="contador">
                                        <a href="?controller=carrito&action=quitar&value=<?= $producto->getId() ?>">-</a>
                                        <span class="valor"><?= $cantidad ?></span>
                                        <a href="?controller=carrito&action=añadir&value=<?= $producto->getId() ?>">+</a>
                                    </div>
                                    
                                </div>
                                <div class="cantidad col-md-2 col-sm-12">
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

            <div id="contenedorProductosPequeño">
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
                        <div id="nombreProducto" class="col-12">
                            <p class="p4 bold">Productos</p>
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
                                <div class="producto col-12">
                                    <div class="imagenProducto">
                                        <img src="<?= $producto->getImagen() ?>" width="120px">
                                    </div>
                                    <div class="detallesProducto">
                                        <div class="tituloProducto">
                                            <p class="p3 bold"><?= ucfirst($producto->getNombre()) ?></p>
                                        </div>
                                        <?php if($producto->getSeccion() != 'bebidas'){ ?>
                                            <div class="ingredientesProducto">
                                                <p class="p5"><b>Ingredientes: </b>
                                                    <?php

                                                    $ingredientes = IngredienteDAO::getIngredientesDefault($producto->getId());
                                                    
                                                    foreach($ingredientes as $ingrediente){
                                                        echo " ".$ingrediente->getNombre()." ";
                                                    }

                                                    ?>
                                                </p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    
                                </div>
                                <div class="precio col-sm-12 col-md-4">
                                    <p class="p5"><b>Precio la unidad:  </b><?php echo $producto->getPrecio(); ?> €</p>
                                </div>
                                <div class="cantidad col-sm-12 col-md-4">

                                    <p class="p5 bold">Cantidad: </p>
                                    
                                    <div class="contador">
                                        <a href="?controller=carrito&action=quitar&value=<?= $producto->getId() ?>">-</a>
                                        <span class="valor"><?= $cantidad ?></span>
                                        <a href="?controller=carrito&action=añadir&value=<?= $producto->getId() ?>">+</a>
                                    </div>
                                    
                                </div>
                                <div class="cantidad col-sm-12 col-md-4">
                                    <p class="p5"><b>Precio total:  </b><?php echo $producto->getPrecio()*$cantidad; ?> €</p>
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
            <div id="contenedorCarrito" class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                
                <div id="contenedorCompra">
                    <div id="contenedorTitulo">
                        <h7>RESUMEN DEL PEDIDO</h7>
                    </div>
                    <div id="contenedorPrecios" class="container-fluid">
                        <div class="row">
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p3">Subtotal artículos</p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p3">€ <?= $precioProductos?></p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p3">Envío</p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p3">GRATIS</p>
                            </div>

                            <!-- Apartado descuento, solo visible si se ha aplicado crrectamente -->
                            <div id="contenedorDescuentoAplicado" class="col-12 container-fluid">
                                <div class="row">
                                    <div class="col-6 contenedorDetallesPrecios">
                                        <p class="p3">Descuento</p>
                                    </div>
                                    <div class="col-6 contenedorDetallesPrecios">
                                        <p class="p3">€ <?= $descuentoAplicado ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p3"><b>Total</b> (incl. 21% IVA)</p>
                            </div>
                            <div class="col-6 contenedorDetallesPrecios">
                                <p class="p3 bold">€ 
                                    <?php 
                                    if(isset($_SESSION['oferta']) && $_SESSION['oferta'] == "SI"){
                                        echo $precioConDescuento;
                                    }else{
                                        echo $precioSinDescuento;
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div id="contenedorCodigoPromocional">
                        <div>
                            <h8>AGREGAR CÓDIGO PROMOCIONAL</h8>
                        </div>

                        <form id="contenedorIntroducirCodigo" action="?controller=carrito&action=oferta" method="POST">
                            <input 
                                id="codigoPromocional" 
                                name="codigoPromocional" 
                                placeholder="Introducir código"
                                value="<?php echo isset($_SESSION['codigoOferta']) ? htmlspecialchars($_SESSION['codigoOferta']) : ""; ?>"
                            >
                            <button type="submit"><b>></b></button>
                        </form>

                        <div id="contenedorErrorCodigo">
                            <p>El codigo no es válido.
                                <svg fill="#b62020" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" stroke="#b62020" width="13px">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M0 14.545L1.455 16 8 9.455 14.545 16 16 14.545 9.455 8 16 1.455 14.545 0 8 6.545 1.455 0 0 1.455 6.545 8z" fill-rule="evenodd"></path>
                                    </g>
                                </svg>
                            </p>
                        </div>

                        <div id="contenedorCodigoAplicado">
                            <p>El código de descuento se ha aplicado correctamente.
                                <svg fill="#3e8626" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="25px">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M5 16.577l2.194-2.195 5.486 5.484L24.804 7.743 27 9.937l-14.32 14.32z"></path>
                                    </g>
                                </svg>
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div id="contenedorPago">
                            
                        <a href="?controller=carrito&action=pagar">
                            <div id="botonPagarAhoraPrimario">
                                <p class="p4 bold">Comprar</p>
                            </div>
                        </a>

                    </div>
                    
                </div>

            </div>
        </div>
        

    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- SCRIPTS -->
    <script>

        // Mostrar contenedor derecho cuando haya productos en el carrito
        <?php if ($cantidadProductos > 0): ?>

            /* -- OFERTA APLICADA -- */
            <?php if ($_SESSION['oferta'] == "SI"): ?>

                // Mostrar oferta en resumen pedido
                document.getElementById('contenedorDescuentoAplicado').style.display = 'block';

                // Mostrar el div de éxito
                document.getElementById('contenedorCodigoAplicado').style.display = 'block';
                document.getElementById('contenedorErrorCodigo').style.display = 'none';

            <?php elseif (!$_SESSION['oferta'] == "NO"): ?>

                // Ocultar contenedor oferta en resumen pedido
                document.getElementById('contenedorDescuentoAplicado').style.display = 'none';

                // Mostrar el div de error
                document.getElementById('contenedorCodigoAplicado').style.display = 'none';
                document.getElementById('contenedorErrorCodigo').style.display = 'block';

            <?php else: ?>

                // Ocultar contenedor oferta en resumen pedido
                document.getElementById('contenedorDescuentoAplicado').style.display = 'none';

                // Si no hay oferta válida o inválida, ocultamos ambos divs
                document.getElementById('contenedorCodigoAplicado').style.display = 'none';
                document.getElementById('contenedorErrorCodigo').style.display = 'none';
            
            <?php endif; ?>
        
        // No mostrar el contenedor derecho si no hay productos en el carrito
        <?php else: ?>

            document.getElementById('contenedorCarrito').style.display = 'none';
            document.getElementById('contenedorProductos').style.height = '500px';
            document.getElementById('contenedorProductos').className = 'col-12';
        
        <?php endif; ?>           


    </script>

</body>
</html>