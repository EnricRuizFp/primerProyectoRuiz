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

        /**
         * FUNCIONES PARA LA API
         */
        public static function obtenerAllProductos(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $productos = [];
            while($producto = $resultado->fetch_assoc()){
                $productos[] = $producto;
            }

            $stmt->close();
            $con->close();

            return $productos;

        }

        public static function getPrecioProducto($producto_id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT precio FROM PRODUCTOS WHERE ID = ?");
            $stmt->bind_param("i",$producto_id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $precioProducto = (int) $resultado->fetch_row()[0];

            return $precioProducto;

        }

        public static function crearProducto($nombre, $descripcion, $seccion, $ingredientes, $categoria, $precio, $imagen){

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO PRODUCTOS (nombre, descripcion, categoria, precio, imagen, seccion) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("sssdss", $nombre, $descripcion, $categoria, $precio, $imagen, $seccion);

            if( $stmt->execute() ){

                // Obtener el ID insertado
                $producto_id = $con->insert_id;

                $stmt->close();

                $stmt = $con->prepare("INSERT INTO PRODUCTO_INGREDIENTE (producto_id, ingrediente_id) VALUES (?,?)");
                foreach($ingredientes as $ingrediente){

                    $stmt->bind_param("ii",$producto_id,$ingrediente);
                    if( $stmt->execute() ){

                        // Ha funcionado bien, no hacer nada para pasar al siguiente

                    }else{
                        return "Error al añadir ingrediente".$ingrediente;
                    }

                }

                return true;
            
            }else{
                return "Error al crear el producto.";
            }

        }

        public static function obtenerProductos($filtro){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE seccion = ?");
            $stmt->bind_param("s", $filtro);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $productos = [];
            while($producto = $resultado->fetch_assoc()){
                $productos[] = $producto;
            }

            $stmt->close();
            $con->close();

            return $productos;

        }

        public static function obtenerProducto($producto_id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PRODUCTOS WHERE ID = ?");
            $stmt->bind_param("i",$producto_id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $producto = $resultado->fetch_assoc();

            $stmt->close();
            $con->close();

            return $producto;

        }

        public static function editarProducto($id, $nombre, $descripcion, $seccion, $ingredientes, $categoria, $precio, $imagen){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE PRODUCTOS SET nombre = ?, descripcion = ?, categoria = ?, precio = ?, imagen = ? , seccion = ? WHERE ID = ?");
            $stmt->bind_param("sssdssi", $nombre, $descripcion, $categoria, $precio, $imagen, $seccion, $id);

            if( $stmt->execute() ){

                $stmt->close();

                // Eliminar todas las relaciones anteriores
                $stmt = $con->prepare("DELETE FROM PRODUCTO_INGREDIENTE WHERE producto_id = ?");
                $stmt->bind_param("i",$id);

                if( $stmt->execute() ){

                    // Volver a crear todas las relaciones
                    $stmt = $con->prepare("INSERT INTO PRODUCTO_INGREDIENTE (producto_id, ingrediente_id) VALUES (?,?)");
                    foreach($ingredientes as $ingrediente){

                        $stmt->bind_param("ii",$id,$ingrediente);
                        if( $stmt->execute() ){

                            // Ha funcionado bien, no hacer nada para pasar al siguiente

                        }else{
                            return "Error al añadir ingrediente".$ingrediente;
                        }

                    }

                    return true;

                }else{
                    return "Error al eliminar las relaciones con los ingredientes";
                }
            
            }else{
                return "Error al crear el producto.";
            }

        }

        public static function eliminarProducto($producto_id){

            $con = DataBase::connect();

            // Eliminar el pedido
            $stmt = $con->prepare("DELETE FROM PRODUCTOS WHERE ID = ?");
            $stmt->bind_param("i",$producto_id);

            if( $stmt->execute() ){

                $stmt->close();

                // Eliminar todos los productos del pedido
                $stmt = $con->prepare("DELETE FROM PRODUCTO_INGREDIENTE WHERE producto_id = ?");
                $stmt->bind_param("i",$producto_id);

                if( $stmt->execute() ){
                    return true;
                }else{
                    return "Error al eliminar sus ingredientes";
                }

            }else{
                return "Error al eliminar el producto";
            }

        }

        /**
         * PANTALLA ADMIN
         */
        public static function obtenerCantidadProductos(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT COUNT(*) AS cantidadProductos FROM PRODUCTOS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $cantidadProductos = $result['cantidadProductos'];

            $stmt->close();
            $con->close();

            return $cantidadProductos;

        }

        public static function obtenerPromedioPrecioPizzas(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT ROUND(AVG(precio), 2) AS promedioPrecio FROM PRODUCTOS WHERE seccion = 'pizzas'");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $promedioPrecio = $result['promedioPrecio'];

            $stmt->close();
            $con->close();

            return $promedioPrecio;

        }

        public static function obtenerPromedioPrecioBebidas(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT ROUND(AVG(precio), 2) AS promedioPrecio FROM PRODUCTOS WHERE seccion = 'bebidas'");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $promedioPrecio = $result['promedioPrecio'];

            $stmt->close();
            $con->close();

            return $promedioPrecio;

        }

        public static function obtenerPromedioPrecioPostres(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT ROUND(AVG(precio), 2) AS promedioPrecio FROM PRODUCTOS WHERE seccion = 'postres'");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $promedioPrecio = $result['promedioPrecio'];

            $stmt->close();
            $con->close();

            return $promedioPrecio;

        }

    }

?>