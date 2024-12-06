<?php

    include_once "config/parameters.php";
    include_once "models/UsuarioDAO.php";

    class usuarioController{

        public static function index(){

            echo "PAGINA MI CUENTA";

        }

        public static function login(){

            include_once "views/login.php";

        }

        public static function register(){

            include_once "views/register.php";

        }

        public static function logout(){

            echo "FUNCION LOGOUT";

        }

        
        public static function tryLogin(){

            //Obtener usuario / contraseña / usuarios de DB
            $usuarioIntroducido = $_POST['usuario'];
            $contraseñaIntroducida = $_POST['contraseña'];
            $usuarios = UsuarioDAO::getAll();

            $userFound = false;
            $userId = null;

            // Ver si usuario existe
            foreach($usuarios as $usuario){

                if(strpos($usuarioIntroducido, '@') !== false){

                    // Buscar por email
                    if($usuarioIntroducido == $usuario->getEmail()){
                        echo "EMAIL ENCONTRADO";
                        $userFound = true;
                        $userId = $usuario->getId();
                        break;
                    }
                    
                }else{
    
                    // Buscar por usuario
                    if($usuarioIntroducido == $usuario->getNombre()){
                        echo "USUARIO ENCONTRADO";
                        $userFound = true;
                        $userId = $usuario->getId();
                        break;
                    }
    
                }
                
            }

            // Verificar si el usuario se ha encontrado
            if(!$userFound){
                echo "EL USUARIO NO SE HA ENCONTRADO";
            }

            
        }

        public static function tryRegister() {
            session_start();  // Iniciar sesión
        
            // Obtener datos del formulario
            $usuarioIntroducido = $_POST['usuario'];
            $nombreCompletoIntroducido = $_POST['nombreCompleto'];
            $correoIntroducido = $_POST['correo'];
            $contraseñaIntroducida = $_POST['contraseña'];
            $repetirContraseñaIntroducida = $_POST['repetirContraseña'];
            $direccionIntroducida = $_POST['direccion'];
            $telefonoIntroducido = $_POST['telefono'];
            $tarjetaIntroducida = $_POST['numeroTarjeta'];
            $fechaVencimientoIntroducida = $_POST['fechaCaducidad'];
            $cvvIntroducido = $_POST['cvv'];

            // Verificar si las contraseñas coinciden
            if($contraseñaIntroducida != $repetirContraseñaIntroducida){
                $_SESSION['resultadoRegister'] = "invalidPasswords";
                session_write_close();
                header("Location: ?controller=usuario&action=register");
                exit();
            }else if($fechaVencimientoIntroducida < date("Y-m-d")){
                $_SESSION['resultadoRegister'] = "invalidCardDate";
                session_write_close();
                header("Location: ?controller=usuario&action=register");
                exit();
            }
        
            // Obtener los usuarios de la base de datos
            $usuarios = UsuarioDAO::getAll();
        
            // Verificar si el usuario existe
            $userFound = false;
            foreach ($usuarios as $usuario) {
                if ($usuario->getNombre() == $usuarioIntroducido || $usuario->getEmail() == $correoIntroducido) {
                    $userFound = true;
                    $_SESSION['resultadoRegister'] = "userExists";  // Asignar variable de sesión
                    break;
                }
            }
        
            if (!$userFound) {

                UsuarioDAO::crearUsuario($usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $contraseñaIntroducida, $direccionIntroducida, $telefonoIntroducido, $tarjetaIntroducida, $fechaVencimientoIntroducida, $cvvIntroducido);

                $_SESSION['resultadoRegister'] = "userCreated";  // Si no se encuentra, asignar otro valor
            }
        
            session_write_close();  // Asegurar que la sesión se guarda correctamente
            header("Location: ?controller=usuario&action=register");  // Redirigir
            exit();  // Detener la ejecución del script después de la redirección
        }

    }

?>