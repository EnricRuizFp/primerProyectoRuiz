<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Log.php";

    class LogDAO{

        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM LOGS_DB ORDER BY fecha DESC");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $logs = [];
            while($log = $resultado->fetch_assoc()){
                $logs[] = $log;
            }

            $stmt->close();
            $con->close();

            return $logs;

        }

        public static function crearLog($accion, $modificado, $tabla, $fecha){

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO LOGS_DB (accion, modificado, tabla, fecha) VALUES (?,?,?,?)");
            $stmt->bind_param("siss",$accion,$modificado,$tabla,$fecha);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        }
    }

?>