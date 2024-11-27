<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">

    <style>
        #contador {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        #contador a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            margin: 0 10px;
            cursor: pointer;
        }

        #contador a:hover {
            color: blue; /* Cambia el color al pasar el mouse */
        }

        #valor {
            margin: 0 10px;
        }
    </style>

</head>
<body>

    <div id="contador">
        <a href="#" id="decrementar">-</a>
        <span id="valor">1</span>
        <a href="#" id="incrementar">+</a>
    </div>


</body>
</html>