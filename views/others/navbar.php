<nav class="navbar navbar-expand-lg" id="nav">
    <div class="container-fluid position-relative background-white">
        <!-- Botón de menú para pantallas pequeñas, alineado a la izquierda -->
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: 0px;">
            <svg version="1.1" id="svg2" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:docname="lines.svg" inkscape:version="0.48.4 r9939" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="30px" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">
                <path id="rect3039" inkscape:connector-curvature="0" d="M0,0v240h1200V0H0z M0,480v240h1200V480H0z M0,960v240h1200V960H0z"/>
            </svg>
        </button>

        <!-- Logo de la marca, centrado en pantallas pequeñas -->
        <div class="navbar-brand mx-auto">
            <a href="?cotroller=general"><img src="media/images/logos/Logo_LA_BUENIZZIMA_6-removebg-preview.png" height="70px" alt="Logo de la empresa La Buenizzima."></a>
        </div>

        <!-- Enlaces de navegación principales -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-text p4" href="?controller=general&action=ofertas">Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-text p4" href="?controller=general&action=productos">Carta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-text p4" href="?controller=general&action=pizzas">Pizzas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-text p4" href="?controller=general&action=bebidas">Bebidas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-text p4" href="?controller=general&action=postres">Postres</a>
                </li>
            </ul>
        </div>

        <!-- Iconos a la derecha, con dropdown en el icono de usuario -->
        <div class="navbar-icons d-flex align-items-center">
            <a class="nav-icon me-3" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24px" fill="none">
                    <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <!-- Dropdown para usuario -->
            <div class="dropdown">
                <a class="nav-icon" id="dropdownUserMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="22px">
                        <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
                    </svg>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUserMenu">
                    <li id="contenedorMiCuenta"><a class="dropdown-item" href="?controller=usuario">Mi cuenta</a></li>
                    <li id="contenedorLogin"><a class="dropdown-item" href="?controller=usuario&action=login">Iniciar sesión</a></li>
                    <li id="contenedorRegister"><a class="dropdown-item" href="?controller=usuario&action=register">Registrarse</a></li>
                    <li id="contenedorCerrarSesion"><a class="dropdown-item" href="?controller=usuario&action=logout">Cerrar sesión</a></li>
                </ul>
            </div>

            <a class="nav-icon" href="?controller=carrito">
                <svg height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</nav>

<script>

    // Obtener el dato de sesión
    const sesionActual = <?php echo isset($_SESSION['usuarioActual']) ? "'".$_SESSION['usuarioActual']."'" : "''"; ?>;

    document.addEventListener("DOMContentLoaded", () => {

        const contenedorMiCuenta = document.getElementById('contenedorMiCuenta');
        const contenedorLogin = document.getElementById('contenedorLogin');
        const contenedorRegister = document.getElementById('contenedorRegister');
        const contenedorLogout = document.getElementById('contenedorCerrarSesion');

        // Mostrar / ocultar contenedores
        if(sesionActual){
            contenedorMiCuenta.style.display = 'block';
            contenedorLogin.style.display = 'none';
            contenedorRegister.style.display = 'none';
            contenedorLogout.style.display = 'block';
        }else{
            contenedorMiCuenta.style.display = 'none';
            contenedorLogin.style.display = 'block';
            contenedorRegister.style.display = 'block';
            contenedorLogout.style.display = 'none';
        }

    });

</script>