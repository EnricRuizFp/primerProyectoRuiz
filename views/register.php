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
    <link rel="stylesheet" href="css/register.css">

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
            <div id="contenedorRegister" class="col-9 mx-auto">

                <div id="informacionSuperior">
                    <h4>Crear cuenta</h4>
                    <p class="p5">¿Aún no tienes una cuenta?  No esperes más, crea una ahora!</p>
                </div>

                <div id="datosUsuario" class="container-fluid">

                    <form id="formularioDatosBancarios" class="row" action="?controller=usuario&action=tryRegister" method="POST">

                        <!-- tab datos personales -->
                        <div id="datosPersonales" class="col-6">
                            <h7>Información personal</h7>

                            <div id="contenedorUsuario">
                                <label for="usuario" class="p4 bold">Usuario:</label>
                                <input id="usuario" name="usuario" type="text" placeholder="Nombre de usuario" minlength="5" required>
                            </div>

                            <div id="contenedorNombreCompleto">
                                <label for="nombreCompleto" class="p4 bold">Nombre completo:</label>
                                <input id="nombreCompleto" name="nombreCompleto" type="text" placeholder="Nombre completo" minlength="5" required>
                            </div>

                            <div id="contenedorCorreo">
                                <label for="correo" class="p4 bold">Correo electrónico:</label>
                                <input id="correo" name="correo" type="text" placeholder="Correo electrónico" required>
                            </div>

                            <div id="contenedorContraseña">
                                <label for="contraseña" class="p4 bold">Contraseña:</label>
                                <input id="contraseña" name="contraseña" type="password" placeholder="Introduce tu contraseña" minlength="9" required>
                            </div>

                            <div id="contenedorRepetirContraseña">
                                <label for="repetiContraseña" class="p4 bold">Repetir contraseña:</label>
                                <input id="repetirContraseña" name="repetirContraseña" type="password" placeholder="Repite tu contraseña" minlength="9" required>
                            </div>

                            <div id="contenedorTelefono">
                                <label for="telefono" class="p4 bold">Teléfono:</label>
                                <input id="telefono" name="telefono" type="number" placeholder="Número de teléfono" minlength="9" required>
                            </div>
                        </div>

                        <!-- tab datos bancarios -->
                        <div id="datosBancarios" class="col-6">
                            <h7 id="tituloDatosBancarios">Datos bancarios</h7>

                            <div id="contenedorChecks">
                                <div id="contenedorCheckTerminos">
                                    <input id="checkBoxTerminos" type="checkbox" name="checkBoxTerminos" value="terminos" required oninvalid="this.setCustomValidity('Debe aceptar los términos y condiciones para crear una cuenta.')" oninput="this.setCustomValidity('')"> Acepto los <a href="?controller=general&action=terminos">términos y condiciones de uso</a>.
                                </div>
                                <div id="contenedorCheckPrivacidad">
                                    <input id="checkBoxPrivacidad" type="checkbox" name="checkBoxPrivacidad" value="privacidad" required oninvalid="this.setCustomValidity('Debe aceptar la política de privacidad para crear una cuenta.')" oninput="this.setCustomValidity('')"> Acepto la <a href="?controller=general&action=privacyPolicy">Política de privacidad</a>.
                                </div>
                            </div>

                            <button id="botonSubmitForm" class="mx-auto" type="submit">Crear cuenta</button>

                            <div id="contenedorInicioSesion">
                                <p>¿Ya tienes una cuenta? Haz clic aquí para <a href="?controller=usuario&action=login">iniciar sesión</a>.</p>
                            </div>


                            <!-- Contenedores de información -->
                            <div id="contraseñaInvalida">
                                <p class="bold red">Las contraseñas introducidas no coinciden.</p>
                            </div>

                            <div id="usuarioRepetido">
                                <p class="bold red">El usuario se ha encontrado en la base de datos. Utilice otro correo electrónico o nombre de usuario.</p>
                            </div>

                        </div>

                    </form>
                </div>

                <div id="usuarioCreado">
                    <p class="bold">El usuario se ha creado correctamente! Ya puede empezar a comprar.</p>

                    <a href="?controller=general&action=productos">
                        <div class="botonPedirAhoraPrimario">
                            <p class="p4 bold">Empezar a pedir</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    

    <!-- FOOTER -->
    <?php include_once "views/others/footer.php"; ?>

    <a href="?controller=general&action=admin">ADMIN</a>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript visibilidad resultado del registro -->
    <script>
        
        // Obtener el dato de sesión
        const resultadoRegister = <?php echo isset($_SESSION['resultadoRegister']) ? "'".$_SESSION['resultadoRegister']."'" : "''"; ?>;

        console.log('Resultado del registro:', resultadoRegister);

        document.addEventListener("DOMContentLoaded", () => {

            const contenedorInformacionSuperior = document.getElementById('informacionSuperior');
            const contenedorRegistro = document.getElementById('datosUsuario');

            const contenedorContraseñaInvalida = document.getElementById('contraseñaInvalida');
            const contenedorUsuarioRepetido = document.getElementById('usuarioRepetido');
            const contenedorUsuarioCreado = document.getElementById('usuarioCreado');

            // Mostrar / ocultar el DIV
            switch(resultadoRegister){

                case "invalidPasswords":
                    contenedorContraseñaInvalida.style.display = 'block';
                    contenedorUsuarioRepetido.style.display = 'none';
                    contenedorUsuarioCreado.style.display = 'none';
                    break;
                
                case "invalidCardDate":
                    contenedorContraseñaInvalida.style.display = 'none';
                    contenedorUsuarioRepetido.style.display = 'none';
                    contenedorUsuarioCreado.style.display = 'none';
                    break;
                
                case "userExists":
                    contenedorContraseñaInvalida.style.display = 'none';
                    contenedorUsuarioRepetido.style.display = 'block';
                    contenedorUsuarioCreado.style.display = 'none';
                    break;

                case "userCreated":
                    contenedorContraseñaInvalida.style.display = 'none';
                    contenedorUsuarioRepetido.style.display = 'none';
                    contenedorUsuarioCreado.style.display = 'block';

                    contenedorInformacionSuperior.style.display = 'none';
                    contenedorRegistro.style.display = 'none';
                    break;
                
                default:
                    contenedorContraseñaInvalida.style.display = 'none';
                    contenedorUsuarioRepetido.style.display = 'none';
                    contenedorUsuarioCreado.style.display = 'none';
                    break;

            }


        })

    </script>

</body>
</html>