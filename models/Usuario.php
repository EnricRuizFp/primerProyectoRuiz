<?php

    class Usuario{

        protected $ID;
        protected $usuario;
        protected $nombre_completo;
        protected $email;
        protected $telefono;
        protected $direccion;
        protected $fecha_registro;
        protected $contraseña;
        protected $tarjeta_bancaria;
        protected $fecha_vencimiento;
        protected $cvv;

        public function __construct(){

            // Se crea sin nada dentro del constructor porque se creará a partir de los datos
            // que devuelva la creación del objeto USUARIO

        }

        /**
         * GETTERS
         */
        public function getId(){
            return $this->ID;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function getNombreCompleto(){
            return $this->nombre_completo;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getFechaRegistro(){
            return $this->fecha_registro;
        }
        public function getContraseña(){
            return $this->contraseña;
        }
        public function getTarjetaBancaria(){
            return $this->tarjeta_bancaria;
        }
        public function getFechaVencimiento(){
            return $this->fecha_vencimiento;
        }
        public function getCvv(){
            return $this->cvv;
        }

        /**
         * SETTERS
         */
        public function setId($ID){
            $this->ID = $ID;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function setNombreCompleto($nombre_completo){
            $this->nombre_completo = $nombre_completo;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function setFechaRegistro($fecha_registro){
            $this->fecha_registro = $fecha_registro;
        }
        public function setContraseña($contraseña){
            $this->contraseña = $contraseña;
        }
        public function setTarjetaBancaria($tarjeta_bancaria){
            $this->tarjeta_bancaria = $tarjeta_bancaria;
        }
        public function setFechaVencimiento($fecha_vencimiento){
            $this->fecha_vencimiento = $fecha_vencimiento;
        }
        public function setCvv($cvv){
            $this->cvv = $cvv;
        }

        /**
         * OTHERS
         */
        public function getNombre(){
            $nombre = substr($this->nombre_completo, 0, strpos($this->nombre_completo," "));
            return $nombre;
        }

    }

?>