<?php

    /* -- Inclusión del archivo de configuración de la DB */
    include_once "config/dataBase.php";
    include_once "models/Producto.php";

    class ProductoDAO{

        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $productos = [];
            while($producto = $resultado->fetch_object("Producto")){
                $productos[] = $producto;
            }

            $stmt->close();
            $con->close();

            return $productos;

        }

        public static function getProducto($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE ID = ?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $producto = $resultado->fetch_object("Producto");

            return $producto;
        }

        public static function getCantidadProductos(){
            
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT COUNT(*) FROM PRODUCTOS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $cantidadProductos = (int) $resultado->fetch_row()[0];

            return $cantidadProductos;
        }

        public static function getProductosAleatorios($cantidad){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS ORDER BY RAND() LIMIT ?;");
            $stmt->bind_param("i",$cantidad);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $productos_aleatorios = [];
            while($producto_aleatorio = $resultado->fetch_object("Producto")){
                $productos_aleatorios[] = $producto_aleatorio;
            }

            return $productos_aleatorios;

        }

        public static function getProductosParaMostrar(){

            $con = DataBase::connect();

            if(isset($_SESSION['filtroPre'])){
                if($_SESSION['filtroPre'] == 'menos'){
                    $precio = '<=';
                    
                }else{
                    $precio = '>=';
                }
            }

            if(isset($_SESSION['filtroCat']) && isset($_SESSION['filtroPre'])){

                if($_SESSION['filtroPre'] == 'menos'){
                    $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE categoria = ? AND precio <= 15;");
                }else{
                    $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE categoria = ? AND precio >= 15;");
                }
                $stmt->bind_param("s",$_SESSION['filtroCat']);

            }elseif(isset($_SESSION['filtroCat'])){

                $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE categoria = ?;");
                $stmt->bind_param("s",$_SESSION['filtroCat']);

            }elseif(isset($_SESSION['filtroPre'])){

                if($_SESSION['filtroPre'] == 'menos'){
                    $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE precio <= 15;");
                }else{
                    $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE precio >= 15;");
                }

            }else{

                $stmt = $con->prepare("SELECT * FROM PRODUCTOS;");

            }

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $productos_para_mostrar = [];
            while($producto_para_mostrar = $resultado->fetch_object("Producto")){
                $productos_para_mostrar[] = $producto_para_mostrar;
            }

            return $productos_para_mostrar;

        }

    }

?>