<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/ProductoPedido.php";

    class ProductoPedidoDAO{

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

    }

?>