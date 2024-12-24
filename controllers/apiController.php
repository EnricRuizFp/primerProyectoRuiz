<?php

class apiController{

    /**
     * PEDIDOS // PRODUCTOS
     */
    function obtenerAllPedidos(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/PedidoDAO.php";
        $pedidos = PedidoDAO::getAllPedidos();

        echo json_encode($pedidos);
    }

    function obtenerProductosPedido(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if($id){
            include_once "models/PedidoDAO.php";
            $productos = PedidoDAO::getProductosPedido($id);
            echo json_encode($productos);
        }else{
            echo json_encode(["error" => "ID no proporcionado."]);
        }
    }

    function obtenerProductos(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/ProductoDAO.php";
        $productos = ProductoDAO::obtenerAllProductos();
        echo json_encode($productos);
    }

    function crearPedido(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $cliente_id = $data['cliente_id'] ?? null;
        $oferta_id = $data['oferta_id'] ?? null;
        $direccion = $data['direccion'] ?? null;
        $fecha = $data['fecha'] ?? null;
        $productos = $data['productos'] ?? null;

        if($cliente_id && $direccion && $fecha && $productos){

            $validacionCliente = UsuarioDAO::validacionUsuario($cliente_id);

            if($validacionCliente){
                include_once "models/PedidoDAO.php";
                $validacion = PedidoDAO::crearPedido($cliente_id, $oferta_id, $direccion, $fecha, $productos);
                echo json_encode($validacion);
            }else{
                echo json_encode(["error" => "Cliente no existe."]);
            }
            
        }else{
            echo json_encode(["error" => "Datos no proporcionados."]);
        }
    }

    function editarPedido(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $pedido_id = $data["pedido_id"] ?? null;
        $cliente_id = $data['cliente_id'] ?? null;
        $oferta_id = $data['oferta_id'] ?? null;
        $direccion = $data['direccion'] ?? null;
        $fecha = $data['fecha'] ?? null;
        $productos = $data['productos'] ?? null;

        if($cliente_id && $direccion && $fecha && $productos){

            $validacionCliente = UsuarioDAO::validacionUsuario($cliente_id);

            if($validacionCliente){
                include_once "models/PedidoDAO.php";
                $validacion = PedidoDAO::editarPedido($cliente_id, $oferta_id, $direccion, $fecha, $productos);
                echo json_encode($validacion);
            }else{
                echo json_encode(["error" => "Cliente no existe."]);
            }
            
        }else{
            echo json_encode(["error" => "Datos no proporcionados."]);
        }

    }

    function obtenerPedidos(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $cliente_id = $data['cliente_id'] ?? null;
        $fecha_ini = $data['fecha_inicio'] ?? null;
        $fecha_fin = $data['fecha_fin'] ?? null;
        $precio_ini = $data['precio_ini'] ?? null;
        $precio_fin = $data['precio_fin'] ?? null;

        if($cliente_id){
            // Filtrar por cliente
            $pedidos = PedidoDAO::obtenerPedidosPorUsuario($cliente_id);
            echo json_encode($pedidos);

        }else if($fecha_ini && $fecha_fin){
            // Filtrar por fecha
            $pedidos = PedidoDAO::obtenerPedidosPorFechas($fecha_ini, $fecha_fin);
            echo json_encode($pedidos);

        }else if($precio_ini && $precio_fin){
            // Filtrar por fecha
            $pedidos = PedidoDAO::obtenerPedidosPorPrecio($precio_ini, $precio_fin);
            echo json_encode($pedidos);

        }else{
            // Datos mal proporcionados
            echo json_encode(['error'=> 'Datos mal proporcionados.']);
        }
    }

    function obtenerPedido(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $pedido_id = $data['id'] ?? null;

        // Obtener los datos del pedido
        if($pedido_id){
            // Filtrar por fecha
            $pedido = PedidoDAO::obtenerPedido($pedido_id);
            echo json_encode($pedido);

        }else{
            // Datos mal proporcionados
            echo json_encode(['error'=> 'Datos mal proporcionados.']);
        }
    }

