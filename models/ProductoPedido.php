<?php

    /* ----- PARTE DEL CÓDIGO TOTALMENTE EN DESUSO ----- */
    /* -- No se ha retirado por posibles funciones futuras -- */

    class ProductoPedido{

        protected $ID;
        protected $producto;
        protected $producto_id;
        protected $cantidad;
        protected $precio;
        protected $precio_unidad;

        public function __construct(){
            // Se crea sin nada dentro del constructor porque se creará a partir de los datos
            // que devuelva la creación del objeto Pedido
        }

        /**
         * GETTERS
         */
        public function getId(){
            return $this->ID;
        }
        public function getProducto(){
            return $this->producto;
        }
        public function getProductoId(){
            return $this->producto_id;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function getPrecioUnidad(){
            return $this->precio_unidad;
        }

        /**
         * SETTERS
         */
        public function setId($id){
            $this->ID = $id;
        }
        public function setProducto($producto){
            $this->producto = $producto;
        }
        public function setProductoId($producto_id){
            $this->producto_id = $producto_id;
        }
        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function setPrecioUnidad($precio_unidad){
            $this->precio_unidad = $precio_unidad;
        }

    }

?>