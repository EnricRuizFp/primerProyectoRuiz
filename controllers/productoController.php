<?php

    include_once "config/parameters.php";
    /* -- Inclusión de los DAOs -- */
    include_once "models/ProductoDAO.php";

    class productoController{

        /* -- Acciones pasadas por URL */
        public static function index(){

            $productos = ProductoDAO::getAll();
            include_once "views/productos/productos.php";
        }

        public static function getProductosAleatorios($cantidad, $categoria){

            $productos = ProductoDAO::getProductosAleatorios($cantidad, $categoria);

            return $productos;

        }

        /**
         * /FILTROS PARA PAGINA PRODUCTOS
         */
        public static function filtroSec(){

            session_start();

            //Set el dato en el filtro
            if(isset($_SESSION['filtroSec'])){
                if($_SESSION['filtroSec'] == $_GET['value']){
                    $_SESSION['filtroSec'] = null;
                }else{
                    $_SESSION['filtroSec'] = $_GET['value'];
                }
            }else{
                $_SESSION['filtroSec'] = $_GET['value'];
            }

            session_write_close();

            $productos = ProductoDAO::getAll();
            include_once "views/productos/productos.php";
            
        }

        public static function filtroPreProd(){

            session_start();

            //Set el dato en el filtro
            if(isset($_SESSION['filtroPre'])){
                if($_SESSION['filtroPre'] == $_GET['value']){
                    $_SESSION['filtroPre'] = null;
                }else{
                    $_SESSION['filtroPre'] = $_GET['value'];
                }
            }else{
                $_SESSION['filtroPre'] = $_GET['value'];
            }

            session_write_close();

            $productos = ProductoDAO::getAll();
            include_once "views/productos/productos.php";

        }

        public static function eliminarFiltrosProd(){
            
            session_start();
            $_SESSION['filtroSec'] = null;
            $_SESSION['filtroPre'] = null;

            session_write_close();

            $productos = ProductoDAO::getAll();
            include_once "views/productos/productos.php";
        }

        /**
         * / FILTROS PARA PAGINA PIZZAS
         */
        public static function filtroCatPi(){

            session_start();

            //Set el dato en el filtro
            if(isset($_SESSION['filtroCat'])){
                if($_SESSION['filtroCat'] == $_GET['value']){
                    $_SESSION['filtroCat'] = null;
                }else{
                    $_SESSION['filtroCat'] = $_GET['value'];
                }
            }else{
                $_SESSION['filtroCat'] = $_GET['value'];
            }

            session_write_close();

            $productos = ProductoDAO::getProductos("pizzas");
            include_once "views/productos/pizzas.php";

        }
        public static function filtroPrePi(){

            session_start();

            //Set el dato en el filtro
            if(isset($_SESSION['filtroPre'])){
                if($_SESSION['filtroPre'] == $_GET['value']){
                    $_SESSION['filtroPre'] = null;
                }else{
                    $_SESSION['filtroPre'] = $_GET['value'];
                }
            }else{
                $_SESSION['filtroPre'] = $_GET['value'];
            }

            session_write_close();

            $productos = ProductoDAO::getProductos("pizzas");
            include_once "views/productos/pizzas.php";

        }
        public static function eliminarFiltrosPi(){
            
            session_start();
            $_SESSION['filtroCat'] = null;
            $_SESSION['filtroPre'] = null;

            session_write_close();

            $productos = ProductoDAO::getProductos("pizzas");
            include_once "views/productos/pizzas.php";
        }

        /**
         * / FILTROS PARA PAGINA BEBIAS
         */
        public static function filtroCatBe(){

            session_start();

            //Set el dato en el filtro
            if(isset($_SESSION['filtroCat'])){
                if($_SESSION['filtroCat'] == $_GET['value']){
                    $_SESSION['filtroCat'] = null;
                }else{
                    $_SESSION['filtroCat'] = $_GET['value'];
                }
            }else{
                $_SESSION['filtroCat'] = $_GET['value'];
            }

            session_write_close();

            $productos = ProductoDAO::getProductos("bebidas");
            include_once "views/productos/bebidas.php";

        }
        public static function eliminarFiltrosBe(){
            
            session_start();
            $_SESSION['filtroCat'] = null;
            $_SESSION['filtroPre'] = null;

            session_write_close();

            $productos = ProductoDAO::getProductos("bebidas");
            include_once "views/productos/bebidas.php";
        }

        /**
         * / FILTROS PARA PAGINA POSTRES
         */
        public static function filtroCatPo(){

            session_start();

            //Set el dato en el filtro
            if(isset($_SESSION['filtroCat'])){
                if($_SESSION['filtroCat'] == $_GET['value']){
                    $_SESSION['filtroCat'] = null;
                }else{
                    $_SESSION['filtroCat'] = $_GET['value'];
                }
            }else{
                $_SESSION['filtroCat'] = $_GET['value'];
            }

            session_write_close();

            $productos = ProductoDAO::getProductos("postres");
            include_once "views/productos/postres.php";

        }
        public static function eliminarFiltrosPo(){
            
            session_start();
            $_SESSION['filtroCat'] = null;
            $_SESSION['filtroPre'] = null;

            session_write_close();

            $productos = ProductoDAO::getProductos("postres");
            include_once "views/productos/postres.php";
        }

        public static function getProductos($categoria){

            $productos = productoDAO::getProductos();

            return $productos;

        }

        public static function getProductosPorCategoria($categoria){

            $productos = productoDAO::getProductosPorCategoria($categoria);

            return $productos;

        }

        public static function producto($id){

            $producto = ProductoDAO::getProducto($id);
            $ingredientesPorDefecto = IngredienteDAO::getIngredientesDefault($id);
            include_once "views/productos/detallesProducto.php";

        }

    }

?>