<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

    <!-- LINKS A CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/paginasExtra.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>
<body>

    <!-- NAVBAR -->
    <div class="barraNavegacion fixed-top">
        <?php include_once "views/others/navbar.php"; ?>
    </div>

    <!-- HEADER -->
    <header>
        <div id="tituloPagina">
            <h4>CORPORATIVO</h4>
        </div>
    </header>

    <div class="contenidoPagina">
        <h5 id="acercaDeLaBuenizzima">Acerca de La Buenizzima</h5>
        <p>Establecida en el año 2000, La Buenizzima ha emergido como un ícono en la creación de pizzas rústicas de primera categoría, sobresaliendo por su dedicación a la autenticidad, el sabor y la calidad. Desde que comenzamos, hemos tenido una misión definida: proporcionar más que solo un plato, generar recuerdos inolvidables que integren tradición, creatividad y amor por la cocina.</p>
        <p>Nuestro compromiso inicia con los ingredientes. Empleamos harinas de alta calidad, quesos elaborados de manera artesanal, carnes de fuentes responsables y verduras frescas, seleccionadas con esmero para asegurar una experiencia culinaria sobresaliente. Las masas, preparadas diariamente de manera artesanal, son el alma de nuestras pizzas. Gracias a un proceso de fermentación natural y su cocción en hornos de piedra, conseguimos una textura crujiente por fuera y tierna por dentro, con un matiz de sabor ahumado que nos caracteriza.</p>
        <p>En La Buenizzima, reconocemos que las necesidades de nuestros clientes varían. Aunque en este momento nuestras pizzas no son adecuadas para quienes tienen celiaquía o sensibilidad al gluten, debido a la posibilidad de contaminación en nuestros productos, estamos esforzándonos por crear alternativas sin gluten que respeten nuestros rigurosos estándares de calidad. Esta acción es parte de nuestro compromiso continuo con la mejora y la inclusión.</p>
        <p>La claridad, la innovación y el aprecio por la herencia son principios esenciales que orientan cada una de nuestras elecciones. Con más de 20 años de experiencia, continuamos innovando y mejorando nuestras recetas para proporcionar pizzas que representen nuestra pasión y compromiso.</p>
        <p>En La Buenizzima, pensamos que cada pizza representa una ocasión para disfrutar momentos únicos. Nuestra misión es seguir ofreciendo en cada hogar un producto de calidad sobresaliente que represente nuestro compromiso con el sabor genuino y la felicidad de nuestros consumidores.</p>

    </div>

    <div class="contenidoPagina">
        <h5 id="trabajaConNosotros">Trabaja con nosotros</h5>
        <p>En La Buenizzima, apreciamos enormemente la experiencia del cliente, y esta filosofía se manifiesta también en la manera en que elegimos a nuestro personal. Si deseas unirte a nuestro equipo, te animamos a que traigas tu currículum en persona a nuestra tienda. Uno de nuestros directores será quien reciba tu petición y se encargue personalmente del proceso, garantizando encontrar a quienes compartan nuestra pasión por la calidad, el servicio y la autenticidad.</p>

    </div>

    <!-- FOOTER -->
    <?php include_once "views/others/footer.php"; ?>

    <!-- Bootstrap Bundle with Popper (JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>