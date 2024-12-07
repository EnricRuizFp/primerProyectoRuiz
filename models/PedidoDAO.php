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

    }

?>