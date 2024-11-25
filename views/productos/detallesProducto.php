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

                        <div id="contenedorIngredientesComplementarios">
                            <button class="botonModificarIngredientesPrimario">
                                <p class="p4 bold">Modificar ingredientes</p>
                            </button>

                            <div id="contenedorModificarIngredientes">
                                <p class="p2 bold">Ingredientes actuales</p>

                                <div id="contenedorIngredientes">

                                    <?php
                                        foreach($ingredientes as $ingrediente){
                                            ?>
                                            <div class="contenedorIngrediente">
                                                <?= $ingrediente->getNombre(); ?>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div id="contenedorInferior">

                            <p class="p2 bold">Finalizar</p>

                            <a href="?controller=carrito&action=añadir&value=<?= $producto->getId(); ?>">
                                <div class="botonAñadirAlCarrito">
                                    <p class="p4 bold">Añadir al carrito</p>
                                </div>
                            </a>

                            <a href="?controller=carrito&action=destroy">
                                <div id="botonHacerMenu">
                                    <p class="p4 bold">Hacer menú</p>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Script visibilidad Ingredientes -->
    <script>
        // Selecciona los elementos
        const ingredientesDefault = document.getElementById('ingredientesDefault');
        const contenedorModificarIngredientes = document.getElementById('contenedorModificarIngredientes');
        const botonModificar = document.querySelector('.botonModificarIngredientesPrimario');

        // Variable para rastrear el estado (true = mostrando inferior, false = mostrando superior)
        let mostrandoInferior = false;

        // Añade el evento al botón
        botonModificar.addEventListener('click', () => {
            if (mostrandoInferior) {
                // Volver a mostrar el contenedor superior
                contenedorModificarIngredientes.style.height = `${contenedorModificarIngredientes.scrollHeight}px`; // Fija altura actual
                requestAnimationFrame(() => {
                    contenedorModificarIngredientes.style.transition = 'height 0.9s ease-in-out';
                    contenedorModificarIngredientes.style.height = '0';
                });
                contenedorModificarIngredientes.addEventListener('transitionend', () => {
                    contenedorModificarIngredientes.style.display = 'none'; // Oculta completamente
                }, { once: true });

                ingredientesDefault.style.display = 'block'; // Asegura visibilidad inicial
                ingredientesDefault.style.height = '0'; // Inicializa colapsado
                requestAnimationFrame(() => {
                    ingredientesDefault.style.transition = 'height 0.5s ease-in-out';
                    ingredientesDefault.style.height = `${ingredientesDefault.scrollHeight}px`;
                });

                // Cambia el texto del botón cuando vuelve a mostrar el div de ingredientesDefault
                botonModificar.querySelector('p').textContent = 'Modificar ingredientes';

                mostrandoInferior = false; // Actualiza el estado
            } else {
                // Ocultar el contenedor superior y mostrar el inferior
                ingredientesDefault.style.height = `${ingredientesDefault.scrollHeight}px`; // Fija altura inicial
                requestAnimationFrame(() => {
                    ingredientesDefault.style.transition = 'height 0.5s ease-in-out';
                    ingredientesDefault.style.height = '0';
                });
                ingredientesDefault.addEventListener('transitionend', () => {
                    ingredientesDefault.style.display = 'none'; // Oculta completamente
                }, { once: true });

                contenedorModificarIngredientes.style.display = 'block'; // Asegura visibilidad inicial
                contenedorModificarIngredientes.style.height = '0'; // Inicializa colapsado
                requestAnimationFrame(() => {
                    contenedorModificarIngredientes.style.transition = 'height 0.5s ease-in-out';
                    contenedorModificarIngredientes.style.height = `${contenedorModificarIngredientes.scrollHeight}px`;
                });

                // Cambia el texto del botón cuando se oculta el div de ingredientesDefault
                botonModificar.querySelector('p').textContent = 'Volver a por defecto';

                mostrandoInferior = true; // Actualiza el estado
            }
        });
    </script>

    


</body>
</html>