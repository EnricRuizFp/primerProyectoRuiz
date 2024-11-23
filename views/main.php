<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/paginaPrincipal.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>

    <?php include_once "views/others/navbar.php" ?>

    <!-- HEADER -->
    <header aria-label="Imagen de fondo">
        <div id="contenidoHeader">
            <div id="tituloHeader">
                <h1>PIDE AHORA TU PIZZA</h1>
            </div>
            <div id="subtituloHeader">
                <h6>Disfruta de la mejor calidad en La Buenizzima</h6>
            </div>
            <a href="?controller=general&action=productos">
                <div class="botonPedirAhoraPrimario">
                    <p class="p4 bold">Pedir ahora</p>
                </div>
            </a>
            
        </div>
    </header>

    <!-- SECCION 1 -->
    <div id="seccion1">

        <!-- Contenedor de la sección -->
        <div id="contenedorGeneralSeccion1">

            <div class="contenedorSeccion1">

                <div class="separadorImagenContenedorSeccion1">

                    <!-- Imagen camion repartidor -->
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="215px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#FF4713" stroke="none">
                            <path d="M540 4308 c-76 -52 -98 -125 -61 -201 44 -90 -92 -81 1371 -87 l1295 -5 5 -595 5 -595 23 -33 c50 -70 15 -67 738 -70 l652 -3 116 -149 116 -149 0 -420 0 -421 -154 0 -154 0 -17 53 c-61 189 -220 344 -425 413 -83 28 -281 27 -375 -3 -204 -65 -357 -224 -429 -446 -5 -16 -35 -17 -482 -15 l-476 3 -23 62 c-73 202 -249 359 -459 408 -211 50 -440 -17 -596 -174 -76 -77 -135 -170 -160 -258 l-13 -42 -243 -3 -243 -3 -36 -35 c-63 -61 -71 -148 -18 -210 48 -58 60 -60 312 -60 l229 0 16 -46 c48 -142 173 -289 303 -357 244 -128 536 -92 733 90 81 75 141 162 172 250 l23 63 479 -2 479 -3 28 -69 c141 -348 541 -504 875 -342 164 80 271 207 339 404 3 9 65 12 263 12 252 0 260 1 292 23 19 12 43 38 54 57 20 34 21 51 24 578 2 359 -1 556 -8 582 -7 26 -65 109 -168 242 l-157 203 -255 505 c-254 503 -255 504 -299 527 -44 23 -49 23 -401 23 l-357 0 -5 103 c-5 115 -19 152 -70 189 l-33 23 -1396 3 -1396 2 -33 -22z m3679 -933 c89 -173 161 -319 161 -325 0 -7 -155 -10 -455 -10 l-455 0 0 325 0 325 294 0 294 0 161 -315z m-2412 -1655 c200 -98 241 -366 78 -524 -121 -118 -324 -117 -449 2 -122 116 -130 319 -18 443 53 59 92 84 163 104 74 20 149 12 226 -25z m2176 14 c60 -20 141 -93 175 -158 24 -45 27 -62 27 -146 0 -80 -4 -102 -23 -138 -97 -182 -315 -240 -479 -129 -58 40 -108 111 -129 185 -39 133 24 289 144 359 92 54 181 63 285 27z"/>
                            <path d="M355 3650 c-56 -29 -78 -63 -83 -130 -4 -65 20 -110 78 -144 34 -21 47 -21 765 -21 715 0 731 0 765 20 49 28 83 97 77 154 -5 47 -27 83 -71 115 -27 21 -38 21 -759 24 -719 2 -733 2 -772 -18z"/>
                            <path d="M125 3029 c-50 -12 -102 -62 -116 -111 -21 -79 38 -179 114 -193 18 -3 356 -5 752 -3 l720 3 33 23 c72 52 88 154 35 220 -57 71 -12 67 -793 69 -417 1 -721 -3 -745 -8z"/>
                            <path d="M350 2379 c-53 -31 -73 -65 -78 -129 -4 -65 20 -110 78 -144 34 -20 49 -21 445 -21 396 0 411 1 445 21 108 63 109 218 0 275 -32 18 -65 19 -445 19 -395 0 -411 -1 -445 -21z"/>
                        </g>
                    </svg>
                </div>

                <div class="separadorContenidoContenedorSeccion1">

                    <div class="tituloContenidoContenedorSeccion1">
                        <p class="p2 bold">Repartidores comprometidos con su trabajo</p>
                    </div>
                    <div class="textoContenidoContenedorSeccion1">
                        <p class="p5">Recibe tu pedido en menos de 1h, sino, te lo regalamos.</p>
                    </div>

                    <a href="?controller=general&action=saberMas">
                        <div class="botonSaberMasPrimario">
                            <p class="bold">SABER MÁS</p>
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

            <div class="contenedorSeccion1">

                <div class="separadorImagenContenedorSeccion1">
                    <!-- Imagen Garantía -->
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="215px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#FF4713" stroke="none">
                            <path d="M2483 5008 c-77 -8 -173 -42 -238 -85 -22 -14 -107 -76 -190 -138 -195 -145 -223 -163 -282 -181 -28 -9 -148 -21 -293 -30 -135 -8 -272 -21 -305 -29 -105 -27 -183 -72 -266 -154 -107 -107 -133 -166 -204 -465 -32 -138 -67 -260 -82 -289 -17 -35 -64 -87 -147 -166 -297 -281 -343 -340 -381 -486 -17 -69 -20 -215 -4 -283 6 -26 64 -157 130 -292 81 -167 123 -264 130 -304 9 -49 6 -95 -17 -275 -31 -248 -33 -350 -11 -438 33 -127 112 -247 211 -320 64 -47 68 -49 334 -164 101 -43 203 -92 227 -109 47 -32 90 -90 242 -320 52 -80 116 -167 141 -194 128 -133 302 -196 488 -175 39 4 171 38 295 76 299 90 299 90 597 0 248 -76 328 -89 434 -76 86 11 124 22 200 60 102 51 171 128 332 369 113 170 158 228 194 254 25 19 143 76 262 126 118 51 245 113 283 137 76 50 144 129 188 215 67 133 73 237 33 568 -23 188 -25 224 -14 274 7 36 55 145 126 287 62 125 120 255 129 287 19 76 19 221 0 296 -39 149 -73 192 -385 491 -71 68 -125 129 -142 160 -17 32 -46 131 -77 265 -28 118 -60 243 -72 277 -57 174 -220 321 -404 368 -34 8 -171 22 -305 30 -237 14 -297 23 -350 50 -14 7 -115 79 -225 160 -110 81 -221 158 -248 171 -92 47 -209 65 -334 52z m159 -172 c36 -8 79 -21 95 -30 16 -8 118 -80 227 -160 108 -81 219 -157 246 -171 84 -43 154 -54 415 -70 272 -16 325 -27 408 -84 112 -77 149 -152 218 -446 84 -359 71 -338 432 -683 131 -124 172 -190 186 -297 15 -113 1 -161 -123 -410 -117 -237 -139 -294 -151 -387 -6 -47 10 -214 49 -533 6 -48 -13 -145 -39 -202 -26 -57 -99 -142 -150 -173 -18 -11 -130 -63 -249 -114 -234 -102 -289 -133 -351 -196 -22 -22 -105 -139 -185 -258 -159 -237 -201 -282 -307 -322 -42 -16 -80 -22 -138 -22 -71 0 -107 8 -320 73 -233 71 -243 73 -345 73 -102 0 -112 -2 -345 -73 -213 -65 -249 -73 -320 -73 -58 0 -96 6 -138 22 -106 40 -148 84 -307 322 -80 120 -164 237 -188 261 -61 62 -124 97 -348 193 -109 47 -217 96 -239 109 -58 33 -132 117 -162 181 -42 92 -44 145 -16 374 31 253 33 373 9 455 -10 33 -69 164 -132 290 -124 249 -139 297 -123 410 14 108 55 172 191 302 345 329 344 328 414 625 83 351 107 405 217 489 88 66 143 78 422 94 143 8 275 21 308 30 90 24 159 64 352 209 190 143 253 181 325 195 65 13 87 12 162 -3z"/>
                            <path d="M2338 4185 c-358 -49 -679 -209 -937 -466 -331 -331 -499 -765 -477 -1234 45 -990 946 -1710 1926 -1540 592 103 1086 538 1273 1120 127 396 95 830 -88 1210 -310 639 -994 1006 -1697 910z m514 -185 c579 -122 1024 -568 1150 -1153 31 -147 31 -427 0 -574 -127 -587 -568 -1028 -1155 -1155 -147 -31 -427 -31 -574 0 -588 127 -1028 567 -1155 1155 -31 147 -31 427 0 574 135 626 629 1085 1262 1173 104 14 361 4 472 -20z"/>
                            <path d="M3182 3299 c-92 -18 -132 -52 -479 -406 l-336 -344 -156 154 c-187 186 -213 201 -331 201 -72 0 -92 -4 -135 -26 -112 -59 -164 -146 -165 -273 0 -130 6 -139 331 -462 320 -317 332 -326 454 -326 91 0 160 30 234 104 30 30 243 244 473 475 469 473 468 471 468 600 0 39 -7 91 -16 117 -44 129 -200 214 -342 186z m129 -187 c38 -21 59 -63 59 -117 0 -46 -1 -47 -137 -188 -439 -453 -799 -808 -828 -816 -76 -21 -82 -17 -363 263 -145 143 -270 273 -278 288 -51 98 35 214 143 193 32 -6 67 -36 229 -197 181 -179 194 -190 230 -190 35 0 53 16 423 386 259 259 396 389 416 395 35 10 69 5 106 -17z"/>
                        </g>
                    </svg>
                </div>

                <div class="separadorContenidoContenedorSeccion1">

                    <div class="tituloContenidoContenedorSeccion1">
                        <p class="p2 bold">Calidad en todos nuestros productos</p>
                    </div>
                    <div class="textoContenidoContenedorSeccion1">
                        <p class="p5">Todos nuestros productos están elaborador a mano por expertos en el ámbito de la hostelería el mismo día.</p>
                    </div>

                    <a href="?controller=general&action=productos">
                        <div class="botonProductosPrimario">
                            <p class="bold">PRODUCTOS</p>
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

            <div class="contenedorSeccion1">

                <div class="separadorImagenContenedorSeccion1">
                    <!-- Imagen Ayuda -->
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="215px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#FF4713" stroke="none">
                            <path d="M1785 4716 c-191 -44 -367 -174 -468 -346 -146 -250 -124 -583 54 -815 21 -27 297 -309 614 -625 l575 -575 603 605 c635 637 632 633 690 780 50 128 59 316 22 455 -60 228 -244 422 -473 502 -68 24 -92 27 -212 28 -114 0 -146 -4 -210 -23 -134 -43 -250 -110 -382 -223 l-38 -32 -37 32 c-128 109 -252 182 -378 221 -89 28 -272 36 -360 16z m301 -210 c110 -29 191 -84 336 -225 l138 -134 138 134 c204 199 307 247 510 237 91 -4 106 -8 186 -47 149 -72 254 -204 286 -358 28 -131 -2 -294 -73 -398 -15 -21 -256 -269 -538 -551 l-511 -513 -513 516 c-333 335 -524 534 -545 569 -66 109 -88 271 -55 399 48 184 205 336 390 378 45 10 203 6 251 -7z"/>
                            <path d="M240 4521 c-94 -29 -168 -94 -211 -185 l-29 -61 0 -1067 c0 -1016 1 -1069 19 -1127 10 -33 31 -82 47 -108 16 -29 196 -218 444 -468 313 -316 422 -433 440 -470 25 -49 25 -55 28 -347 l3 -298 595 0 595 0 -3 618 -3 617 -31 86 c-37 103 -103 207 -176 275 -215 199 -350 325 -607 565 -162 151 -326 303 -364 338 -38 35 -95 75 -126 89 -31 14 -57 26 -58 27 -2 1 -21 181 -43 401 -92 911 -88 872 -115 933 -34 72 -109 144 -181 171 -56 21 -172 26 -224 11z m170 -219 c55 -41 55 -46 115 -632 31 -305 59 -584 62 -620 l5 -65 -49 -32 c-169 -109 -193 -362 -49 -507 76 -77 758 -691 771 -694 12 -3 133 123 136 142 1 8 -56 61 -529 489 -274 249 -283 261 -259 335 27 83 134 107 200 45 18 -17 260 -242 538 -501 329 -306 517 -488 539 -521 69 -109 70 -118 70 -657 l0 -484 -385 0 -385 0 0 158 c0 203 -12 279 -55 371 -32 66 -58 97 -268 310 -593 601 -602 611 -632 668 l-30 57 0 1037 c0 1027 0 1038 20 1065 47 63 127 78 185 36z"/>
                            <path d="M4653 4510 c-69 -28 -146 -101 -178 -171 -27 -61 -23 -23 -115 -934 -27 -267 -44 -401 -52 -404 -78 -27 -159 -96 -663 -566 -568 -529 -593 -556 -648 -695 -45 -114 -47 -151 -47 -767 l0 -583 594 0 595 0 3 298 c3 292 3 298 27 347 19 38 123 149 430 458 224 225 423 433 444 464 20 30 46 85 57 122 20 65 20 88 18 1141 l-3 1075 -24 47 c-31 63 -89 121 -153 154 -73 38 -208 44 -285 14z m206 -208 c13 -10 32 -33 43 -52 18 -34 18 -76 16 -1061 l-3 -1025 -30 -58 c-21 -40 -83 -110 -215 -244 -637 -644 -648 -655 -685 -733 -43 -92 -55 -168 -55 -371 l0 -158 -385 0 -385 0 0 485 c0 465 1 488 21 548 11 34 34 83 51 110 17 27 150 159 312 309 154 144 313 292 351 329 39 36 153 143 255 238 191 177 215 192 276 177 34 -9 80 -58 87 -92 14 -74 21 -66 -665 -683 l-138 -124 39 -46 c22 -25 54 -60 73 -78 l33 -31 160 146 c89 81 255 232 370 336 266 240 290 265 316 335 28 74 24 194 -9 263 -25 50 -91 121 -134 144 -18 9 -28 23 -28 37 0 64 122 1216 131 1239 32 78 132 109 198 60z"/>
                        </g>
                    </svg>

                </div>

                <div class="separadorContenidoContenedorSeccion1">

                    <div class="tituloContenidoContenedorSeccion1">
                        <p class="p2 bold">¿Necesitas ayuda? Contáctanos</p>
                    </div>
                    <div class="textoContenidoContenedorSeccion1">
                        <p class="p5">Tenemos diferentes vías de contacto y un operador estará dispuesto a ayudarte con cualquier duda.</p>
                    </div>

                    <a href="?controller=general&action=ayuda">
                        <div class="botonPedirAyudaPrimario">
                            <p class="bold">PEDIR AYUDA</p>
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
        </div>
    </div>

    <!-- SECCION 2 -->
    <div id="seccion2">

        <div id="contenedorIzquierdaSeccion2">

            <div id="contenidoSeccion2">
                <div id="tituloContenidoSeccion2">
                    <h4>TU PIZZA AL GUSTO</h4>
                </div>
                <div id="textoContenidoSeccion2">
                    <p class="p3 bold">Escoge las masas: Fina, normal o gruesa.</p>
                    <p class="p3 bold">Escoge los ingredientes: todos los que puedas imaginar.</p>

                    <div id="subtextoContenidoSeccion2">
                        <p class="p3 bold">¿Cómo te gusta? ¿Bien hecha? ¡Marchando!</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="contenedorDerechaSeccion2">
            <img src="media/images/imagen_lateral_seccion2.webp" id="imagenSeccion2"> <!-- Imagen Pizza -->
        </div>
    </div>

    <!-- SECCION 3 -->
    <div id="seccion3">

        <div id="contenedorSeccion3">

            <div id="tituloSeccion3">
                <h4>NUESTRAS ESPECIALIDADES</h4>
            </div>

            <div id="contenidoSeccion3">

                <?php

                foreach($productos_aleatorios as $producto_aleatorio){

                    ?>
                    
                    <div class="contenedorPizzasSeccion3">
                        <div class="separadorImagenSeccion3">
                            <img src="<?= $producto_aleatorio->getImagen()?>" width="100%"> <!-- Imagen Pizza -->
                        </div>
                        <div class="separadorContenidoSeccion3">

                            <div class="lineaDivisoraContenidoSeccion3">
                                <hr>
                            </div>
                            <div class="tituloContenidoSeccion3">
                                <h7 class="naranja"><?= $producto_aleatorio->getNombre()?></h7>
                            </div>
                            <div class="textoContenidoSeccion3">
                                <p class="p5 bold"><?= $producto_aleatorio->getDescripcion()?></p>
                            </div>
                            <div class="precioContenidoSeccion3">
                                <p class="p2 bold"><?= $producto_aleatorio->getPrecio()?> €</p>
                            </div>

                            <a href="?controller=producto&action=producto&value=<?= $producto_aleatorio->getId()?>">
                                <div class="botonPedirAhoraPrimario">
                                    <p class="p4 bold">Pedir ahora</p>
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

    <!-- SECCION 4 -->
    <div id="seccion4">

        <div id="contenedorSeccion4">

            <div id="contenedorIzquierdaSeccion4">
                <div id="tituloSeccion4">
                    <h6 class="blanco">REGÍSTRATE PARA VER LAS ÚLTIMAS OFERTAS Y PROMOCIONES</h6>
                </div>
                <div id="textoSeccion4">
                    <p class="p5">Ver <a href="?controller=general&action=privacidad" class="negro bold">Política de privacidad</a></p>
                </div>
            </div>

            <div id="seccionDerechaSeccion4">
                <a href="?controller=general&action=usuario">
                    <div class="botonRegistrarseAhoraPrimario2">
                        <p class="p4 bold">REGISTRARSE AHORA</p>
                    </div>
                </a>                
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