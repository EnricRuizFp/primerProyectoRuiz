<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Log.php";

    class LogDAO{

        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM LOGS_DB");

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

        public static function guardarLogs($logs){

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO LOGS_DB (accion, modificado, tabla, fecha) VALUES (?,?,?,?)");

            foreach($logs as $log){

                $accion = $log["accion"] ?? null;
                $modificado = $log["modificado"] ?? null;
                $tabla = $log["table"] ?? null;
                $fecha = $log["fecha"] ?? null;

                if($accion && $tabla && $fecha){

                    $stmt->bind_param("siss",$accion,$modificado,$tabla,$fecha);
                    $stmt->execute();
                
                }else{

                    return "error, los datos proporcionados no son correctos";

                }
            }

            $stmt->close();
            $con->close();

            return true;


        }
    }

?>