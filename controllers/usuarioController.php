<?php

    include_once "config/parameters.php";
    include_once "models/UsuarioDAO.php";
    include_once "models/PedidoDAO.php";
    include_once "models/DireccionDAO.php";
    include_once "models/ProductoPedidoDAO.php";

    class usuarioController{

        public static function index(){

            session_start();
            $usuario = UsuarioDAO::getUsuario($_SESSION['usuarioActual']);
            $direcciones = DireccionDAO::getDirecciones($_SESSION['usuarioActual']);
            $pedidos = PedidoDAO::getPedidosOrdenados($usuario->getId());

            $isAdmin = $usuario->getUsuario() == "admin";

            session_write_close();
            include_once "views/miCuenta.php";

        }

        public static function login(){

            include_once "views/login.php";

        }

        public static function register(){

            include_once "views/register.php";

        }

        public static function logout(){

            session_start();

            unset($_SESSION['usuarioActual']);
            unset($_SESSION['resultadoLogin']);

            session_write_close();
            header("Location: ?controller=general");
            exit();

        }

        
        public static function tryLogin(){

            session_start();

            //Obtener usuario / contraseña / usuarios de DB
            $usuarioIntroducido = $_POST['usuario'];
            $contraseñaIntroducida = $_POST['contraseña'];
            $usuarios = UsuarioDAO::getAll();

            // Ver si el usuario existe
            $userFound = false;
            $passwordCorrect = false;
            foreach ($usuarios as $usuario) {
                if ($usuario->getUsuario() == $usuarioIntroducido || $usuario->getEmail() == $usuarioIntroducido) {
                    $userFound = true;
                    
                    if(password_verify($contraseñaIntroducida, $usuario->getContraseña())){
                        $passwordCorrect = true;

                        // Establecer el usuario actual en sesión
                        $_SESSION['usuarioActual'] = UsuarioDAO::getIdActual($usuarioIntroducido);

                        break;
                    }

                }
            }

            if($userFound && $passwordCorrect){
                $_SESSION['resultadoLogin'] = "userCorrect";
            }else if($userFound){
                $_SESSION['resultadoLogin'] = "wrongPassword";
            }else{
                $_SESSION['resultadoLogin'] = "wrongUser";
            }

            session_write_close();
            header("Location: ?controller=usuario&action=login");
            
        }

        public static function tryRegister() {
            session_start();  // Iniciar sesión
        
            // Obtener datos del formulario
            $usuarioIntroducido = $_POST['usuario'];
            $nombreCompletoIntroducido = $_POST['nombreCompleto'];
            $correoIntroducido = $_POST['correo'];
            $contraseñaIntroducida = $_POST['contraseña'];
            $repetirContraseñaIntroducida = $_POST['repetirContraseña'];
            $telefonoIntroducido = $_POST['telefono'];

            // Verificar si las contraseñas coinciden
            if($contraseñaIntroducida != $repetirContraseñaIntroducida){
                $_SESSION['resultadoRegister'] = "invalidPasswords";
                session_write_close();
                header("Location: ?controller=usuario&action=register");
                exit();
            }
        
            // Obtener los usuarios de la base de datos
            $usuarios = UsuarioDAO::getAll();
        
            // Verificar si el usuario existe
            $userFound = false;
            foreach ($usuarios as $usuario) {
                if ($usuario->getUsuario() == $usuarioIntroducido || $usuario->getEmail() == $correoIntroducido) {
                    $userFound = true;
                    $_SESSION['resultadoRegister'] = "userExists";  // Asignar variable de sesión
                    break;
                }
            }
        
            if (!$userFound) {

                UsuarioDAO::crearUsuario($usuarioIntroducido, $nombreCompletoIntroducido, $correoIntroducido, $contraseñaIntroducida, $telefonoIntroducido);

                // Establecer el usuario actual en sesión
                $_SESSION['usuarioActual'] = UsuarioDAO::getIdActual($usuarioIntroducido);

                $_SESSION['resultadoRegister'] = "userCreated";  // Si no se encuentra, asignar otro valor
            }
        
            session_write_close();
            header("Location: ?controller=usuario&action=register");
            exit(); 
        }

        public static function editarDatos(){

            session_start();

            // Obtener datos del formulario
            $usuario = $_SESSION['usuarioActual'];
            $nombreUsuario = $_POST['usuario'];
            $nombreCompleto = $_POST['nombreCompleto'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];

            UsuarioDAO::editarDatos($usuario, $nombreUsuario, $nombreCompleto, $correo, $telefono);

            session_write_close();
            header("Location: ?controller=usuario");
            exit(); 

        }

        public static function añadirDirecciones(){

            session_start();

            // Obtener datos del formulario
            $usuario = $_SESSION['usuarioActual'];
            $codigoPostal = $_POST['codigoPostal'];
            $ciudad = $_POST['ciudad'];
            $calle = $_POST['calle'];

            // Subir a la DB
            DireccionDAO::añadirDireccion($usuario, $codigoPostal, $ciudad, $calle);

            session_write_close();
            header("Location: ?controller=usuario");
            exit();

        }

        public static function eliminarDireccion($id){

            DireccionDAO::eliminarDireccion($id);

            header("Location: ?controller=usuario");
            exit();

        }

        public static function editarDatosBancarios(){

            session_start();

            // Obtener datos del formulario
            $usuario = $_SESSION['usuarioActual'];
            $tarjetaBancaria = $_POST['tarjeta'];
            $fechaCaducidad = $_POST['fechaCaducidad'];
            $cvv = $_POST['cvv'];

            // Editar los datos
            UsuarioDAO::editarDatosBancarios($usuario, $tarjetaBancaria, $fechaCaducidad, $cvv);

            session_write_close();
            header("Location: ?controller=usuario");
            exit();

        }

        public static function pedido(){

            $id = $_GET['id'];

            // Obtener los datos del pedido
            $pedido = PedidoDAO::getPedido($id);

            $pedidoProductos = PedidoDAO::getDetalles($pedido->getId());
            $direccion = DireccionDAO::getDireccion($pedido->getDireccion());

            include_once "views/pedido.php";


        }
    }

?>