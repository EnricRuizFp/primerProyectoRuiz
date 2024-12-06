<?php

    /* -- Inclusión del archivo de configuración de la DB */
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

        public static function crearUsuario($usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $contraseñaIntroducida, $direccionIntroducida, $telefonoIntroducido, $tarjetaIntroducida, $fechaVencimientoIntroducida, $cvvIntroducido){

            // Pasar las fechas a dato tipo fecha
            $fechaRegistro = date("Y-m-d");
            // fecha_vencimiento ya viene en formato fecha


            // Encriptar contraseña y datos bancarios
            $contraseñaEncriptada = password_hash($contraseñaIntroducida, PASSWORD_DEFAULT);
            $tarjetaEncriptada = password_hash($tarjetaIntroducida, PASSWORD_DEFAULT);


            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO USUARIOS (usuario, nombre_completo, email, telefono, direccion, fecha_registro, contraseña, tarjeta_bancaria, fecha_vencimiento, cvv) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssisssssi",$usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $telefonoIntroducido, $direccionIntroducida, $fechaRegistro, $contraseñaEncriptada, $tarjetaEncriptada, $fechaVencimientoIntroducida, $cvvIntroducido);

            $stmt->execute();

            // Verificar consulta
            if($stmt->affected_rows > 0){
                echo "EXITO";
            }else{
                echo "ERROR";
            }

            $stmt->close();
        }

    }

?>