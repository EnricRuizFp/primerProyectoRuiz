<?php

    class Usuario{

        protected $ID;
        protected $nombre;
        protected $apellidos;
        protected $fecha_nacimiento;
        protected $email;
        protected $telefono;
        protected $direccion;
        protected $fecha_registro;

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
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function getFechaNacimiento(){
            return $this->fecha_nacimiento;
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

        /**
         * SETTERS
         */
        public function setId($id){
            $this->ID = $id;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        public function setFechaNacimiento($fecha_nacimiento){
            $this->fecha_nacimiento = $fecha_nacimiento;
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

    }

?>