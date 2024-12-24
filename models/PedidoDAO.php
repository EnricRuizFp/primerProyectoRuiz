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

        public static function obtenerPedidosPorFechas($fecha_ini, $fecha_fin){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE fecha >= ? and fecha <= ?");
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

        public static function obtenerPedidosPorPrecio($precio_ini, $precio_fin){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM PEDIDO WHERE precio_final >= ? and precio_final <= ?");
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

        public static function editarPedido($cliente_id, $oferta_id, $direccion, $fecha, $productos){


            return true;
        }

    }

?>