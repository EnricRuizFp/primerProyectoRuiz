<?php

    class Log{

        protected $ID;
        protected $accion;
        protected $modificado;
        protected $tabla;
        protected $fecha;

        public function __construct(){

        }

        /**
         * GETTERS
         */
        public function getID(){
            return $this->ID;
        }
        public function getAccion(){
            return $this->accion;
        }
        public function getModificado(){
            return $this->modificado;
        }
        public function getTabla(){
            return $this->tabla;
        }
        public function getFecha(){
            return $this->fecha;
        }

        /**
         * SETTERS
         */
        public function setId($id){
            $this->ID = $id;
        }
        public function setAccion($accion){
            $this->accion = $accion;
        }
        public function setModificado($modificado){
            $this->modificado = $modificado;
        }
        public function setTabla($tabla){
            $this->tabla = $tabla;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

    }

?>