<?php

    /* -- Inclusión del archivo de configuración de la DB */
    include_once "config/dataBase.php";
    include_once "models/Ingrediente.php";

    class IngredienteDAO{

        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM INGREDIENTES");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ingredientes = [];
            while($ingrediente = $resultado->fetch_object("Ingrediente")){
                $ingredientes[] = $ingrediente;
            }

            $stmt->close();
            $con->close();

            return $ingredientes;

        }

        public static function store($ingrediente){

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO INGREDIENTES (nombre, descripcion, precio_unidad) VALUES (?, ?, ?);");

            $nombre = $ingrediente->getNombre();
            $descripcion = $ingrediente->getDescripcion();
            $precio_unidad = $ingrediente->getPrecioUnidad();
            $stmt->bind_param("ssd",$nombre,$descripcion, $precio_unidad);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        public static function verify($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT EXISTS(SELECT 1 FROM INGREDIENTES WHERE ID = ?) AS existe;");

            $stmt->bind_param("i",$id);
            $stmt->execute();

            $stmt->bind_result($existe);
            $stmt->fetch();

            $stmt->close();
            $con->close();

            if($existe){

                // Devuelve true
                return true;

            }else{
                return false;
            }

        }

        public static function edit($id, $ingrediente){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE INGREDIENTES SET nombre = ?, descripcion = ?, precio_unidad = ? WHERE ID = ?;");

            $nombre = $ingrediente->getNombre();
            $descripcion = $ingrediente->getDescripcion();
            $precio_unidad = $ingrediente->getPrecioUnidad();
            $stmt->bind_param("ssdi", $nombre, $descripcion, $precio_unidad, $id);

            $stmt->execute();

            $stmt->close();
            $con->close();
            

        }

    }

?>