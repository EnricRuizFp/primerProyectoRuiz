<?php

    /* -- Inclusión de los DAOs -- */
    include_once "models/ProductoDAO.php";

    class productoController{

        /* -- Acciones pasadas por URL */
        public function index(){

            $productos = ProductoDAO::getAll();
            include_once "views/productos.php";
        }

        public static function getProductosAleatorios($cantidad){

            $productos_aleatorios = ProductoDao::getProductosAleatorios($cantidad);

            return $productos_aleatorios;

        }

        public static function filtroCat(){

            session_start();

            // Obtener si hay valor en sesión
            if(isset($_SESSION['filtroCat'])){

                // Si es el mismo que el actual, borra el dato
                if($_SESSION['filtroCat'] == $_GET['value']){

                    $_SESSION['filtroCat'] = null;

                }else{

                    // Si el dato es diferente, lo actualiza
                    $_SESSION['filtroCat'] = $_GET['value'];

                }
            }else{

                // Si no hay valor en sesión, lo crea
                $_SESSION['filtroCat'] = $_GET['value'];
            }

            include_once "views/productos.php";

        }

        public static function filtroPre(){

            session_start();

            // Obtener si hay valor en sesión
            if(isset($_SESSION['filtroPre'])){

                // Si es el mismo que el actual, borra el dato
                if($_SESSION['filtroPre'] == $_GET['value']){

                    $_SESSION['filtroPre'] = null;

                }else{

                    // Si el dato es diferente, lo actualiza
                    $_SESSION['filtroPre'] = $_GET['value'];

                }
            }else{

                // Si no hay valor en sesión, lo crea
                $_SESSION['filtroPre'] = $_GET['value'];
            }

            include_once "views/productos.php";

        }

        public static function getProductosParaMostrar(){

            $productos_para_mostrar = productoDAO::getProductosParaMostrar();

            return $productos_para_mostrar;

        }

    }

?>