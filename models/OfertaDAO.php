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

    }

?>