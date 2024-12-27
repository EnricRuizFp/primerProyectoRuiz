<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTRES</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/generalProductos.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


</head>
<body>
    
    <div class="barraNavegacion fixed-top">

        <?php include_once "views/others/navbar.php"; ?>

    </div>

    <div class="migasDePan">
    <p class="p5 bold"><a href="?controller=general" class="linkMigasPan">Inicio</a> > <a href="?controller=general&action=productos" class="linkMigasPan">Productos</a> > Postres</p>
    </div>

    <div class="contenedorPrincipal container-fluid">
        <div class="row">
            <div class="contenedorFiltros col-sm-12 col-md-12 col-lg-12 col-xl-2">
                <div class="contenedorFiltrosSticky">
                    <div class="contenedorFiltroGategorias">
                        <h7>Categorías</h7>
                        <div class="contenidoFiltroCategorias">
                            <a href="?controller=producto&action=filtroCatPo&value=tartas">
                                <div class="filtroVista">
                                    <input type="checkbox" id="checkCategoriaPizzas" <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'tartas') ? 'checked' : '' ?>>
                                    <p class="p4 <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'tartas') ? 'bold' : '' ?>">Tartas</p>
                                </div>    
                            </a>
                            <a href="?controller=producto&action=filtroCatPo&value=helados">
                                <div class="filtroVista">
                                    <input type="checkbox" id="checkCategoriaPizzas" <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'helados') ? 'checked' : '' ?>>
                                    <p class="p4 <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'helados') ? 'bold' : '' ?>">Helados</p>
                                </div>
                            </a>
                            <a href="?controller=producto&action=filtroCatPo&value=flanes">
                                <div class="filtroVista">
                                    <input type="checkbox" id="checkCategoriaPizzas" <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'flanes') ? 'checked' : '' ?>>
                                    <p class="p4 <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'flanes') ? 'bold' : '' ?>">Flanes</p>
                                </div>    
                            </a>
                            <a href="?controller=producto&action=filtroCatPo&value=otros">
                                <div class="filtroVista">
                                    <input type="checkbox" id="checkCategoriaPizzas" <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'otros') ? 'checked' : '' ?>>
                                    <p class="p4 <?= (isset($_SESSION['filtroCat']) && $_SESSION['filtroCat'] == 'otros') ? 'bold' : '' ?>">Otros</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="contenedorEliminarFiltros <?php echo isset($_SESSION['filtroCat']) ? 'mostrarContenedorEliminarFiltros' : ''; ?>">
                        <a href="?controller=producto&action=eliminarFiltrosPo"><p class="p4 bold">Eliminar filtros   X</p></a>
                    </div>
                </div>
                

            </div>
            <div class="contenedorContenido col-sm-12 col-md-12 col-lg-12 col-xl-10 container">

                <div class="tituloContenedor">
                    <h2>
                        <?php
                            if(isset($_SESSION['filtroCat'])){
                                echo ucfirst($_SESSION['filtroCat']);
                            }else{
                                echo "Postres";
                            }
                        ?>
                    </h2>
                </div>
                
                <div class="contenedorProductos container-fluid">
                    <div class="contenidoProductos row">
                        <?php

                        foreach($productos as $producto){

                            ?>
                            
                            <div class="contenedorProducto col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="separadorImagen">
                                    <img src="<?= $producto->getImagen()?>" width="100%"> <!-- Imagen Pizza -->
                                </div>
                                <div class="separadorContenido">

                                    <div class="lineaDivisoraContenido">
                                        <hr>
                                    </div>
                                    <div class="tituloContenido">
                                        <h7 class="naranja"><?= ucfirst($producto->getNombre())?></h7>
                                    </div>
                                    <div class="textoContenido">
                                        <p class="p5 bold"><?= ucfirst($producto->getDescripcion())?></p>
                                    </div>
                                    <div class="precioContenido">
                                        <p class="p2 bold"><?= $producto->getPrecio()?> €</p>
                                    </div>

                                    <a href="?controller=producto&action=producto&value=<?= $producto->getId()?>">
                                        <div class="botonPedirAhoraPrimario">
                                            <p class="p4 bold">Pedir ahora</p>
                                            <!-- Logo flecha derecha -->
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="13px" height="13px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#FFFFFF" stroke="none">
                                                    <path d="M2909 4677 c-64 -24 -102 -53 -211 -165 -126 -127 -151 -172 -151 -272 0 -124 -14 -106 601 -722 l557 -558 -1737 0 c-1722 0 -1738 0 -1792 -20 -74 -28 -139 -98 -161 -174 -13 -45 -16 -91 -13 -224 3 -145 6 -173 25 -213 25 -56 84 -118 138 -144 39 -20 75 -20 1793 -25 l1752 -5 -560 -560 c-617 -617 -604 -601 -603 -722 1 -96 31 -148 165 -279 140 -138 176 -159 278 -159 62 1 84 5 125 27 67 36 1953 1923 1981 1983 28 60 26 176 -5 236 -32 64 -1928 1958 -1985 1984 -52 23 -151 29 -197 12z"/>
                                                </g>
                                            </svg>
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
    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>