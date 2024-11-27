<?php

    /* -- Inclusión del archivo de configuración de la DB */
    include_once "config/dataBase.php";
    include_once "models/Producto.php";

    class ProductoDAO{

        public static function getAll(){

            $con = DataBase::connect();

            switch($_SESSION['filtroPre'] ?? null){
                case "mas":
                    $filtroPre = ">=";
                    break;
                case "menos":
                    $filtroPre = "<=";
                    break;
            }

            $sentencia = "SELECT * FROM PRODUCTOS";

            if(isset($_SESSION['filtroSec']) && isset($_SESSION['filtroPre'])){

                $sentencia .= " WHERE seccion = '".$_SESSION['filtroSec']."' and precio ".$filtroPre." 15;";

            }elseif(isset($_SESSION['filtroSec'])){

                $sentencia .= " WHERE seccion = '".$_SESSION['filtroSec']."';";

            }elseif(isset($_SESSION['filtroPre'])){

                $sentencia .= " WHERE precio ".$filtroPre." 15;";

            }else{
                $sentencia .= ";";
            }

            $stmt = $con->prepare($sentencia);

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

        public static function getProductosAleatorios($cantidad,$categoria){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE seccion = ? ORDER BY RAND() LIMIT ?;");
            $stmt->bind_param("si",$categoria,$cantidad);

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

        public static function getProductosPorCategoria($categoria){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE categoria = ?;");
            $stmt->bind_param("s",$categoria);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $productos = [];
            while($producto = $resultado->fetch_object("Producto")){
                $productos[] = $producto;
            }

            return $productos;
        }

        public static function getProductos($categoria){

            session_start();

            $filtroCat = $_SESSION['filtroCat'] ?? null;

            switch($_SESSION['filtroPre'] ?? null){
                case "mas":
                    $filtroPre = ">=";
                    break;
                case "menos":
                    $filtroPre = "<=";
                    break;
            }

            $con = DataBase::connect();

            $sentencia = "SELECT * FROM PRODUCTOS WHERE seccion = '".$categoria."'";

            if(isset($_SESSION['filtroCat'])){
                $sentencia .= " and categoria = '".$filtroCat."'";
            }
            if(isset($_SESSION['filtroPre'])){

                if(str_contains($sentencia, "WHERE")){
                    $sentencia .= " and precio ".$filtroPre." 15";
                }else{
                    $sentencia .= " and precio ".$filtroPre." 15";
                }
            }

            $stmt = $con->prepare($sentencia);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $productos = [];
            while($producto = $resultado->fetch_object("Producto")){
                $productos[] = $producto;
            }

            return $productos;

        }

        public static function getBebidas(){

            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE categoria = 'bebidas'");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $bebidas = [];
            while($bebida = $resultado->fetch_object("Producto")){
                $bebidas[] = $bebida;
            }

            return $bebidas;

        }

        public static function getProductosCarrito($carrito){

            $productos = ProductoDAO::getAll();

            $productosCarrito = [];

            if(!empty($carrito)){
                foreach($carrito as $item){

                    $productoId = $item['producto'];
                    $cantidad = $item['cantidad'];
    
                    foreach($productos as $producto){
    
                        if($producto->getId() == $productoId){
    
                            $productosCarrito[] = ['producto'=>$producto,'cantidad'=>$cantidad];
                            break;
    
                        }
    
                    }
    
                }
            }

            return $productosCarrito;

        }

    }

?>