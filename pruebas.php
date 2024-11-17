<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divs alineados</title>
    <style>
        .container {
            display: flex; /* Activa Flexbox */
            justify-content: space-between; /* Espacio máximo entre los elementos */
            align-items: center; /* Centra verticalmente los elementos si tienen diferente altura */
            width: 100%; /* El contenedor ocupa todo el ancho */
            border: 1px solid black; /* Solo para visualizar los bordes */
            padding: 10px; /* Espacio interno opcional */
        }

        .left {
            background-color: lightblue; /* Fondo para diferenciar */
            padding: 10px; /* Espacio interno */
        }

        .right {
            background-color: lightgreen; /* Fondo para diferenciar */
            padding: 10px; /* Espacio interno */
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="left">Izquierda</div>
        <div class="right">Derecha</div>
    </div>

</body>
</html>