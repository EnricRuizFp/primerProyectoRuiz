<?php

    /* -- Inclusión del archivo de configuración de la DB -- */
    include_once "config/dataBase.php";
    include_once "models/Usuario.php";

    class UsuarioDAO{

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

        public static function crearUsuario($usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $contraseñaIntroducida, $telefonoIntroducido, $tarjetaIntroducida, $fechaVencimientoIntroducida, $cvvIntroducido){

            // Pasar las fechas a dato tipo fecha
            $fechaRegistro = date("Y-m-d");
            // fecha_vencimiento ya viene en formato fecha


            // Encriptar contraseña y datos bancarios
            $contraseñaEncriptada = password_hash($contraseñaIntroducida, PASSWORD_DEFAULT);


            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO USUARIOS (usuario, nombre_completo, email, telefono, fecha_registro, contraseña, tarjeta_bancaria, fecha_vencimiento, cvv) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssisssssi",$usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $telefonoIntroducido, $fechaRegistro, $contraseñaEncriptada, $tarjetaIntroducida, $fechaVencimientoIntroducida, $cvvIntroducido);

            $stmt->execute();

            // Verificar consulta
            if($stmt->affected_rows > 0){
                echo "EXITO";
            }else{
                echo "ERROR";
            }

            $stmt->close();
        }

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

        public static function getUsuario($id){

            $con = DataBase::connect();
            $stmt = $con->prepare('SELECT * FROM USUARIOS WHERE ID = ?');
            $stmt->bind_param('i',$id);

            $stmt->execute();

            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_object("Usuario");

            return $usuario;
        }

        public static function editarDatos($usuario, $nombreUsuario, $nombreCompleto, $correo, $telefono){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE USUARIOS SET usuario = ?, nombre_completo = ?, email = ?, telefono = ? WHERE ID = ?");
            $stmt->bind_param("sssis",$nombreUsuario, $nombreCompleto, $correo, $telefono, $usuario);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }

        public static function editarDatosBancarios($usuario, $tarjetaBancaria, $fechaCaducidad, $cvv){

            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE USUARIOS SET tarjeta_bancaria = ?, fecha_vencimiento = ?, cvv = ? WHERE ID = ?");
            $stmt->bind_param("ssii", $tarjetaBancaria, $fechaCaducidad, $cvv, $usuario);

            $stmt->execute();

            $stmt->close();
            $con->close();

        }
    }

?>