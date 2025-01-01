<?php
session_start();

?>

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
                    <img src="media/images/logos/Logo_LA_BUENIZZIMA-1_SF.webp" width="200px" alt="Imagen del logo de la empresa La Buenizzima.">
                </a>
            </div>
            <hr>
        </div>
    </div>

    <div id="seccionPrincipal" class="container-fluid">
        <div class="row">
            <div id="contenedorLogin" class="col-10 col-sm-10 col-md-10 col-lg-8 col-xl-6 mx-auto">

                <div id="contenedorTitulo">
                    <h4>Iniciar sesión</h4>
                    <p class="p5">¿Ya tienes una cuenta?</p>
                    <p class="p5">Inicia sesión para empezar a comprar.</p>
                </div>

                <!-- Contenedores de información -->
                <div id="sesionIniciada">
                    <h7>Has iniciado sesión!</h7>
                    <p class="p4">Ya puedes empezar a comprar!</p>

                    <div id="contenedorBotones">
                        <a class="botones" href="?controller=general&action=productos">
                            <div class="botonPedirAhoraPrimario">
                                <p class="p4 bold">Empezar a pedir</p>
                            </div>
                        </a>
                        <a class="botones" href="?controller=usuario">
                            <div class="botonPedirAhoraPrimario">
                                <p class="p4 bold">Mi cuenta</p>
                            </div>
                        </a>
                    </div>
                    
                </div>

                <div id="contraseñaIncorrecta">
                    <p class="p4 bold red">La contraseña proporcionada no coincide con el usuario.</p>
                </div>

                <div id="usuarioInexistente">
                    <p class="p4 bold red">El usuario no existe!</p>
                </div>

                <!-- Contenedor Formulario de Inicio de Sesión -->
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
                        <p>¿No tienes cuenta? Haz clic aquí para <a href="?controller=usuario&action=register" class="bold">crear una cuenta ahora</a></p>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT para visibilidad de contenedores -->
    <script>

        // Obtener los valores de PHP y convertirlos a JavaScript
        const sesionActual = <?= json_encode(isset($_SESSION['usuarioActual']) ? $_SESSION['usuarioActual'] : null); ?>;
        const resultadoLogin = <?= json_encode(isset($_SESSION['resultadoLogin']) ? $_SESSION['resultadoLogin'] : null); ?>;

        // Función que alterna la visibilidad de los contenedores
        function toggleVisibility(elements, visibility) {
            elements.forEach(element => {
                document.getElementById(element).style.display = visibility;
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            const contenedorTitulo = 'contenedorTitulo';
            const contenedorIniciarSesion = 'formularioLogin';
            const contenedorSesionIniciada = 'sesionIniciada';
            const contenedorContraseñaIncorrecta = 'contraseñaIncorrecta';
            const contenedorUsuarioInexistente = 'usuarioInexistente';

            // Si la sesión está activa, mostrar el contenido adecuado
            if (sesionActual != null) {
                toggleVisibility([contenedorTitulo, contenedorIniciarSesion], 'none');
                toggleVisibility([contenedorSesionIniciada], 'block');
                toggleVisibility([contenedorContraseñaIncorrecta, contenedorUsuarioInexistente], 'none');
            } else {

                // Si la sesión no está activa, gestionar los casos según el resultado del login
                switch (resultadoLogin) {
                    case "userCorrect":
                        toggleVisibility([contenedorTitulo, contenedorIniciarSesion], 'none');
                        toggleVisibility([contenedorSesionIniciada], 'block');
                        toggleVisibility([contenedorContraseñaIncorrecta, contenedorUsuarioInexistente], 'none');
                        break;

                    case "wrongPassword":
                        toggleVisibility([contenedorIniciarSesion], 'block');
                        toggleVisibility([contenedorSesionIniciada], 'none');
                        toggleVisibility([contenedorContraseñaIncorrecta], 'block');
                        toggleVisibility([contenedorUsuarioInexistente], 'none');
                        break;

                    case "wrongUser":
                        toggleVisibility([contenedorIniciarSesion], 'block');
                        toggleVisibility([contenedorSesionIniciada], 'none');
                        toggleVisibility([contenedorContraseñaIncorrecta], 'none');
                        toggleVisibility([contenedorUsuarioInexistente], 'block');
                        break;

                    default:
                        toggleVisibility([contenedorIniciarSesion], 'block');
                        toggleVisibility([contenedorSesionIniciada], 'none');
                        toggleVisibility([contenedorContraseñaIncorrecta, contenedorUsuarioInexistente], 'none');
                        break;
                }
            }
        });
    </script>

</body>
</html>
