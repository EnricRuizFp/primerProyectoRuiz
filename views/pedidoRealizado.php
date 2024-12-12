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
    <?php include_once "views/others/navbar.php"; ?>

    <!-- CONTENIDO -->
    <div id="contenidoPagina">

        <?php

        if($validacion){

            echo "TODO HA IDO BIEN";

        }else{

            echo "ERROR";

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