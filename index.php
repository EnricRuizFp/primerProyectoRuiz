<?php

    /* -- Obtener parámetros de configuración -- */

    // Obtener los parámetros de configuración de la WEB y el controlador de productos
    include_once "config/parameters.php";
    include_once "controllers/productoController.php";
    include_once "controllers/generalController.php";
    include_once "controllers/adminController.php";
    include_once "controllers/ingredienteController.php";
    include_once "controllers/carritoController.php";
    include_once "controllers/usuarioController.php";
    include_once "controllers/pedidoController.php";


    /* -- Obtener datos por URL -- */
    
    if(!isset($_GET['controller'])){

        /* -- No hay controlador en la URL -- */

        // En el caso de no tener controller, lleva a la función por defecto 
        // Por defecto de productoController
        header("Location:".url."?controller=general");

    }else{

        /* -- Hay Controlador en la URL -- */

        // Si se le pasa algo por URL, obtiene lo que hay después de ?controller=
        // Monta la variable [valor pasado]Controller --> EJ: productoController
        $nombre_controller = $_GET['controller']."Controller";

        // Obtiene de los archivos incluidos la clase
        if(class_exists($nombre_controller)){

            $controller = new $nombre_controller();

            // Una vez asignado el controlador, busca el siguiente parámetro (ACCIÓN)
            // También verifica si el método pasado por URL existe dentro del archivo
            if(isset($_GET['action'])  && method_exists( $controller, $_GET['action'] )){
                
                // Pone el dato de la acción en una variable
                $action = $_GET['action'];
            }else{
                $action = default_action;
            }

            // Obtener el tercer parámetro y meter en variable
            $parametro_adicional = isset($_GET['value']) ? $_GET['value'] : null;

            // Llama al controlador especificado (con el parámetro adicional)
            $controller->$action($parametro_adicional);

        }else{

            // Controlador inexistente
            echo "No existe el controlador ".$nombre_controller;

            echo "<br><br><a href='".url."?controller=general'>Llevar a la página principal</a>";

        }

    }


?>