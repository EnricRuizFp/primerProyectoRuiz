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

    <div id="contenedorGeneral">
        <?php
            echo "ID: ".$producto->getId()."<br>";
            echo "Nombre: ".$producto->getNombre()."<br>";
            echo "Descripcion: ".$producto->getDescripcion()."<br>";
            echo "Precio: ".$producto->getPrecio()."<br>";
            echo "Imagen: ".$producto->getImagen();
        ?>

        <div id="contenedorContenido">

            <div id="contenedorIzquierdo">
                <div id="contenedorImagen">
                    <img src="<?php echo $producto->getImagen() ?>" alt="Imagen del producto." width="500px">
                </div>
            </div>
            <div id="contenedorDerecho">
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
                                <p class="p2 bold">Ingredientes</p>
                                <?php
                                
                                    foreach($ingredientesPorDefecto as $ingredientePorDefecto){
                                        echo $ingredientePorDefecto->getNombre()."<br>";
                                    }

                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</body>
</html>