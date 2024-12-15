<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/pedido.css">

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
            <h4>TU PEDIDO</h4>
        </div>
    </header>

    <div id="botonVolver">
        <a href="?controller=usuario">< Volver</a>
    </div>
    

    <!-- CONTENEDOR PRINCIPAL -->
    <div id="contenedorPrincipal" class="container-fluid">

        <div class="row container-fluid">

            <div id="contenedorDetalles" class="col-9 mx-auto row">

                <div id="contenedorDetallesPedido" class="col-3 row">

                    <div class="col-12 tituloDetalles">
                        <h7>Detalles</h7>
                    </div>

                    <div class="col-6">
                        <p class="p5 bold">Identificador</p>
                    </div>
                    <div class="col-6">
                        <p class="p5"><?= $pedido->getId() ?></p>
                    </div>
                    <div class="col-6">
                        <p class="p5 bold">Fecha</p>
                    </div>
                    <div class="col-6">
                        <p class="p5"><?= $pedido->getFecha() ?></p>
                    </div>
                    <div class="col-6">
                        <p class="p5 bold">Precio inicial</p>
                    </div>
                    <div class="col-6">
                        <p class="p5"><?= $pedido->getPrecio() ?></p>
                    </div>
                    <div class="col-6">
                        <p class="p5 bold">Descuento</p>
                    </div>
                    <div class="col-6">
                        <p class="p5"><?= $pedido->getDescuento() ?></p>
                    </div>
                    <div class="col-6">
                        <p class="p5 bold">Precio final</p>
                    </div>
                    <div class="col-6">
                        <p class="p5"><?= $pedido->getPrecioFinal() ?></p>
                    </div>

                </div>

                <div id="contenedorDetallesProductos" class="col-9 row">

                    <div class="col-12 tituloDetalles">
                        <h7>Productos</h7>
                    </div>

                    <div class="col-3">
                        <p class="p5 bold">Productos</p>
                    </div>
                    <div class="col-6">
                        <p class="p5 bold">Ingredientes</p>
                    </div>
                    <div class="col-2">
                        <p class="p5 bold">Precio unitario</p>
                    </div>
                    <div class="col-1">
                        <p class="p5 bold">Precio</p>
                    </div>

                    <?php

                    foreach($pedidoProductos as $pedidoProducto){

                        $producto = ProductoDAO::getProducto($pedidoProducto['producto_id']);
                        $ingredientes = IngredienteDAO::getIngredientesDefault($producto->getId());

                        ?>

                        <hr>

                        <div class="col-3">
                            <p class="p5"><b><?= $pedidoProducto['cantidad']?>x</b> <?= ucfirst($producto->getNombre())?></p>
                        </div>
                        <div class="col-6">
                            
                            <?php

                            $total = count($ingredientes); // Total de ingredientes
                            foreach ($ingredientes as $index => $ingrediente) {
                                echo ucfirst($ingrediente->getNombre());
                                
                                // Comprueba si es el último índice
                                if ($index === $total - 1) {
                                    echo ".";
                                } else {
                                    echo ", ";
                                }
                            }

                            ?>

                        </div>
                        <div class="col-2">
                            <p class="p5"><?= $producto->getPrecio()?></p>
                        </div>
                        <div class="col-1">
                            <p class="p5"><?= $pedidoProducto['precio']?></p>
                        </div>

                        <?php

                    }

                    ?>

                    <hr>

                    <div class="col-9"></div>
                    <div class="col-3 row">

                        <div class="col-9">
                            <p class="p5 bold">Total:</p>
                        </div>
                        <div class="col-3">
                            <?= $pedido->getPrecioFinal() ?>
                        </div>

                    </div>

                </div>

                <div id="contenedorDireccion" class="col-12 row">

                    <h7 class="col-12 tituloDetalles">Entrega</h7>

                    <div class="col-3">
                        <p class="p5 bold">Dirección de entrega</p>
                    </div>
                    <div class="col-3">
                        <p class="p5 bold">Código postal</p>
                    </div>
                    <div class="col-3">
                        <p class="p5 bold">Ciudad</p>
                    </div>
                    <div class="col-3">
                        <p class="p5 bold">Estado de la entrega</p>
                    </div>

                    <div class="col-3">
                        <p class="p5"><?= $direccion->getCalle() ?></p>
                    </div>
                    <div class="col-3">
                        <p class="p5"><?= $direccion->getCodigoPostal() ?></p>
                    </div>
                    <div class="col-3">
                        <p class="p5"><?= $direccion->getCiudad() ?></p>
                    </div>

                    <div id="detalleEstado" class="col-3">
                        <p 
                            class="p5 estado"
                            style="<?php if($pedido->getEstado() == 'pedido'){?> color: red <?php }else if($pedido->getEstado() == 'en reparto'){?> color: orange <?php }else{?> color: green <?php } ?>" 
                            data-hover="<?php 
                                if($pedido->getEstado() == 'pedido') {
                                    echo 'El pedido está pendiente de preparación.';
                                } else if($pedido->getEstado() == 'en reparto') {
                                    echo 'El pedido está en camino.';
                                } else {
                                    echo 'El pedido ha sido entregado.';
                                } ?>"
                        >
                            <?= $pedido->getEstado() ?>
                        </p>
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

</body>
</html>