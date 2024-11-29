<?php

    class Producto{

        protected $ID;
        protected $nombre;
        protected $producto_ingrediente_id;
        protected $descripcion;
        protected $categoria;
        protected $precio;
        protected $imagen;

        public function __construct(){

            // Se crea sin nada dentro del constructor porque se creará a partir de los datos
            // que devuelva la creación del objeto PRODUCTO

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
        public function getProductoIngredienteId(){
            return $this->producto_ingrediente_id;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getCategoria(){
            return $this->categoria;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function getImagen(){
            return $this->imagen;
        }

        /**
         * SETTERS
         */
        public function setId($id){
            $this->ID = $id;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setProductoIngredienteId($producto_ingrediente_id){
            $this->producto_ingrediente_id = $producto_ingrediente_id;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        /**
         * GET INGREDIENTES POR DEFECTO
         */
        public function getIngredientesDefault($id){
            
            $ingredientes = IngredienteDAO::getIngredientesDefault($id);

        }

    }

?>