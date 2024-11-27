<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar con animación</title>

  <style>
    .contenido {
      display: block; /* Cambiar a block para permitir la animación */
      height: 0; /* Iniciar con altura 0 */
      overflow: hidden;
      transition: height 1s ease-in-out;
      background-color: #f0f0f0;
      padding: 0 20px;
    }
  </style>

</head>
<body>

  <!-- Botón para mostrar el div -->
  <button id="mostrarBtn">Mostrar Contenido</button>

  <!-- Div oculto inicialmente -->
  <div id="contenido" class="contenido">
    <p>Este es el contenido que se mostrará con animación al hacer clic en el botón.</p>
  </div>

  <script>
    // Obtener el botón y el div
    const mostrarBtn = document.getElementById('mostrarBtn');
    const contenido = document.getElementById('contenido');

    // Función para animar la apertura o cierre del div
    mostrarBtn.addEventListener('click', () => {
      // Si el div está cerrado, lo abrimos
      if (contenido.style.height === '0px' || contenido.style.height === '') {
        // Cambiar a su altura natural con scrollHeight
        contenido.style.height = contenido.scrollHeight + 'px';
      } else {
        // Si el div está abierto, lo cerramos
        contenido.style.height = '0';
      }
    });
  </script>

</body>
</html>
