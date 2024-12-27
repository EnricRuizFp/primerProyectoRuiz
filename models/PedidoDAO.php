<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Pedido.php";

    class PedidoDAO{

        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedidos = [];
            while($pedido = $resultado->fetch_object("Pedido")){
                $pedidos[] = $pedido;
            }

            $stmt->close();
            $con->close();

            return $pedidos;

        }

        public static function getPedidos($usuario){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE cliente_id = ?");
            $stmt->bind_param("i", $usuario);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedidos = [];
            while($pedido = $resultado->fetch_object("Pedido")){
                $pedidos[] = $pedido;
            }

            $stmt->close();
            $con->close();

            return $pedidos;

        }

        public static function generarPedido($usuarioActual,$oferta_id,$precioProductos,$descuento,$precioFinal,$estadoPedido,$fechaPedido, $productosCarrito, $direccion){

            $con = DataBase::connect();

            $stmt = $con->prepare("INSERT INTO PEDIDO (cliente_id, oferta_id, precio, descuento, precio_final, estado_pedido, fecha, direccion) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("iidddssi", $usuarioActual,$oferta_id,$precioProductos,$descuento,$precioFinal,$estadoPedido,$fechaPedido, $direccion);

            // Ejecutar creación de pedido
            if($stmt->execute()){
                // Obtener el ID insertado
                $ultimoId = $con->insert_id;
        
                // Cerrar el statement
                $stmt->close();
        
                $stmt = $con->prepare("INSERT INTO PEDIDO_PRODUCTO (pedido_id, producto_id, cantidad, precio, precio_unidad) VALUES (?,?,?,?,?)");
                foreach($productosCarrito as $productoCarrito){
                    $productoId = $productoCarrito['producto']->getId();
                    $cantidad = $productoCarrito['cantidad'];
                    $precioTotal = $productoCarrito['producto']->getPrecio()*$productoCarrito['cantidad'];
                    $precioUnidad = $productoCarrito['producto']->getPrecio();
                    $stmt->bind_param("iiidd",$ultimoId,$productoId,$cantidad,$precioTotal,$precioUnidad);
                    $stmt->execute();
                }

                // Cerrar el statement
                $stmt->close();

                $validacion = true;

            } else {
                // Manejar el error de ejecución
                $validacion = false;
            }

            return $validacion;

        }

        public static function getOferta($oferta_id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT nombre FROM OFERTAS WHERE ID = ?");
            $stmt->bind_param("i", $oferta_id);

            $stmt->execute();

            $resultado = $stmt->get_result();

            echo $resultado;

            return $resultado;

        }

        public static function getPedido($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE ID = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $resultado = $stmt->get_result();
            $pedido = $resultado->fetch_object("Pedido");

            return $pedido;

        }

        public static function getDetalles($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT ID, producto_id, cantidad, precio, precio_unidad FROM PEDIDO_PRODUCTO WHERE pedido_id = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $detalles = [];

            while($row = $resultado->fetch_assoc()) {
                $detalles[] = $row;
            }

            $stmt->close();
            $con->close();

            return $detalles;

        }

        public static function getPedidosOrdenados($usuario){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE cliente_id = ? ORDER BY fecha DESC, ID DESC");
            $stmt->bind_param("i", $usuario);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedidos = [];
            while($pedido = $resultado->fetch_object("Pedido")){
                $pedidos[] = $pedido;
            }

            $stmt->close();
            $con->close();

            return $pedidos;

        }

        /* -- FUNCIONES PARA LA API -- */
        public static function getAllPedidos(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedidos = [];
            while($pedido = $resultado->fetch_assoc()){
                $pedidos[] = $pedido;
            }

            $stmt->close();
            $con->close();

            return $pedidos;

        }

        public static function getProductosPedido($id){

            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM PEDIDO_PRODUCTO WHERE pedido_id = ?");
            $stmt->bind_param("i", $id);

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

        public static function crearPedido($cliente_id, $oferta_id, $direccion, $fecha, $productos){

            include_once "models/OfertaDAO.php";

            // Obtener los datos de los productos (precio y demás)
            $precioTotal = 0;
            foreach($productos as $producto){
                $producto_id = $producto['id'];
                $cantidad = $producto['cantidad'];

                $precioUnitario = ProductoDAO::getPrecioProducto($producto_id);

                $precioProductos = $precioUnitario * $cantidad;

                $precioTotal += $precioProductos;

            }

            $estadoPedido = "pedido";

            $con = DataBase::connect();

            if($oferta_id){

                // Obtener el dato del precio final
                $tipoOferta = OfertaDAO::getTipoOferta($oferta_id);
                if($tipoOferta == "%"){
                    $precioFinal = $precioTotal - ($precioTotal * OfertaDAO::getCantidadOferta($oferta_id) / 100);
                }else if($tipoOferta == "€"){
                    $precioFinal = $precioTotal - ($precioTotal - OfertaDAO::getCantidadOferta($oferta_id));
                }else{
                    $precioFinal = $precioTotal;
                }

                $descuento = $precioTotal - $precioFinal;

                $stmt = $con->prepare("INSERT INTO PEDIDO (cliente_id, oferta_id, descuento, precio_final, estado_pedido, fecha, precio, direccion) VALUES (?,?,?,?,?,?,?,?)");
                $stmt->bind_param("iiddssdi", $cliente_id,$oferta_id,$descuento,$precioFinal,$estadoPedido,$fecha,$precioTotal,$direccion);
            }else{

                $precioFinal = $precioTotal;
                $descuento = 0;

                $stmt = $con->prepare("INSERT INTO PEDIDO (cliente_id, descuento, precio_final, estado_pedido, fecha, precio, direccion) VALUES (?,?,?,?,?,?,?)");
                $stmt->bind_param("iddssdi", $cliente_id,$descuento,$precioFinal,$estadoPedido,$fecha,$precioTotal,$direccion);

            }

            // Ejecutar creación de pedido
            if($stmt->execute()){
                // Obtener el ID insertado
                $ultimoId = $con->insert_id;
        
                // Cerrar el statement
                $stmt->close();
        
                $stmt = $con->prepare("INSERT INTO PEDIDO_PRODUCTO (pedido_id, producto_id, cantidad, precio, precio_unidad) VALUES (?,?,?,?,?)");
                foreach($productos as $producto){
                    $producto_id = $producto['id'];
                    $cantidad = $producto['cantidad'];

                    $precioUnitario = ProductoDAO::getPrecioProducto($producto_id);

                    $precioProductos = $precioUnitario * $cantidad;

                    $stmt->bind_param("iiidd",$ultimoId,$producto_id,$cantidad,$precioProductos,$precioUnitario);
                    $stmt->execute();
                }

                // Cerrar el statement
                $stmt->close();

                $validacion = true;

            } else {
                // Manejar el error de ejecución
                $validacion = false;
            }

            return $validacion;

        }

        public static function obtenerPedidosPorUsuario($usuario_id){
            
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE cliente_id = ?");
            $stmt->bind_param("i",$usuario_id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedidos = [];
            while($pedido = $resultado->fetch_assoc()){
                $pedidos[] = $pedido;
            }

            $stmt->close();
            $con->close();

            return $pedidos;

        }

        public static function obtenerPedidosPorFechas($fecha_ini, $fecha_fin, $orden){

            $con = DataBase::connect();

            if($orden == "ASC"){
                $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE fecha >= ? and fecha <= ? ORDER BY fecha ASC");
            }else{
                $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE fecha >= ? and fecha <= ? ORDER BY fecha DESC");
            }
            $stmt->bind_param("ss",$fecha_ini, $fecha_fin);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedidos = [];
            while($pedido = $resultado->fetch_assoc()){
                $pedidos[] = $pedido;
            }

            $stmt->close();
            $con->close();

            return $pedidos;

        }

        public static function obtenerPedidosPorPrecio($precio_ini, $precio_fin, $orden){

            $con = DataBase::connect();

            if($orden == "ASC"){
                $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE precio_final >= ? and precio_final <= ? ORDER BY precio_final ASC");
            }else{
                $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE precio_final >= ? and precio_final <= ? ORDER BY precio_final DESC");
            }
            
            $stmt->bind_param("ii",$precio_ini, $precio_fin);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedidos = [];
            while($pedido = $resultado->fetch_assoc()){
                $pedidos[] = $pedido;
            }

            $stmt->close();
            $con->close();

            return $pedidos;

        }

        public static function obtenerPedido($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE ID = ?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $pedido = $resultado->fetch_assoc();

            $stmt->close();
            $con->close();

            return $pedido;

        }

        public static function editarPedido($pedido_id, $cliente_id, $oferta_id, $direccion, $fecha, $estado, $productos){

            include_once "models/OfertaDAO.php";

            $con = DataBase::connect();

            // Obtener los datos para el pedido principal
            $precio = 0;
            foreach($productos as $producto){
                $producto_id = $producto['id'];
                $cantidad = $producto['cantidad'];

                $precioUnitario = ProductoDAO::getPrecioProducto($producto_id);
                $precioProductos = $precioUnitario * $cantidad;
                $precio += $precioProductos;
            }

            if($oferta_id){

                // Obtener el dato del precio final
                $tipoOferta = OfertaDAO::getTipoOferta($oferta_id);
                if($tipoOferta == "%"){
                    $precioFinal = $precio - ($precio * OfertaDAO::getCantidadOferta($oferta_id) / 100);
                }else if($tipoOferta == "€"){
                    $precioFinal = $precio - ($precio - OfertaDAO::getCantidadOferta($oferta_id));
                }else{
                    $precioFinal = $precio;
                }

                $descuento = $precio - $precioFinal;

                $stmt = $con->prepare("UPDATE PEDIDO SET cliente_id = ?, oferta_id = ?, descuento = ?, precio_final = ?, estado_pedido = ?, fecha = ?, precio = ?, direccion = ? WHERE ID = ?");
                $stmt->bind_param("iiddssdii", $cliente_id,$oferta_id,$descuento,$precioFinal,$estado,$fecha,$precio,$direccion, $pedido_id);

            }else{

                $precioFinal = $precio;
                $descuento = 0;
                $oferta_id = null;

                //return "cliente: ".$cliente_id." oferta_id: ".$oferta_id." descuento: ".$descuento." precio_final: ".$precioFinal." estado: ".$estado." fecha: ".$fecha." precio: ".$precio." direccion: ".$direccion." pedido_id ".$pedido_id;

                $stmt = $con->prepare("UPDATE PEDIDO SET cliente_id = ?, oferta_id = ?, descuento = ?, precio_final = ?, estado_pedido = ?, fecha = ?, precio = ?, direccion = ? WHERE ID = ?");
                $stmt->bind_param("iiddssdii", $cliente_id, $oferta_id, $descuento, $precioFinal, $estado, $fecha, $precio, $direccion, $pedido_id);

            }

            // Ejecutar el update a la DB
            if($stmt->execute()){
        
                // Cerrar el statement
                $stmt->close();

                // Eliminar todos los productos antiguos de la DB
                $stmt = $con->prepare("DELETE FROM PEDIDO_PRODUCTO WHERE pedido_id = ?");
                $stmt->bind_param("i",$pedido_id);

                if( $stmt->execute() ){

                    $stmt->close();
                
                    $stmt = $con->prepare("INSERT INTO PEDIDO_PRODUCTO (pedido_id, producto_id, cantidad, precio, precio_unidad) VALUES (?,?,?,?,?)");
                    
                    foreach($productos as $producto){
                        $productoId = $producto['id'];
                        $cantidad = $producto['cantidad'];
                        $precioTotal = ProductoDAO::getPrecioProducto( $productoId ) * $producto['cantidad'];
                        $precioUnidad = ProductoDAO::getPrecioProducto( $productoId );
                        $stmt->bind_param("iiidd",$pedido_id,$productoId,$cantidad,$precioTotal,$precioUnidad);
                        $stmt->execute();
                    }
                    
                    // Cerrar el statement
                    $stmt->close();

                    // Return correcto
                    return true;

                }else{
                    return "No se han podido eliminar las filas de la DB";
                }

            } else {
                // Manejar el error de ejecución
                return "Error al subir los datos del UPDATE";
            }

        }

        public static function eliminarPedido($pedido_id){

            $con = DataBase::connect();

            // Eliminar el pedido
            $stmt = $con->prepare("DELETE FROM PEDIDO WHERE ID = ?");
            $stmt->bind_param("i",$pedido_id);

            if( $stmt->execute() ){

                $stmt->close();

                // Eliminar todos los productos del pedido
                $stmt = $con->prepare("DELETE FROM PEDIDO_PRODUCTO WHERE pedido_id = ?");
                $stmt->bind_param("i",$pedido_id);

                if( $stmt->execute() ){
                    return true;
                }else{
                    return "Error al eliminar sus productos";
                }

            }else{
                return "Error al eliminar el pedido";
            }


        }

        /**
         * PANTALLA ADMIN
         */
        public static function obtenerCantidadPedidos(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT count(*) AS cantidad FROM PEDIDO");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $cantidadPedidos = $result['cantidad'];

            $stmt->close();
            $con->close();

            return $cantidadPedidos;
        }

        public static function obtenerPrecioTotalPedidos(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT SUM(precio_final) as precio_total FROM PEDIDO");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $precioTotalPedidos = $result['precio_total'];

            $stmt->close();
            $con->close();

            return $precioTotalPedidos;

        }

        public static function obtenerCantidadDescuentos(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT SUM(descuento) AS totalDescuentos FROM PEDIDO");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $totalDescuentos = $result['totalDescuentos'];

            $stmt->close();
            $con->close();

            return $totalDescuentos;

        }

        public static function obtenerMejorUsuario(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT cliente_id, SUM(precio_final) AS totalGastado FROM PEDIDO GROUP BY cliente_id ORDER BY totalGastado DESC LIMIT 1;");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $mejorUsuario = [
                "mejorUsuario" => $result['cliente_id'],
                "dineroGastado" => $result['totalGastado']
            ];

            $stmt->close();
            $con->close();

            return $mejorUsuario;

        }

    }

?>