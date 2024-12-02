<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Emergente</title>
    <style>
        /* Estilo para la lista y el enlace */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        li {
            position: relative; /* Necesario para posicionar el menú emergente */
        }

        a {
            text-decoration: none;
            color: black;
            padding: 10px 20px;
            display: block;
        }

        /* Estilo para el menú desplegable */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%; /* Aparece debajo del enlace */
            left: 0;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            width: 200px;
            z-index: 1;
        }

        /* Mostrar el menú cuando se hace hover sobre el contenedor */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Estilo para los enlaces dentro del menú */
        .dropdown-menu a {
            padding: 10px;
            color: black;
            background-color: white;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Cambiar el color de los enlaces cuando se pasa el mouse */
        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li class="dropdown">
                <a href="#" class="dropdown-link">Usuario</a>
                <div class="dropdown-menu">
                    <a href="#">Iniciar sesión</a>
                    <a href="#">Crear cuenta</a>
                    <a href="#">Estado de mi pedido</a>
                </div>
            </li>
        </ul>
    </nav>

</body>
</html>
