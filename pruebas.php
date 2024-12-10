<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas</title>
    <style>
        /* Estilo básico para los divs */
        #contenedorDivs {
            display: flex;
            gap: 20px;
        }

        .miDiv {
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            border: 2px solid #ccc;
            cursor: pointer;
            font-size: 24px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .miDiv:hover {
            background-color: #e0e0e0;
        }

        #numeroSeleccionado {
            margin-left: 50px;
            font-size: 30px;
            font-weight: bold;
            border: 2px solid #ccc;
            padding: 10px;
            display: inline-block;
        }

        /* Se utiliza para mostrar el número seleccionado */
        .activo {
            background-color: #c0f0c0;
        }
    </style>
</head>
<body>

<div id="contenedorDivs">
    <div class="miDiv" id="div1" onclick="mostrarNumero(1)">1</div>
    <div class="miDiv" id="div2" onclick="mostrarNumero(2)">2</div>
    <div class="miDiv" id="div3" onclick="mostrarNumero(3)">3</div>
    <div class="miDiv" id="div4" onclick="mostrarNumero(4)">4</div>
    <div class="miDiv" id="div5" onclick="mostrarNumero(5)">5</div>
</div>

<!-- Área para mostrar el número seleccionado -->
<div id="numeroSeleccionado">Selecciona un número</div>

<script>
    function mostrarNumero(numero) {
        // Mostrar el número en el div correspondiente
        document.getElementById("numeroSeleccionado").textContent = "Número seleccionado: " + numero;

        // Resaltar el div seleccionado
        let divs = document.querySelectorAll(".miDiv");
        divs.forEach(div => {
            div.classList.remove("activo");
        });
        document.getElementById("div" + numero).classList.add("activo");
    }
</script>

</body>
</html>