    /**
     * USUARIOS
     */
    function obtenerAllUsuarios(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/UsuarioDAO.php";
        $usuarios = UsuarioDAO::getUsuarios();

        echo json_encode($usuarios);
    }

    function obtenerUsuario(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if($id){
            include_once "models/UsuarioDAO.php";
            $usuario = UsuarioDAO::obtenerUsuario($id);
            echo json_encode($usuario);
        }else{
            echo json_encode(["error" => "ID no proporcionado."]);
        }
    }

    function editarUsuario(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener los datos del JSON
        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'] ?? null;
        $usuario = $data['usuario'] ?? null;
        $nombre_completo = $data['nombre_completo'] ?? null;
        $email = $data['email'] ?? null;
        $telefono = $data['telefono'] ?? null;
        $tarjeta_bancaria = $data['tarjeta_bancaria'] ?? null;
        $fecha_vencimiento = $data['fecha_vencimiento'] ?? null;
        $cvv = $data['cvv'] ?? null;

        if($id && $usuario && $nombre_completo && $email && $telefono && $tarjeta_bancaria && $fecha_vencimiento && $cvv){
            include_once "models/UsuarioDAO.php";
            $validacion = UsuarioDAO::editarUsuario($id, $usuario, $nombre_completo, $email, $telefono, $tarjeta_bancaria, $fecha_vencimiento, $cvv);
            echo json_encode($validacion);
        }else{
            echo json_encode(["error" => "Debe rellenar todos los datos"]);
        }
        
    }

    function crearUsuario(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener los datos del JSON
        $data = json_decode(file_get_contents("php://input"), true);

        $usuario = $data['usuario'] ?? null;
        $nombre_completo = $data['nombre_completo'] ?? null;
        $email = $data['email'] ?? null;
        $telefono = $data['telefono'] ?? null;
        $contraseña = $data['contraseña'] ?? null;
        $tarjeta_bancaria = $data['tarjeta_bancaria'] ?? null;
        $fecha_vencimiento = $data['fecha_vencimiento'] ?? null;
        $cvv = $data['cvv'] ?? null;

        // Obtener los usuarios de la base de datos
        $usuarios = UsuarioDAO::getAll();
        $usuarioEncontrado = false;

        // Verificar si el usuario existe
        foreach ($usuarios as $usuarioObtenido) {
            if ($usuarioObtenido->getUsuario() == $usuario || $usuarioObtenido->getEmail() == $email) {
                $usuarioEncontrado = true;
                break;
            }
        }

        // Añadir usuario
        if($usuario && $nombre_completo && $email && $telefono && $contraseña && $tarjeta_bancaria && $fecha_vencimiento && $cvv){

            if($usuarioEncontrado){
                echo json_encode(["error" => "El usuario ya existe"]);
            }else{
                include_once "models/UsuarioDAO.php";
                $validacion = UsuarioDAO::crearUsuarioAdmin($usuario, $nombre_completo, $email, $telefono, $contraseña, $tarjeta_bancaria, $fecha_vencimiento, $cvv);
                echo json_encode($validacion);
            }

        }else{
            echo json_encode(["error" => "Debe rellenar todos los datos"]);
        }

    }

    function cambiarContraseña(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener los datos del JSON
        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];
        $contraseña = $data['contraseña'];

        if($id && $contraseña){

            include_once "models/UsuarioDAO.php";
            $validacion = UsuarioDAO::cambiarContraseña($id, $contraseña);
            echo json_encode($validacion);

        }else{

            echo json_encode(["error" => "Debe rellenar todos los datos"]);
        }

    }

    function eliminarUsuario(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener los datos del JSON
        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];

        include_once "models/UsuarioDAO.php";
        UsuarioDAO::eliminarUsuario($id);

        echo json_encode(true);

    }

}

?>