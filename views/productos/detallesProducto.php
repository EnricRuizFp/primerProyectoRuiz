<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/producto.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    
    <div class="barraNavegacion fixed-top">
        <?php include_once "views/others/navbar.php"; ?>
    </div>

    <div id="contenedorGeneral" class="container-fluid">
        <div id="contenedorContenido" class="row">

            <div class="migasDePan col-12">
                <p class="p5 bold no-margin"><a href="?controller=general" class="linkMigasPan">Inicio</a> > <a href="?controller=general&action=productos" class="linkMigasPan">Productos</a> > <a href="?controller=general&action=<?php echo ucfirst($producto->getSeccion()); ?>" class="linkMigasPan"><?php echo ucfirst($producto->getSeccion()); ?></a> > <?php echo ucfirst($producto->getNombre()); ?></p>
            </div>
            <div id="barraMigasDePan">
                <hr>
            </div>

            <div id="contenedorIzquierdo" class="col-12 col-xl-6">
                <div id="contenedorImagen">
                    <img src="<?php echo $producto->getImagen() ?>" alt="Imagen del producto." width="500px">
                </div>
            </div>
            <div id="contenedorDerecho" class="col-12 col-xl-6">
                <div id="contenedorDetalles">
                    <div id="contenidoDetalles">
                        <div id="tituloDetalles">
                            <h4>
                                <?php echo ucfirst($producto->getNombre()); ?>
                            </h4>
                        </div>

                        <div class="barraSeparación"><hr></div>

                        <div id="subtituloDetalles">
                            <p class="p3">
                                <p class="p2 bold">Descripción</p>
                                <?php echo ucfirst($producto->getDescripcion()); ?>
                            </p>
                        </div>

                        <div id="ingredientesDefault">
                            <p class="p3">
                                <p class="p2 bold inline-flex">
                                    Ingredientes
                                    <div id="iconoInformacionIngredientesDefault">
                                        <svg width="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#000000" fill-rule="evenodd" d="M10 3a7 7 0 100 14 7 7 0 000-14zm-9 7a9 9 0 1118 0 9 9 0 01-18 0zm8-4a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm.01 8a1 1 0 102 0V9a1 1 0 10-2 0v5z"/>
                                        </svg>
                                    </div>
                                </p>

                                <div id="contenedorIngredienteDefault">

                                    <?php
                                    
                                        foreach($ingredientesPorDefecto as $ingredientePorDefecto){
                                            ?>
                                            <div class="contenidoIngredienteDefault">
                                                <p class="p4"> <?= $ingredientePorDefecto->getNombre(); ?> </p>
                                            </div>
                                            <?php
                                        }

                                    ?>
                                </div>
                            </p>
                        </div>

                        <div id="contenedorPrecio">

                            <p class="p2 bold">Precio</p>

                            <p class="p3"><?php echo $producto->getPrecio(); ?> €</p>
                            
                        </div>

                        <div id="contenedorInferior">

                            <p class="p2 bold">Finalizar</p>

                            <a href="?controller=carrito&action=añadir&value=<?= $producto->getId(); ?>">
                                <div class="botonAñadirAlCarrito">
                                    <p class="p4 bold">Añadir al carrito</p>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div id="contenedorSeccionProductosSimilares" class="col-12">

                <div id="tituloSeccionProductosSimilares">
                    <h5>Productos similares</h5>
                </div>

                <div id="contenidoSeccionProductosSimilares">

                <?php

                foreach($productosSimilares as $productoSimilar){

                    ?>
                    
                    <div class="contenedorPizzasSeccionProductosSimilares">
                        <div class="separadorImagenSeccionProductosSimilares">
                            <img src="<?= $productoSimilar->getImagen()?>" width="80%"> <!-- Imagen producto -->
                        </div>
                        <div class="separadorContenidoSeccionProductosSimilares">

                            <div class="lineaDivisoraContenidoSeccionProductosSimilares">
                                <hr>
                            </div>
                            <div class="tituloContenidoSeccionProductosSimilares">
                                <h7 class="naranja"><?= $productoSimilar->getNombre()?></h7>
                            </div>
                            <div class="textoContenidoSeccionProductosSimilares">
                                <p class="p5 bold"><?= $productoSimilar->getDescripcion()?></p>
                            </div>
                            <div class="precioContenidoSeccionProductosSimilares">
                                <p class="p2 bold"><?= $productoSimilar->getPrecio()?> €</p>
                            </div>

                            <a href="?controller=producto&action=producto&value=<?= $productoSimilar->getId()?>">
                                <div class="botonPedirAhoraPrimario">
                                    <p class="p4 bold">Pedir ahora</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php
                }

                ?>

                </div>
            </div>

        </div>

    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Script visibilidad Ingredientes -->
    <script>

        const tipoProducto = '<?= $producto->getSeccion() ?>';

        console.log(tipoProducto);

        const contenedorIngredientes = document.getElementById('ingredientesDefault');

        if(tipoProducto == 'bebidas'){
            contenedorIngredientes.style.display = 'none';
        }else{
            contenedorIngredientes.style.display = 'block';
        }

    </script>

    


</body>
</html>