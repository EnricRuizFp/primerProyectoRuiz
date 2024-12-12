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

        public static function generarPedido($usuarioActual,$oferta_id,$precioProductos,$descuento,$precioFinal,$estadoPedido,$fechaPedido, $productosCarrito){

            $con = DataBase::connect();

            $stmt = $con->prepare("INSERT INTO PEDIDO (cliente_id, oferta_id, precio, descuento, precio_final, estado_pedido, fecha) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("iidddss", $usuarioActual,$oferta_id,$precioProductos,$descuento,$precioFinal,$estadoPedido,$fechaPedido);

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

    }

?>