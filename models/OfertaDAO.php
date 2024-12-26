<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Oferta.php";

    class OfertaDAO{

        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ofertas = [];
            while($oferta = $resultado->fetch_object("Oferta")){
                $ofertas[] = $oferta;
            }
            $stmt->close();
            $con->close();

            return $ofertas;

        }

        public static function getOfertasActuales(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS WHERE fecha_inicio < NOW() and fecha_fin > NOW()");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ofertasActuales = [];
            while($oferta = $resultado->fetch_object("Oferta")){
                $ofertasActuales[] = $oferta;
            }

            $stmt->close();
            $con->close();

            return $ofertasActuales;

        }

        public static function getTipoOferta($oferta){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS WHERE ID = ?");
            $stmt->bind_param("i",$oferta);

            $stmt->execute();
            $resultado = $stmt->get_result();

            if( $resultado->num_rows > 0){
                $fila = $resultado->fetch_assoc();
                $tipo = $fila['tipo'];

                //Obtener el valor de tipo
                if(strpos($tipo, "%") !== false){
                    return "%";
                }else if(strpos($tipo, "€") !== false){
                    return "€";
                }else{
                    return null;
                }
            }else{
                return null;
            }


        }

        public static function getCantidadOferta($oferta){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS WHERE ID = ?");
            $stmt->bind_param("i",$oferta);

            $stmt->execute();
            $resultado = $stmt->get_result();

            if( $resultado->num_rows > 0){
                $fila = $resultado->fetch_assoc();
                $tipo = $fila['descuento'];

                //Obtener el valor del descuento
                return $tipo;
            }else{
                return null;
            }

        }

        public static function getOfertaId($oferta){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS WHERE nombre = ?");
            $stmt->bind_param("s",$oferta);

            $stmt->execute();
            $resultado = $stmt->get_result();

            if( $resultado->num_rows > 0){
                $fila = $resultado->fetch_assoc();
                $id = $fila['ID'];

                //Obtener el valor del descuento
                return $id;
            }else{
                return null;
            }

        }

        /**
         * FUNCIONES PARA LA API
         */
        public static function obtenerAllOfertas(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ofertas = [];
            while($oferta = $resultado->fetch_assoc()){
                $ofertas[] = $oferta;
            }

            $stmt->close();
            $con->close();

            return $ofertas;
        }

        public static function crearOferta($nombre, $descripcion, $descuento, $tipo, $fecha_inicio, $fecha_fin){

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO OFERTAS (nombre, descripcion, descuento, tipo, fecha_inicio, fecha_fin) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssisss", $nombre, $descripcion, $descuento, $tipo, $fecha_inicio, $fecha_fin);

            if( $stmt->execute() ){
                return true;
            }else{
                return false;
            }

        }

        public static function obtenerOferta($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS WHERE ID = ?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $oferta = $resultado->fetch_assoc();

            $stmt->close();
            $con->close();

            return $oferta;

        }

        public static function editarOferta($id, $nombre, $descripcion, $descuento, $tipo, $fecha_inicio, $fecha_fin){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE OFERTAS SET nombre = ?, descripcion = ?, descuento = ?, tipo = ?, fecha_inicio = ?, fecha_fin = ? WHERE ID = ?");
            $stmt->bind_param("ssisssi", $nombre, $descripcion, $descuento, $tipo, $fecha_inicio, $fecha_fin, $id);

            if( $stmt->execute() ){
                return true;
            }else{
                return false;
            }

        }

        public static function obtenerTiposOfertas(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT DISTINCT tipo FROM OFERTAS");

            if($stmt->execute()){
                $resultado = $stmt->get_result();

                $tipos = [];
                while($tipo = $resultado->fetch_assoc()){
                    $tipos[] = $tipo;
                }

                return $tipos;
            }else{
                return false;
            }

        }

        public static function obtenerOfertas($tipo){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM OFERTAS WHERE tipo = ?");
            $stmt->bind_param("s", $tipo);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ofertas = [];
            while($oferta = $resultado->fetch_assoc()){
                $ofertas[] = $oferta;
            }

            $stmt->close();
            $con->close();

            return $ofertas;

        }

        public static function eliminarOferta($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("DELETE FROM OFERTAS WHERE ID = ?");
            $stmt->bind_param("i",  $id);

            if( $stmt->execute() ){
                return true;
            }else{
                return false;
            }
        }

    }

?>