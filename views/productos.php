<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/paginaProductos.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


</head>
<body>
    
    <div class="barraNavegacion fixed-top">

        <?php include_once "views/others/navbar.php"; ?>

    </div>

    <?php echo "<br><br><br><br><br><br><br><br>FILTRO CAT: ".$_SESSION['filtroCat']."<br>FILTRO PRECIO: ".$_SESSION['filtroPre']; ?>


    <div id="migasDePan">
        <p class="p4 bold">Inicio > Productos</p>
    </div>

    <div id="contenedorPrincipal">
        <div id="contenedorFiltros">
            
            <div id="contenedorGategorias">
                <h7>Categorías</h7>
                <div id="contenidoCategorias">
                    <a href="?controller=producto&action=filtroCat&value=especialidades"><p class="p4">Especialidades</p></a>
                    <a href="?controller=producto&action=filtroCat&value=clasicas"><p class="p4">Clásicas</p></a>
                    <a href="?controller=producto&action=filtroCat&value=picantes"><p class="p4">Picantes</p></a>
                    <a href="?controller=producto&action=filtroCat&value=vegetarianas"><p class="p4">Vegetarianas</p></a>
                </div>
            </div>

            <div id="contenedorPrecios">
                <h7>Precio</h7>
                <div id="contenidoPrecios">
                    <a href="?controller=producto&action=filtroPre&value=menos"><p class="p4">Hasta 15€</p></a>
                    <a href="?controller=producto&action=filtroPre&value=mas"><p class="p4">Más de 15€</p></a>
                </div>
            </div>

        </div>
        <div id="contenedorContenido">

            <!-- DEPENDIENDO DE LOS FILTROS, MUESTRA UNA COSA U OTRA -->
            <?php

                // Obtiene los datos filtrados
                $productos_para_mostrar = productoController::getProductosParaMostrar();

                var_dump($productos_para_mostrar);
            ?>

        </div>
        <div id="contenedorOrderBy">
            
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>