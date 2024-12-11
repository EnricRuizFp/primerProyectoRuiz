<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Direccion.php";

    class DireccionDAO{

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

        public static function añadirDireccion($usuario, $codigoPostal, $ciudad, $calle) {

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO DIRECCIONES (usuario_id, codigo_postal, ciudad, calle) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $usuario, $codigoPostal, $ciudad, $calle);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        public static function eliminarDireccion($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("DELETE FROM DIRECCIONES WHERE ID = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

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