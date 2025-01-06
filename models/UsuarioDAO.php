<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Usuario.php";

    class UsuarioDAO{

        /**
         * Devuelve todos los usuarios
         */
        public static function getAll(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM USUARIOS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $usuarios = [];
            while($usuario = $resultado->fetch_object("Usuario")){
                $usuarios[] = $usuario;
            }

            $stmt->close();
            $con->close();

            return $usuarios;
        }
        
        /**
         * Crear nuevo usuario
         */
        public static function crearUsuario($usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $contraseñaIntroducida, $telefonoIntroducido){

            // Pasar las fechas a dato tipo fecha
            $fechaRegistro = date("Y-m-d");
            // fecha_vencimiento ya viene en formato fecha


            // Encriptar contraseña y datos bancarios
            $contraseñaEncriptada = password_hash($contraseñaIntroducida, PASSWORD_DEFAULT);


            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO USUARIOS (usuario, nombre_completo, email, telefono, fecha_registro, contraseña) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("sssiss",$usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $telefonoIntroducido, $fechaRegistro, $contraseñaEncriptada);

            $stmt->execute();

            // Verificar consulta
            if($stmt->affected_rows > 0){
                echo "EXITO";
            }else{
                echo "ERROR";
            }

            $stmt->close();
        }

        /**
         * Devuelve el ID del usuario actual
         */
        public static function getIdActual($usuario){

            // Obtener el ID del usuario por el nombre
            $con = DataBase::connect();

            $stmt = $con->prepare("SELECT ID FROM USUARIOS WHERE usuario = ?");
            $stmt->bind_param("s",$usuario);

            $stmt->execute();

            $resultado = $stmt->get_result();
            $id = $resultado->fetch_assoc();

            return $id['ID'];

        }

        /**
         * Devuelve los datos del usuario especificado
         */
        public static function getUsuario($id){

            $con = DataBase::connect();
            $stmt = $con->prepare('SELECT * FROM USUARIOS WHERE ID = ?');
            $stmt->bind_param('i',$id);

            $stmt->execute();

            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_object("Usuario");

            return $usuario;
        }

        /**
         * Edita los datos principales del usuario
         */
        public static function editarDatos($usuario, $nombreUsuario, $nombreCompleto, $correo, $telefono){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE USUARIOS SET usuario = ?, nombre_completo = ?, email = ?, telefono = ? WHERE ID = ?");
            $stmt->bind_param("sssis",$nombreUsuario, $nombreCompleto, $correo, $telefono, $usuario);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        /**
         * Edita los datos bancarios del usuario
         */
        public static function editarDatosBancarios($usuario, $tarjetaBancaria, $fechaCaducidad, $cvv){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE USUARIOS SET tarjeta_bancaria = ?, fecha_vencimiento = ?, cvv = ? WHERE ID = ?");
            $stmt->bind_param("ssii", $tarjetaBancaria, $fechaCaducidad, $cvv, $usuario);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        /**
         * Valida que los datos bancarios sean correctos
         */
        public static function validacionDatosBancarios($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT tarjeta_bancaria, fecha_vencimiento, cvv FROM USUARIOS WHERE ID = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $resultado = $stmt->get_result()->fetch_assoc();

            if(!empty($resultado['tarjeta_bancaria']) && !empty($resultado['fecha_vencimiento']) && !empty($resultado['cvv'])){
                return true;
            }else{
                return false;
            }

        }

        /**
         * Elimina el usuario especificado
         */
        public static function eliminarUsuario($id){
        
            $con = DataBase::connect();
            $stmt = $con->prepare("DELETE FROM USUARIOS WHERE ID = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        /**
         * Cambiar contraseña para un usuario
         */
        public static function cambiarContraseña($id, $contraseña){

            $encryptedPassword = password_hash($contraseña, PASSWORD_DEFAULT);

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE USUARIOS SET contraseña = ? WHERE ID = ?");
            $stmt->bind_param("si",$encryptedPassword, $id);

            $stmt->execute();

            // Verificar consulta
            if($stmt->affected_rows > 0){
                return true;
            }else{
                return false;
            }

        }

        /* PANTALLA ADMIN */

        /**
         * Devuelve todos los usuarios
         */
        public static function getUsuarios(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM USUARIOS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $usuarios = [];
            while($usuario = $resultado->fetch_assoc()){
                $usuarios[] = $usuario;
            }

            $stmt->close();
            $con->close();

            return $usuarios;
        }

        /**
         * Obtiene los datos del usuario seleccionado
         */
        public static function obtenerUsuario($id){

            $con = DataBase::connect();
            $stmt = $con->prepare('SELECT * FROM USUARIOS WHERE ID = ?');
            $stmt->bind_param('i',$id);

            $stmt->execute();

            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();

            $stmt->close();
            $con->close();

            return $usuario;

        }

        /**
         * Edita los datos de un usuario
         */
        public static function editarUsuario($id, $usuario, $nombre_completo, $email, $telefono, $tarjeta_bancaria, $fecha_vencimiento, $cvv){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE USUARIOS SET usuario = ?, nombre_completo = ?, email = ?, telefono = ?, tarjeta_bancaria = ?, fecha_vencimiento = ?, cvv = ? WHERE ID = ?");
            $stmt->bind_param("sssissii",$usuario, $nombre_completo, $email, $telefono, $tarjeta_bancaria, $fecha_vencimiento, $cvv, $id);

            $stmt->execute();

            $stmt->close();
            $con->close();

            return true;

        }

        /**
         * Crea un nuevo usuario des del apartado de admin
         */
        public static function crearUsuarioAdmin($usuario, $nombre_completo, $email, $telefono, $contraseña, $tarjeta_bancaria, $fecha_vencimiento, $cvv){

            $encrtyptedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
            $fecha_registro = date("Y-m-d");

            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO USUARIOS (usuario, nombre_completo, email, telefono, fecha_registro, contraseña, tarjeta_bancaria, fecha_vencimiento, cvv) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssissssi",$usuario, $nombre_completo, $email, $telefono, $fecha_registro, $encrtyptedPassword, $tarjeta_bancaria, $fecha_vencimiento, $cvv);

            $stmt->execute();

            // Verificar consulta
            if($stmt->affected_rows > 0){
                return true;
            }else{
                return false;
            }

        }

        /**
         * Valida el usuario (true si existe)
         */
        public static function validacionUsuario($id){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT count(*) FROM USUARIOS WHERE ID = ?");
            $stmt->bind_param("i", $id);

            $stmt->execute();

            $stmt->bind_result($count);
            $stmt->fetch();

            return $count > 0;

        }

        /**
         * Devuelve la cantidad de usuarios
         */
        public static function obtenerCantidadUsuarios(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT COUNT(*) AS cantidadUsuarios FROM USUARIOS");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $cantidadUsuarios = $result['cantidadUsuarios'];

            $stmt->close();
            $con->close();

            return $cantidadUsuarios;

        }

        /**
         * Devuelve la cantidad de usuarios sin datos bancarios validos
         */
        public static function obtenerUsuariosSinTarjeta(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT COUNT(*) AS usuariosSinTarjeta FROM USUARIOS WHERE tarjeta_bancaria IS NULL");
        
            $stmt->execute();
            $resultado = $stmt->get_result();
        
            $result = $resultado->fetch_assoc();
            $usuariosSinTarjeta = $result['usuariosSinTarjeta'];
        
            $stmt->close();
            $con->close();
        
            return $usuariosSinTarjeta;
        }

        /**
         * Devuelve la cantidad de usuarios que tienen el perfil completado
         */
        public static function obtenerUsuariosPerfilCompleto(){

            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT COUNT(*) AS usuariosCompletos FROM USUARIOS WHERE tarjeta_bancaria IS NOT NULL AND telefono IS NOT NULL");

            $stmt->execute();
            $resultado = $stmt->get_result();

            $result = $resultado->fetch_assoc();
            $usuariosCompletos = $result['usuariosCompletos'];

            $stmt->close();
            $con->close();

            return $usuariosCompletos;
        }

    }

?>