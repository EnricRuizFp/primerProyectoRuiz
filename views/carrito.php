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
                                    <p class="p5 bold"><?php echo $producto->getPrecio()*$cantidad; ?></p>
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
                            <div class="col-6">
                                <p class="p5">Subtotal artículos</p>
                            </div>
                            <div class="col-6">
                                <p class="p5">PRECIO</p>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
        

    </div>

    <?php include_once "views/others/footer.php"; ?>

</body>
</html>