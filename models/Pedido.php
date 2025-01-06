<?php

    class Pedido{

        protected $ID;
        protected $cliente_id;
        protected $oferta_id;
        protected $descuento;
        protected $precio_final;
        protected $estado_pedido;
        protected $fecha;
        protected $precio;
        protected $direccion;

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
        public function getOfertaId(){
            return $this->oferta_id;
        }
        public function getDescuento(){
            return $this->descuento;
        }
        public function getPrecioFinal(){
            return $this->precio_final;
        }
        public function getEstado(){
            return $this->estado_pedido;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function getDireccion(){
            return $this->direccion;
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
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        /**
         * Devuelve los datos de la oferta seleccionada dentro de un pedido.
         */
        public function getOferta($oferta_id){
            
            $oferta = PedidoDAO::getOferta($oferta_id);

            return $oferta;

        }

    }

?>