<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        #seccionSuperior #contenedorDivisor hr {
            margin-top: 20px !important;
            background-color: #FF4713 !important;
            border: none !important;
            opacity: 1 !important;
            height: 2px !important;
        }

        #seccionSuperior, #seccionPrincipal {
            background-color: #F9F5EF;
        }

        #contenedorRegister {
            background-color: white;
            margin-top: 50px;
            margin-bottom: 50px;
            padding-top: 100px;
            padding-left: 100px;
            padding-right: 100px;
            padding-bottom: 50px;
        }

        /* -- Contenedor Usuario / Contraseña -- */
        #contenedorUsuario, #contenedorCorreo, #contenedorContraseña, #contenedorRepetirContraseña, #contenedorDireccion, #contenedorTarjeta, #contenedorTarjeta, #contenedorCaducidad, #contenedorCVV, #contenedorChecks {
            margin-top: 30px;
        }

        #usuario, #correo, #contraseña, #repetirContraseña, #direccion, #numeroTarjeta, #fechaCaducidad, #cvv {
            background-color: #D9D9D9;
            width: 500px;
            border: 0px;
            height: 40px;
            padding-left: 20px;
            padding-right: 20px;
        }

        #contenedorChecks a {
            color: #FF4713;
        }

        /* -- BOTONES -- */
        #botonSubmitDatosPersonales {
            background-color: #FF4713;
            padding-top: 7px;
            padding-left: 120px;
            padding-right: 120px;
            display: inline-flex;
            height: 40px;
            color: white !important;
            transition: background-color 0.5s ease;
            border: 0px;
            margin-top: 40px;
        }

        #botonSubmitDatosPersonales:hover {
            background-color: #000000;
            padding-top: 7px;
            padding-left: 120px;
            padding-right: 120px;
            display: inline-flex;
            height: 40px;
            color: white !important;
        }

        /* Estilos base para los contenedores */
        #datosPersonales, #datosBancarios {
            top: 0;
            left: 0;
            width: 100%;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
            opacity: 1;
        }

        /* Animación para ocultar hacia la izquierda */
        #datosPersonales.hidden {
            transform: translateX(-100%);
            opacity: 0;
        }

        /* Animación para mostrar desde la izquierda */
        #datosBancarios {
            transform: translateX(100%);
            opacity: 0;
        }

        #datosBancarios.visible {
            transform: translateX(0);
            opacity: 1;
        }

        /* Contenedor de transición fluida */
        #contenedorRegister {
            position: relative;
            overflow: hidden;
            height: auto;
        }

    </style>

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
            <div id="contenedorRegister" class="col-5 mx-auto">

                <div id="informacionSuperior">
                    <h4>Crear cuenta</h4>
                    <p class="p5">¿Aún no tienes una cuenta?</p>
                    <p class="p5">No esperes más, crea una ahora!</p>
                </div>

                <!-- Slide datos personales -->
                <div id="datosPersonales">
                    <h7>Información personal</h7>
                    <form id="formularioDatosPersonales" action="?controller=usuario&action=holdPersonalData" method="POST">
                        <div id="contenedorUsuario">
                            <label for="usuario"><p class="p4 bold">Nombre de usuario:</p></label>
                            <input id="usuario" name="usuario" type="text" placeholder="Nombre de usuario" minlength="5" required>
                        </div>
                        <div id="contenedorCorreo">
                            <label for="correo"><p class="p4 bold">Correo electrónico:</p></label>
                            <input id="correo" name="correo" type="text" placeholder="Correo electrónico" required>
                        </div>
                        <div id="contenedorContraseña">
                            <label for="contraseña"><p class="p4 bold">Contraseña:</p></label>
                            <input id="contraseña" name="contraseña" type="password" placeholder="Introduce tu contraseña" minlength="9" required>
                        </div>
                        <div id="contenedorRepetirContraseña">
                            <label for="repetiContraseña"><p class="p4 bold">Repetir contraseña:</p></label>
                            <input id="repetirContraseña" name="repetirContraseña" type="password" placeholder="Repite tu contraseña" minlength="9" required>
                        </div>
                        <div id="contenedorDireccion">
                            <label for="direccion"><p class="p4 bold">Dirección:</p></label>
                            <input id="direccion" name="direccion" type="text" placeholder="EJ: Calle Barcelona 23 1a" required>
                        </div>
                        <button id="botonSubmitDatosPersonales" class="mx-auto" type="submit">Siguiente paso</button>
                    </form>
                </div>

                <!-- Slide datos bancarios -->
                <div id="datosBancarios">
                    <h7>Datos bancarios</h7>
                    <form id="formularioDatosBancarios" action="?controller=usuario&action=tryRegister" method="POST">
                        <label for="numeroTarjeta"><p class="p4 bold">Número de tarjeta:</p></label>
                        <input id="numeroTarjeta" name="numeroTarjeta" type="number" placeholder="Número de tarjeta" minlength="16" maxlength="16" required>
                        <label for="fechaCaducidad"><p class="p4 bold">Fecha de vencimiento:</p></label>
                        <input id="fechaCaducidad" name="fechaCaducidad" type="date" required>
                        <label for="cvv"><p class="p4 bold">Código de seguridad:</p></label>
                        <input id="cvv" name="cvv" type="number" placeholder="cvv" minlength="3" maxlength="3" required>
                        <div id="contenedorChecks">
                            <input id="checkBoxTerminos" type="checkbox" name="checkBoxTerminos" value="terminos"> Acepto los <a href="?controller=general&action=terminos">términos y condiciones de uso</a>.
                            <input id="checkBoxPrivacidad" type="checkbox" name="checkBoxPrivacidad" value="privacidad"> Acepto la <a href="?controller=general&action=privacyPolicy">Política de privacidad</a>.
                        </div>
                        <button id="botonSubmitDatosPersonales" class="mx-auto" type="submit">Crear cuenta</button>
                    </form>
                </div>

                <div id="usuarioRepetido">
                    <p>El usuario se ha encontrado en la base de datos. Utilice otro correo electrónido o nombre de usuario.</p>
                </div>
                <div id="usuarioCreado">
                    <p>El usuario se ha creado correctamente! Ya puede empezar a comprar.</p>
                </div>

                <div>
                    <p>¿Ya tienes una cuenta? Haz clic aquí para <a href="?controller=usuario&action=login">iniciar sesión</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include_once "views/others/footer.php"; ?>

    <a href="?controller=general&action=admin">ADMIN</a>

    <script>
        document.getElementById('botonSubmitDatosPersonales').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('datosPersonales').classList.add('hidden');
            document.getElementById('datosBancarios').classList.add('visible');
        });
    </script>

</body>
</html>
