<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/login.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>

    <div id="seccionSuperior" class="container-fluid d-flex align-items-center justify-content-center">
        <div id="contenedorDivisor" class="row">
            <div id="logoSuperior" class="col-12 mx-auto">
                <a href="?controller=general">
                    <img src="media/images/logos/Logo_LA_BUENIZZIMA-1_SF.webp" width="200px">
                </a>
            </div>
            <hr>
        </div>
    </div>

    <div id="seccionPrincipal" class="container-fluid">
        <div class="row">
            <div id="contenedorLogin" class="col-5 mx-auto">

                <h4>Iniciar sesión</h4>
                <p class="p5">¿Ya tienes una cuenta?</p>
                <p class="p5">Inicia sesión para empezar a comprar.</p>

                <div id="usuarioNoEncontrado">
                    <p>El usuario no se ha encontrado en la base de datos. Por favor, pruebe de nuevo con otro usuario.</p>
                </div>

                <form id="formularioLogin" action="?controller=usuario&action=tryLogin" method="POST">

                    <div id="contenedorUsuario">
                        <div id="contenedorLabelUsuario">
                            <label for="usuario"><p class="p4 bold">Usuario:</p></label>
                        </div>
                        <div id="contenedorInputUsuario">
                            <input id="usuario" name="usuario" type="text" placeholder="Nombre de usuario o correo" required>
                        </div>
                    </div>

                    <div id="contenedorContraseña">
                        <div id="contenedorLabelContraseña">
                            <label for="contraseña"><p class="p4 bold">Contraseña:</p></label>
                        </div>
                        <div id="contenedorInputContraseña">
                            <input id="contraseña" name="contraseña" type="password" placeholder="Contraseña" required>
                        </div>
                    </div>

                    <button id="botonIniciarSesion" class="mx-auto" type="submit">Iniciar sesión</button>

                    <div id="crearCuenta">
                        <p>¿No tienes cuenta? Haz clic aquí para <a href="?controller=usuario&action=register">crear una cuenta ahora</a></p>
                    </div>

                </form>
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