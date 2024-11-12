<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA PRINCIPAL</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/paginaPrincipal.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container position-relative">
            <!-- Botón de menú para pantallas pequeñas, alineado a la izquierda -->
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo de la marca, centrado en pantallas pequeñas -->
            <a class="navbar-brand mx-auto" href="#">LA BUENIZZIMA</a>

            <!-- Enlaces de navegación principales -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menús</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Carta</a>
                    </li>
                </ul>
            </div>

            <!-- Iconos a la derecha, sin colapsar -->
            <div class="navbar-icons">
                <a class="nav-link" href="#">S</i></a>
                <a class="nav-link" href="#">U</i></a>
                <a class="nav-link" href="#">F</i></a>
                <a class="nav-link" href="#">C</i></a>
            </div>
        </div>
    </nav>

    <!-- HEADER -->
    <div id="header">
        <img> <!-- Imagen de fondo -->
        <div id="contenidoHeader">
            <div class="tituloHeader">
                <h1>PIDE AHORA TU PIZZA</h1>
            </div>
            <div class="subtituloHeader">
                <h6>Disfruta de la mejor calidad en La Buenizzima</h6>
            </div>
            <a href="?controller=general&action=productos">
                <div class="botonPedirAhoraPrimario">
                    <p>Pedir ahora</p>
                </div>
            </a>
            
        </div>
    </div>

    <!-- SECCION 1 -->
    <div class="seccion1">

        <!-- Contenedor de la sección -->
        <div class="contenedorGeneralSeccion1">

            <div class="contenedorSeccion1">

                <div class="separadorImagenContenedorSeccion1">
                    <img> <!-- Imagen camion repartidor -->
                </div>

                <div class="separadorContenidoContenedorSeccion1">

                    <div class="tituloContenidoContenedorSeccion1">
                        <p>Repartidores comprometidos con su trabajo</p>
                    </div>
                    <div class="textoContenidoContenedorSeccion1">
                        <p>Recibe tu pedido en menos de 1h, sino, te lo regalamos.</p>
                    </div>

                    <a href="?controller=general&action=saberMas">
                        <div class="botonSaberMasPrimario">
                            <p>SABER MÁS</p>
                            <img> <!-- Logo flecha derecha -->
                        </div>
                    </a>
                    
                </div>
            </div>

            <div class="contenedorSeccion1">

                <div class="separadorImagenContenedorSeccion1">
                    <img> <!-- Imagen Garantía -->
                </div>

                <div class="separadorContenidoContenedorSeccion1">

                    <div class="tituloContenidoContenedorSeccion1">
                        <p>Calidad en todos nuestros productos</p>
                    </div>
                    <div class="textoContenidoContenedorSeccion1">
                        <p>Todos nuestros productos están elaborador a mano por expertos en el ámbito de la hosteñería el mismo día.</p>
                    </div>

                    <a href="?controller=general&action=productos">
                        <div class="botonProductosPrimario">
                            <p>PRODUCTOS</p>
                            <img> <!-- Logo flecha derecha -->
                        </div>
                    </a>
                </div>
            </div>

            <div class="contenedorSeccion1">

                <div class="separadorImagenContenedorSeccion1">
                    <img> <!-- Imagen Ayuda -->
                </div>

                <div class="separadorContenidoContenedorSeccion1">

                    <div class="tituloContenidoContenedorSeccion1">
                        <p>¿Necesitas ayuda? Contáctanos</p>
                    </div>
                    <div class="textoContenidoContenedorSeccion1">
                        <p>Tenemos diferentes vías de contacto y un operador estará dispuesto a ayudarte con cualquier duda.</p>
                    </div>

                    <a href="?controller=general&action=ayuda">
                        <div class="botonPedirAyudaPrimario">
                            <p>PEDIR AYUDA</p>
                            <img> <!-- Logo flecha derecha -->
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCION 2 -->
    <div id="seccion2">

        <div id="contenedorIzquierdaSeccion2">

            <div id="contenidoSeccion2">
                <div class="tituloContenidoSeccion2">
                    <h4>TU PIZZA AL GUSTO</h4>
                </div>
                <div class="textoContenidoSeccion2">
                    <p>Escoge las masas: FIna, normal o gruesa.</p>
                    <p>Escoge los ingredientes: todos los que puedas imaginar.</p>

                    <div class="subtextoContenidoSeccion2">
                        <p>¿Cómo te gusta? ¿Bien hecha? ¡Marchando!</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="contenedorDerechaSeccion2">
            <img> <!-- Imagen Pizza -->
        </div>
    </div>

    <!-- SECCION 3 -->
    <div id="seccion3">

        <div id="contenedorSeccion3">

            <div id="tituloSeccion3">
                <h4>NUESTRAS ESPECIALIDADES</h4>
            </div>

            <div id="contenidoSeccion3">

                <!-- Contenedor 1 -->
                <div class="contenedorPizzasSeccion3">

                    <div class="separadorImagenSeccion3">
                        <img> <!-- Imagen Pizza Barbacoa -->
                    </div>

                    <div class="separadorContenidoSeccion3">

                        <div class="lineaDivisoraContenidoSeccion3">
                            <hr>
                        </div>
                        <div class="tituloContenidoSeccion3">
                            <h7>Barbacoa Cremosa</h7>
                        </div>
                        <div class="textoContenidoSeccion3">
                            <p>Nunca has probado una pizza Barbacoa tan cremosa. Su salsa especial La Buenizzima* reavivará tus sentidos.</p>
                        </div>
                        <div class="precioContenidoSeccion3">
                            <p>15,99 €</p>
                        </div>

                        <a href="?controller=general&action=productos&producto=barbacoa">
                            <div class="botonPedirAhoraPrimario">
                                <p>Pedir ahora</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Contenedor 2 -->
                <div class="contenedorPizzasSeccion3">

                    <div class="separadorImagenSeccion3">
                        <img> <!-- Imagen Pizza Cuatro Quesos -->
                    </div>

                    <div class="separadorContenidoSeccion3">

                        <div class="lineaDivisoraContenidoSeccion3">
                            <hr>
                        </div>
                        <div class="tituloContenidoSeccion3">
                            <h7>Cuatro Quesos</h7>
                        </div>
                        <div class="textoContenidoSeccion3">
                            <p>Deliciosa mozzarella de primera, junto con Roquefort, parmesano y Fontina, hace una explosión de sabor en tu boca.</p>
                        </div>
                        <div class="precioContenidoSeccion3">
                            <p>14,99 €</p>
                        </div>

                        <a href="?controller=general&action=productos&producto=cuatroQuesos">
                            <div class="botonPedirAhoraPrimario">
                                <p>Pedir ahora</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Contenedor 3 -->
                <div class="contenedorPizzasSeccion3">

                    <div class="separadorImagenSeccion3">
                        <img> <!-- Imagen Pizza La Buenizzima -->
                    </div>

                    <div class="separadorContenidoSeccion3">

                        <div class="lineaDivisoraContenidoSeccion3">
                            <hr>
                        </div>
                        <div class="tituloContenidoSeccion3">
                            <h7>La Buenizzima</h7>
                        </div>
                        <div class="textoContenidoSeccion3">
                            <p>Déjate aconsejar por nuestros expertos. Una combinación perfecta que vas a querer repetir.</p>
                        </div>
                        <div class="precioContenidoSeccion3">
                            <p>17,99 €</p>
                        </div>

                        <a href="?controller=general&action=productos&producto=LaBuenizzma">
                            <div class="botonPedirAhoraPrimario">
                                <p>Pedir ahora</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Contenedor 4 -->
                <div class="contenedorPizzasSeccion3">

                    <div class="separadorImagenSeccion3">
                        <img> <!-- Imagen Pizza Margarita -->
                    </div>

                    <div class="separadorContenidoSeccion3">

                        <div class="lineaDivisoraContenidoSeccion3">
                            <hr>
                        </div>
                        <div class="tituloContenidoSeccion3">
                            <h7>Margarita</h7>
                        </div>
                        <div class="textoContenidoSeccion3">
                            <p>Clásica italiana con un toque de la casa. Siente su cultura en tu paladar.</p>
                        </div>
                        <div class="precioContenidoSeccion3">
                            <p>14,99 €</p>
                        </div>

                        <a href="?controller=general&action=productos&producto=margarita">
                            <div class="botonPedirAhoraPrimario">
                                <p>Pedir ahora</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Contenedor 5 -->
                <div class="contenedorPizzasSeccion3">

                    <div class="separadorImagenSeccion3">
                        <img> <!-- Imagen Pizza La Buenizzima -->
                    </div>

                    <div class="separadorContenidoSeccion3">

                        <div class="lineaDivisoraContenidoSeccion3">
                            <hr>
                        </div>
                        <div class="tituloContenidoSeccion3">
                            <h7>Peperoni</h7>
                        </div>
                        <div class="textoContenidoSeccion3">
                            <p>Descubre el equilibrio de sabores picantes con sabores salados y especiados.</p>
                        </div>
                        <div class="precioContenidoSeccion3">
                            <p>13,99 €</p>
                        </div>

                        <a href="?controller=general&action=productos&producto=peperoni">
                            <div class="botonPedirAhoraPrimario">
                                <p>Pedir ahora</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SECCION 4 -->
    <div id="seccion4">

        <div id="contenedorSeccion4">

            <div id="contenedorIzquierdaSeccion4">
                <div id="tituloSeccion4">
                    <h6>REGÍSTRATE PARA VER LAS ÚLTIMAS OFERTAS Y PROMOCIONES</h6>
                </div>
                <div id="textoSeccion4">
                    <p>Ver <a href="?controller=general&action=privacidad">Política de privacidad</a></p>
                </div>
            </div>

            <div id="seccionDerechaSeccion4">
                <a href="?controller=general&action=usuario">
                    <div class="botonRegistrarseAhoraPrimario2">
                        <p>REGISTRARSE AHORA</p>
                    </div>
                </a>                
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">

        <div class="seccionIzquierdaFooter">
            <div class="superiorSeccionIzquierdaFooter">
                <div class="columnaSuperiorSeccionIzquierdaFooter">
                    <div class="tituloColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=productos"><h7>PRODUCTOS</h7></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=ofertas"><p>Ofertas</p></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=menus"><p>Menús</p></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=pizzas"><p>Pizzas</p></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=bebidas"><p>Bebidas</p></a>
                    </div>
                </div>

                <div class="columnaSuperiorSeccionIzquierdaFooter">
                    <div class="tituloColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=nutricion"><h7>NUTRICIÓN Y CALIDAD</h7></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=calidad"><p>Calidad y alimentación</p></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=masas"><p>Nuestras masas y alimentos</p></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=sinGluten"><p>Pizzas sin gluten</p></a>
                    </div>
                </div>

                <div class="columnaSuperiorSeccionIzquierdaFooter">
                    <div class="tituloColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=corporativo"><h7>CORPORATIVO</h7></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=aboutUs"><p>Acerca de La Buenizzima</p></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=workWithUs"><p>Trabaja con nosotros</p></a>
                    </div>
                </div>

                <div class="columnaSuperiorSeccionIzquierdaFooter">
                    <div class="tituloColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=avisoLegal"><h7>AVISO LEGAL</h7></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=privacyPolicy"><p>Política de privacidad</p></a>
                    </div>
                    <div class="subtitulosColumnaSuperiorSeccionIzquierdaFooter">
                        <a href="?controller=general&action=cookiePilicy"><p>Política de cookies</p></a>
                    </div>
                </div>
            </div>

            <div class="centralSeccionIzquierdaFooter">
                <hr>
            </div>

            <div class="inferiorSeccionIzquierdaFooter">
                <div class="izquierdaInferiorSeccionIzquierdaFooter">
                    <p>©️ Copyright La buenizzima 2024</p>
                </div>
                <div class="derechaInferiorSeccionIzquierdaFooter">
                    <p>All rights reserved.</p>
                </div>
            </div>
        </div>

        <div class="seccionDerechaFooter">
            <div class="contenidoSeccionDerechaFooter">
                <div class="superiorSeccionDerechaFooter">
                    <h7>SÍGUENOS</h7>
                    <div class="contenedorRedesSociales">
                        <div class="redSocial">
                            <img> <!-- ICONO IG -->
                        </div>
                        <div class="redSocial">
                            <img> <!-- ICONO X -->
                        </div>
                        <div class="redSocial">
                            <img> <!-- ICONO FACEBOOK -->
                        </div>
                        <div class="redSocial">
                            <img> <!-- ICONO YT -->
                        </div>
                        <div class="redSocial">
                            <img> <!-- ICONO TIKTOK -->
                        </div>
                    </div>
                </div>
                <div class="inferiorSeccionDerechaFooter">
                    <img> <!-- LOGO LA BUENIZZIMA -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>