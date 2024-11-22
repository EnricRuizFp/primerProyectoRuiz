<?php

    class generalController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            include_once "views/main.php";

        }
        public function productos(){

            session_start();
            $_SESSION['filtroSec'] = null;
            $_SESSION['filtroCat'] = null;
            $_SESSION['filtroPre'] = null;
            session_write_close();

            $productos = ProductoDAO::getAll();
            include_once "views/productos/productos.php";

        }

        public function pizzas(){

            session_start();
            $_SESSION['filtroSec'] = null;
            $_SESSION['filtroCat'] = null;
            $_SESSION['filtroPre'] = null;
            session_write_close();

            $categoria = "pizzas";
            $productos = ProductoDAO::getProductos($categoria);
            include_once "views/productos/pizzas.php";

        }
        public function bebidas(){

            session_start();
            $_SESSION['filtroSec'] = null;
            $_SESSION['filtroCat'] = null;
            $_SESSION['filtroPre'] = null;
            session_write_close();

            $categoria = "bebidas";
            $productos = ProductoDAO::getProductos($categoria);
            include_once "views/productos/bebidas.php";

        }
        public function postres(){

            session_start();
            $_SESSION['filtroSec'] = null;
            $_SESSION['filtroCat'] = null;
            $_SESSION['filtroPre'] = null;
            session_write_close();
            
            $categoria = "postres";
            $productos = ProductoDAO::getProductos($categoria);
            include_once "views/productos/postres.php";

        }

        public function admin(){

            include_once "views/admin/index.php";

        }

    }

?>