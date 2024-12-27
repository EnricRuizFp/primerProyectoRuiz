<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop-up Example</title>
    <style>
        /* Estilos para el pop-up */
        .popupProductoAñadido {
            position: fixed;
            top: 20px; /* Cerca del borde superior */
            left: 50%; /* Centrado horizontalmente */
            transform: translateX(-50%); /* Ajuste para centrar el pop-up */
            background-color: #28a745; /* Verde para éxito */
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            font-family: Arial, sans-serif;
            display: none; /* Oculto inicialmente */
            animation: fadeIn 0.5s ease, fadeOut 0.5s ease 9.5s; /* Animación de entrada y salida */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -20px); /* Aparece desplazado hacia arriba */
            }
            to {
                opacity: 1;
                transform: translate(-50%, 0); /* Llega a la posición final */
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translate(-50%, 0); /* Comienza en la posición final */
            }
            to {
                opacity: 0;
                transform: translate(-50%, -20px); /* Se desplaza hacia arriba al desaparecer */
            }
        }
    </style>
</head>
<body>

    <!-- Botón que activa el pop-up -->
    <button id="showPopupBtn" class="btn">Añadir al carrito</button>

    <!-- Contenedor del pop-up -->
    <div id="popup" class="popup">
        Producto añadido al carrito.
    </div>

    <script>
        // Función para mostrar el pop-up
        function mostrarPopup() {
            const popup = document.getElementById('popup');
            popup.style.display = 'block'; // Mostrar el pop-up

            // Ocultar automáticamente después de 10 segundos
            setTimeout(() => {
                popup.style.display = 'none';
            }, 10000); // 10 segundos
        }

        // Escuchar el evento click en el botón
        document.getElementById('showPopupBtn').addEventListener('click', () => {
            mostrarPopup(); // Llama a la función para mostrar el pop-up
        });
    </script>

</body>
</html>
