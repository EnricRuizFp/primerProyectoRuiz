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

    }

?>