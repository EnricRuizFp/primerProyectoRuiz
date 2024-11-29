<?php

    class Oferta{

        protected $ID;
        protected $nombre;
        protected $descripcion;
        protected $descuento;
        protected $tipo;
        protected $fecha_inicio;
        protected $fecha_fin;

        public function __construct(){

            // Se crea sin nada dentro del constructor porque se creará a partir de los datos
            // que devuelva la creación del objeto OFERTA

        }

        /**
         * GETTERS
         */
        public function getId(){
            return $this->ID;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getDescuento(){
            return $this->descuento;
        }
        public function getTipo(){
            return $this->tipo;
        }
        public function getFechaInicio(){
            return $this->fecha_inicio;
        }
        public function getFechaFin(){
            return $this->fecha_fin;
        }

        public function setId($id){
            $this->ID = $id;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function setDescuento($descuento){
            $this->descuento = $descuento;
        }
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        public function setFechaInicio($fecha_inicio){
            $this->fecha_inicio = $fecha_inicio;
        }
        public function setFechaFin($fecha_fin){
            $this->fecha_fin = $fecha_fin;
        }

    }

?>