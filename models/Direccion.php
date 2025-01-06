<?php

    class Direccion{

        protected $ID;
        protected $usuario_id;
        protected $calle;
        protected $codigo_postal;
        protected $ciudad;

        public function __construct(){
            // Se crea sin nada dentro del constructor porque se creará a partir de los datos
            // que devuelva la creación del objeto DIRECCION
        }

        /**
         * GETTERS
         */
        public function getId(){
            return $this->ID;
        }
        public function getUsuarioId(){
            return $this->usuario_id;
        }
        public function getCalle(){
            return $this->calle;
        }
        public function getCodigoPostal(){
            return $this->codigo_postal;
        }
        public function getCiudad(){
            return $this->ciudad;
        }

        /**
         * SETTERS
         */
        public function setId($id){
            $this->ID = $id;
        }
        public function setUsuarioId($usuario_id){
            $this->usuario_id = $usuario_id;
        }
        public function setCalle($calle){
            $this->calle = $calle;
        }
        public function setCodigoPostal($codigo_postal){
            $this->codigo_postal = $codigo_postal;
        }
        public function setCiudad($ciudad){
            $this->ciudad = $ciudad;
        }

        /**
         * Devuelve todas las direcciones de un usuario
         */
        public function getDirecciones($id){

            $direcciones = DireccionDAO::getDirecciones($id);

            return $direcciones;
        }

    }

?>