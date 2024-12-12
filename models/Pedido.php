<?php

    class Pedido{

        protected $ID;
        protected $cliente_id;
        protected $productos_id;
        protected $oferta_id;
        protected $descuento;
        protected $precio_final;
        protected $estado_pedido;
        protected $fecha;
        protected $precio;

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
        public function getCliente(){
            return $this->cliente_id;
        }
        public function getProductosId(){
            return $this->productos_id;
        }
        public function getOfertaId(){
            return $this->oferta_id;
        }
        public function getDescuento(){
            return $this->descuento;
        }
        public function getPrecioFinal(){
            return $this->precio_final;
        }
        public function getEstadoPedido(){
            return $this->estado_pedido;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getEstado(){
            return $this->estado_pedido;
        }

        /**
         * SETTERS
         */
        public function setId($id){
            $this->ID = $id;
        }
        public function setCliente($cliente){
            $this->cliente_id = $cliente;
        }
        public function setProductosId($productos_id){
            $this->productos_id = $productos_id;
        }
        public function setOfertaId($oferta_id){
            $this->oferta_id = $oferta_id;
        }
        public function setDescuento($descuento){
            $this->descuento = $descuento;
        }
        public function setPrecioFinal($precio_final){
            $this->precio_final = $precio_final;
        }
        public function setEstadoPedido($estado_pedido){
            $this->estado_pedido = $estado_pedido;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function setEstado($estado_pedido){
            $this->estado_pedido = $estado_pedido;
        }


    }

?>