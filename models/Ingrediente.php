<?php

    class Ingrediente{

        protected $ID;
        protected $nombre;
        protected $descripcion;
        protected $precio_unidad;

        public function __construct(){

            // Se crea sin nada dentro del constructor porque se creará a partir de los datos
            // que devuelva la creación del objeto INGREDIENTE

        }

        /**
         *  GETTERS
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
        public function getPrecioUnidad(){
            return $this->precio_unidad;
        }

        /**
         *  SETTERS
         */
        public function setId($id){
            $this->ID = $id;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function setPrecioUnidad($precio_unidad){
            $this->precio_unidad = $precio_unidad;
        }

    }

?>