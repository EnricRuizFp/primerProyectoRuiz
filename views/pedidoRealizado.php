<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/pedidoRealizado.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>

    <!-- NavBar -->
    <div class="barraNavegacion">
        <?php include_once "views/others/navbar.php"; ?>
    </div>

    <!-- CONTENIDO -->
    <div id="contenidoPagina" class="container-fluid">

        <?php

        if($validacion){

            ?>

            <div class="contenedorGeneral row container-fluid">
                <div class="contenidoGeneral col-6 mx-auto row">
                    <div class="contenidoInformacion col-8 mx-auto">
                        <h5>Gracias por tu compra!</h5>
                        <p>Tus productos se enviarán tan pronto como nos sea posible.</p>
                        <p>Puedes acceder a tus pedidos des de tu cuenta.</p>

                        <a href="?controller=producto">
                            <div class="botonPedirAhoraPrimario">
                                <p class="p4 bold">Seguir comprando</p>
                            </div>
                        </a>

                        <a href="?controller=usuario">
                            <div class="botonPedirAhoraPrimario">
                                <p class="p4 bold">Ver mis pedidos</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <?php
            
        }else{

            ?>

            <div class="contenedorGeneral">
                <div class="contenidoGeneral">
                    <div class="contenidoInformacion">
                        <h5>El pedido no se ha podido completar.</h5>
                        <p>Por favor, vuelve a realizar el proceso de compra.</p>
                        <p>Si sigue sin poder comprar, pongase en contacto con nosotros mediante el teléfono de contacto o haciendo <a href="?controller=general&action=contacto">clic aquí</a>.</p>

                        <a href="?controller=carrito">
                            <div class="botonPedirAhoraPrimario">
                                <p class="p4 bold">Reintentar compra</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <?php

        }

        ?>

    </div>

    <!-- FOOTER -->
    <?php include_once "views/others/footer.php"; ?>

    <a href="?controller=general&action=admin">ADMIN</a>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>