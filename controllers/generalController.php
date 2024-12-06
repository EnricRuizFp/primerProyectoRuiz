<?php

    class generalController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            session_start();
            $_SESSION['resultadoRegister'] = null;

            // Generar 5 numeros random para mostrar pizzas
            include_once "controllers/productoController.php";
            include_once "models/Producto.php";

            $productos_aleatorios = productoController::getProductosAleatorios(5,"pizzas");
            include_once "views/main.php";

        }
        public function ofertas(){

            include_once "models/Oferta.php";
            include_once "models/OfertaDAO.php";
            
            $ofertas = OfertaDAO::getAll();
            include_once "views/ofertas.php";

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