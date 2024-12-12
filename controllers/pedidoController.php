<?php

    class pedidoController{

        public static function index(){

            echo "sin función";

        }

        public static function generarPedido($usuarioActual,$oferta_id,$precioProductos,$descuento,$precioFinal,$estadoPedido,$fechaPedido, $productosCarrito){

            $validacion = PedidoDAO::generarPedido($usuarioActual,$oferta_id,$precioProductos,$descuento,$precioFinal,$estadoPedido,$fechaPedido, $productosCarrito);

            return $validacion;

        }

        public static function success(){

            $validacion = true;
            include_once "views/pedidoRealizado.php";

        }

        public static function error(){

            $validacion = false;
            include_once "views/pedidoRealizado.php";
            
        }

    }

?>