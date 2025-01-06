<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Ingrediente.php";

    class IngredienteDAO{

        /**
         * Devuelve todos los ingredientes
         */
        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM INGREDIENTES");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ingredientes = [];
            while($ingrediente = $resultado->fetch_object("Ingrediente")){
                $ingredientes[] = $ingrediente;
            }

            $stmt->close();
            $con->close();

            return $ingredientes;

        }

        /**
         * Crea un nuevo ingrediente
         */
        public static function store($ingrediente){

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO INGREDIENTES (nombre, descripcion, precio_unidad) VALUES (?, ?, ?);");

            $nombre = $ingrediente->getNombre();
            $descripcion = $ingrediente->getDescripcion();
            $precio_unidad = $ingrediente->getPrecioUnidad();
            $stmt->bind_param("ssd",$nombre,$descripcion, $precio_unidad);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        /**
         * Devuelve si existe un ingrediente
         */
        public static function verify($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT EXISTS(SELECT 1 FROM INGREDIENTES WHERE ID = ?) AS existe;");

            $stmt->bind_param("i",$id);
            $stmt->execute();

            $stmt->bind_result($existe);
            $stmt->fetch();

            $stmt->close();
            $con->close();

            if($existe){

                // Devuelve true
                return true;

            }else{
                return false;
            }

        }

        /**
         * Gestionar un ingrediente
         */
        public static function edit($id, $ingrediente){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE INGREDIENTES SET nombre = ?, descripcion = ?, precio_unidad = ? WHERE ID = ?;");

            $nombre = $ingrediente->getNombre();
            $descripcion = $ingrediente->getDescripcion();
            $precio_unidad = $ingrediente->getPrecioUnidad();
            $stmt->bind_param("ssdi", $nombre, $descripcion, $precio_unidad, $id);

            $stmt->execute();

            $stmt->close();
            $con->close();
            

        }

        /**
         * Devuelve los ingredientes por defecto que lleva un producto
         */
        public static function getIngredientesDefault($id){

            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT i.* FROM INGREDIENTES i JOIN PRODUCTO_INGREDIENTE pi ON pi.ingrediente_id = i.id WHERE pi.producto_id = ?;");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $stmt->close();
            $con->close();

            $ingredientes = [];
            while($ingrediente = $resultado->fetch_object("Ingrediente")){
                $ingredientes[] = $ingrediente;
            }

            return $ingredientes;

        }

        /**
         * Devuelve todos los ingredientes
         * @return array
         */
        public static function obtenerAllIngredientes(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM INGREDIENTES");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ingredientes = [];
            while($ingrediente = $resultado->fetch_assoc()){
                $ingredientes[] = $ingrediente;
            }

            $stmt->close();
            $con->close();

            return $ingredientes;

        }

        /**
         * Devuelve todos los ingredientes de un producto
         */
        public static function obtenerSelectedIngredientes($id){
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT * FROM PRODUCTO_INGREDIENTE WHERE producto_id = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ingredientes = [];
            while($ingrediente = $resultado->fetch_assoc()){
                $ingredientes[] = $ingrediente;
            }

            $stmt->close();
            $con->close();

            return $ingredientes;
        }

        /**
         * Creación de un ingrediente
         */
        public static function crearIngrediente($nombre, $descripcion, $precio, $categoria){

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO INGREDIENTES (nombre, descripcion, precio_unidad, categoria) VALUES (?,?,?,?)");
            $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $categoria);

            if( $stmt->execute() ){
                return true;
            }else{
                return false;
            }

        }

        /**
         * Devuelve las categorías de ingredientes existentes
         */
        public static function obtenerCategoriasIngredientes(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT DISTINCT categoria FROM INGREDIENTES");

            if($stmt->execute()){
                $resultado = $stmt->get_result();

                $categorias = [];
                while($categoria = $resultado->fetch_assoc()){
                    $categorias[] = $categoria;
                }

                return $categorias;
            }else{
                return false;
            }
        }

        /**
         * Devuelve los ingredientes de una categoría
         */
        public static function obtenerIngredientes($categoria){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM INGREDIENTES WHERE categoria = ?");
            $stmt->bind_param("s", $categoria);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ingredientes = [];
            while($ingrediente = $resultado->fetch_assoc()){
                $ingredientes[] = $ingrediente;
            }

            $stmt->close();
            $con->close();

            return $ingredientes;

        }

        /**
         * Devuelve el ingrediente pasado por parámetro
         */
        public static function obtenerIngrediente($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM INGREDIENTES WHERE ID = ?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $ingrediente = $resultado->fetch_assoc();

            $stmt->close();
            $con->close();

            return $ingrediente;

        }

        /**
         * Edita los datos del ingrediente pasado por parámetro
         */
        public static function editarIngrediente($id, $nombre, $descripcion, $precio, $categoria){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE INGREDIENTES SET nombre = ?, descripcion = ?, precio_unidad = ?, categoria = ? WHERE ID = ?");
            $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $categoria, $id);

            if( $stmt->execute() ){
                return true;
            }else{
                return false;
            }

        }

        /**
         * Elimina el ingrediente seleccionado
         */
        public static function eliminarIngrediente($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("DELETE FROM INGREDIENTES WHERE ID = ?");
            $stmt->bind_param("i",  $id);

            if( $stmt->execute() ){
                return true;
            }else{
                return false;
            }

        }

        /**
         * PANTALLA ADMIN
         */

        /**
         * Obtener la cantidad de ingredientes
         */
        public static function obtenerCantidadIngredientes(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT COUNT(*) AS cantidadIngredientes FROM INGREDIENTES");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $cantidadIngredientes = $result['cantidadIngredientes'];

            $stmt->close();
            $con->close();

            return $cantidadIngredientes;
        
        }

        /**
         * Obtener el promedio de precio de los ingredientes
         */
        public static function obtenerPromedioPrecioIngredientes(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT ROUND(AVG(precio_unidad), 2) AS promedioPrecio FROM INGREDIENTES");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $promedioPrecio = $result['promedioPrecio'];

            $stmt->close();
            $con->close();

            return $promedioPrecio;

        }

        /**
         * Devuelve el ingrediente más caro
         */
        public static function obtenerIngredienteMasCaro(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT nombre AS ingrediente FROM INGREDIENTES WHERE precio_unidad = (SELECT MAX(precio_unidad) FROM INGREDIENTES)");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $ingrediente = $result['ingrediente'];

            $stmt->close();
            $con->close();

            return $ingrediente;

        }

        /**
         * Devuelve el ingrediente más barato
         */
        public static function obtenerIngredienteMasBarato(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT nombre AS ingrediente FROM INGREDIENTES WHERE precio_unidad = (SELECT MIN(precio_unidad) FROM INGREDIENTES)");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $ingrediente = $result['ingrediente'];

            $stmt->close();
            $con->close();

            return $ingrediente;

        }


    }

?>