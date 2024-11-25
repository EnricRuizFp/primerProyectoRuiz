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

    <br><br><br><br><br><br><br>
    <?php

        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {

            echo "PRODUCTO: ".$_SESSION['carrito'][$i]['producto']." CANTIDAD: ".$_SESSION['carrito'][$i]['cantidad']."<br>";
        }

    ?>

    <?php include_once "views/others/footer.php"; ?>

</body>
</html>