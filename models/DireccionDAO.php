<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Direccion.php";

    class DireccionDAO{

        /**
         * Devuelve todas las direcciones
         */
        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM DIRECCIONES");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $direcciones = [];
            while($direccion = $resultado->fetch_object("Direccion")){
                $direcciones[] = $direccion;
            }

            $stmt->close();
            $con->close();

            return $direcciones;

        }

        /**
         * Devuelve todas las direcciones de un usuario
         */
        public static function getDirecciones($usuario){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM DIRECCIONES WHERE usuario_id = ?");
            $stmt->bind_param("i", $usuario);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $direcciones = [];
            while($direccion = $resultado->fetch_object("Direccion")){
                $direcciones[] = $direccion;
            }

            $stmt->close();
            $con->close();

            return $direcciones;
        }

        /**
         * Añade una dirección
         */
        public static function añadirDireccion($usuario, $codigoPostal, $ciudad, $calle) {

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO DIRECCIONES (usuario_id, codigo_postal, ciudad, calle) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $usuario, $codigoPostal, $ciudad, $calle);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        /**
         * Elimina la dirección pasada por parámetro
         */
        public static function eliminarDireccion($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("DELETE FROM DIRECCIONES WHERE ID = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        /**
         * Devuelve la cantidad de direcciones para un usuario
         */
        public static function getCantidadDirecciones($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT count(*) FROM DIRECCIONES WHERE usuario_id = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $stmt->bind_result($cantidadDirecciones);
            $stmt->fetch();

            $stmt->close();
            $con->close();

            return $cantidadDirecciones;
        }

        /**
         * Obtiene los datos de una dirección
         */
        public static function getDireccion($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM DIRECCIONES WHERE ID = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $direccion = $stmt->get_result()->fetch_object("Direccion");

            $stmt->close();
            $con->close();

            return $direccion;
        }

    }
?>