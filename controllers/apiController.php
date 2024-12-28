<?php

class apiController{

    /**
     * PEDIDOS // PRODUCTOS // INGREDIENTES
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

    function obtenerAllProductos(){
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
        $estado = $data['estado'] ?? null;
        $productos = $data['productos'] ?? null;

        if($cliente_id && $direccion && $fecha && $productos){

            $validacionCliente = UsuarioDAO::validacionUsuario($cliente_id);

            if($validacionCliente){
                include_once "models/PedidoDAO.php";
                $validacion = PedidoDAO::editarPedido($pedido_id, $cliente_id, $oferta_id, $direccion, $fecha, $estado, $productos);
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
        $orden = $data['orden'] ?? null;

        if($cliente_id){
            // Filtrar por cliente
            $pedidos = PedidoDAO::obtenerPedidosPorUsuario($cliente_id);
            echo json_encode($pedidos);

        }else if($fecha_ini && $fecha_fin){
            // Filtrar por fecha
            $pedidos = PedidoDAO::obtenerPedidosPorFechas($fecha_ini, $fecha_fin, $orden);
            echo json_encode($pedidos);

        }else if($precio_ini && $precio_fin){
            // Filtrar por fecha
            $pedidos = PedidoDAO::obtenerPedidosPorPrecio($precio_ini, $precio_fin, $orden);
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

    function eliminarPedido(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $pedido_id = $data['id'] ?? null;

        // Si hay un ID, eliminar ese pedido
        if($pedido_id){
            // Filtrar por fecha
            $validacion = PedidoDAO::eliminarPedido($pedido_id);
            echo json_encode($validacion);

        }else{
            // Datos mal proporcionados
            echo json_encode(['error'=> 'ID no proporcionado.']);
        }

    }

    function obtenerIngredientesProducto(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $producto_id = $data['id'] ?? null;

        include_once "models/IngredienteDAO.php";
        include_once "models/Ingrediente.php";
        $ingredientes = IngredienteDAO::getIngredientesDefault($producto_id);

        // Obtener nombres de ingredientes
        $nombresIngredientes = array_map(function ($ingrediente) {
            return $ingrediente->getNombre();
        }, $ingredientes);

        // Unir los ingredientes con una coma y terminar con un punto
        $string = implode(", ", $nombresIngredientes);
        if (!empty($string)) {
            $string .= "."; // Agregar el punto final solo si hay ingredientes
        }

        echo json_encode($string);
    }

    function obtenerAllIngredientes(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/IngredienteDAO.php";
        $ingredientes = IngredienteDAO::obtenerAllIngredientes();

        echo json_encode($ingredientes);
    }

    function crearProducto(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre = $data['nombre'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $seccion = $data['seccion'] ?? null;
        $ingredientes = $data['ingredientes'] ?? null;
        $categoria = $data['categoria'] ?? null;
        $precio = $data['precio'] ?? null;
        $imagen = $data['imagen'] ?? null;

        // Si están todos los datos:
        if($nombre && $descripcion && $seccion && $ingredientes && $categoria && $precio && $imagen){

            include_once "models/ProductoDAO.php";
            $validacion = ProductoDAO::crearProducto($nombre, $descripcion, $seccion, $ingredientes, $categoria, $precio, $imagen);

            echo json_encode($validacion);

        }else{

            echo json_encode(['error'=> 'Debe rellenar todos los datos.']);

        }

    }

    function obtenerProductos(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $filtro = $data['filtro'] ?? null;

        if($filtro){

            include_once "models/ProductoDAO.php";
            $productos = ProductoDAO::obtenerProductos($filtro);
            echo json_encode($productos);

        }else{
            echo json_encode(["error"=> "Sin filtro"]);
        }
    }

    function obtenerProducto(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $producto_id = $data['id'] ?? null;

        if($producto_id){

            include_once "models/ProductoDAO.php";
            $producto = ProductoDAO::obtenerProducto($producto_id);
            echo json_encode($producto);

        }else{
            echo json_encode(["error"=> "Sin producto."]);
        }

    }

    function crearIngrediente(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre = $data['nombre'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $precio = $data['precio'] ?? null;
        $categoria = $data['categoria'] ?? null;        

        // Si están todos los datos:
        if($nombre && $descripcion && $precio && $categoria ){

            include_once "models/IngredienteDAO.php";
            $validacion = IngredienteDAO::crearIngrediente($nombre, $descripcion, $precio, $categoria);

            if($validacion){
                echo json_encode($validacion);
            }else{
                echo json_encode(['error'=> 'No se ha podido crear el ingrediente.']);
            }   

        }else{

            echo json_encode(['error'=> 'Debe rellenar todos los datos.']);

        }

    }

    function obtenerCategoriasIngredientes(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/IngredienteDAO.php";
        $categorias = IngredienteDAO::obtenerCategoriasIngredientes();
        echo json_encode($categorias);
    }

    function obtenerIngredientes(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $categoria = $data['filtro'] ?? null;

        if($categoria){
            include_once "models/IngredienteDAO.php";
            $ingredientes = IngredienteDAO::obtenerIngredientes($categoria);
            echo json_encode($ingredientes);
        }else{
            echo json_encode(["error"=> "Categoría no introducida."]);
        }
        

    }

    function obtenerSelectedIngredientes(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if($id){
            include_once "models/IngredienteDAO.php";
            $ingredientes = IngredienteDAO::obtenerSelectedIngredientes($id);
            echo json_encode($ingredientes);
        }else{
            echo json_encode(["error" => "ID no proporcionado."]);
        }

    }

    function editarProducto(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;
        $nombre = $data['nombre'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $seccion = $data['seccion'] ?? null;
        $ingredientes = $data['ingredientes'] ?? null;
        $categoria = $data['categoria'] ?? null;
        $precio = $data['precio'] ?? null;
        $imagen = $data['imagen'] ?? null;

        // Si están todos los datos:
        if($id && $nombre && $descripcion && $seccion && $ingredientes && $categoria && $precio && $imagen){

            include_once "models/ProductoDAO.php";
            $validacion = ProductoDAO::editarProducto($id, $nombre, $descripcion, $seccion, $ingredientes, $categoria, $precio, $imagen);

            echo json_encode($validacion);

        }else{

            echo json_encode(['error'=> 'Debe rellenar todos los datos.']);

        }

    }

    function eliminarProducto(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $producto_id = $data['id'] ?? null;

        // Si hay un ID, eliminar ese pedido
        if($producto_id){
            // Filtrar por fecha
            $validacion = ProductoDAO::eliminarProducto($producto_id);
            echo json_encode($validacion);

        }else{
            // Datos mal proporcionados
            echo json_encode(['error'=> 'ID no proporcionado.']);
        }

    }

    function obtenerIngrediente(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if($id){

            include_once "models/IngredienteDAO.php";
            $ingrediente = IngredienteDAO::obtenerIngrediente($id);
            echo json_encode($ingrediente);

        }else{
            echo json_encode(["error"=> "Sin ingrediente."]);
        }


    }

    function editarIngrediente(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"] ?? null;
        $nombre = $data['nombre'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $precio = $data['precio'] ?? null;
        $categoria = $data['categoria'] ?? null;        

        // Si están todos los datos:
        if($id && $nombre && $descripcion && $precio && $categoria ){

            include_once "models/IngredienteDAO.php";
            $validacion = IngredienteDAO::editarIngrediente($id, $nombre, $descripcion, $precio, $categoria);

            if($validacion){
                echo json_encode($validacion);
            }else{
                echo json_encode(['error'=> 'No se ha podido actualizar el ingrediente.']);
            }   

        }else{

            echo json_encode(['error'=> 'Debe rellenar todos los datos.']);

        }
    }

    function eliminarIngrediente(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"] ?? null;

        // Si están todos los datos:
        if($id){

            include_once "models/IngredienteDAO.php";
            $validacion = IngredienteDAO::eliminarIngrediente($id);

            if($validacion){
                echo json_encode($validacion);
            }else{
                echo json_encode(['error'=> 'No se ha podido eliminar el ingrediente.']);
            }   

        }else{

            echo json_encode(['error'=> 'No se ha rellenado el dato necesario.']);

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


    /**
     * OFERTAS
     */
    function obtenerAllOfertas(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/OfertaDAO.php";
        $ofertas = OfertaDAO::obtenerAllOfertas();

        echo json_encode($ofertas);
    }

    function crearOferta(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $nombre = $data['nombre'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $descuento = $data['descuento'] ?? null;
        $tipo = $data['tipo'] ?? null;
        $fecha_inicio = $data['fecha_inicio'] ?? null;
        $fecha_fin = $data['fecha_fin'] ?? null;        

        // Si están todos los datos:
        if($nombre && $descripcion && $descuento && $tipo && $fecha_inicio && $fecha_fin ){

            include_once "models/OfertaDAO.php";
            $validacion = OfertaDAO::crearOferta($nombre, $descripcion, $descuento, $tipo, $fecha_inicio, $fecha_fin);

            if($validacion){
                echo json_encode($validacion);
            }else{
                echo json_encode(['error'=> 'No se ha podido crear el ingrediente.']);
            }   

        }else{

            echo json_encode(['error'=> 'Debe rellenar todos los datos.']);

        }
    }

    function obtenerOferta(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if($id){

            include_once "models/OfertaDAO.php";
            $oferta = OfertaDAO::obtenerOferta($id);
            echo json_encode($oferta);

        }else{
            echo json_encode(["error"=> "Sin oferta."]);
        }
    }

    function editarOferta(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;
        $nombre = $data['nombre'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $descuento = $data['descuento'] ?? null;
        $tipo = $data['tipo'] ?? null;
        $fecha_inicio = $data['fecha_inicio'] ?? null;
        $fecha_fin = $data['fecha_fin'] ?? null;

        if($id && $nombre && $descripcion && $descuento && $tipo && $fecha_inicio && $fecha_fin){

            include_once "models/OfertaDAO.php";
            $validacion = OfertaDAO::editarOferta($id, $nombre, $descripcion, $descuento, $tipo, $fecha_inicio, $fecha_fin);
            echo json_encode($validacion);

        }else{
            echo json_encode(["error"=> "No se ha podido actualizar la oferta."]);
        }
    }

    function obtenerTiposOfertas(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/OfertasDAO.php";
        $tipos = OfertaDAO::obtenerTiposOfertas();
        echo json_encode($tipos);

    }

    function obtenerOfertas(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $tipo = $data['filtro'] ?? null;

        if($tipo){
            include_once "models/OfertaDAO.php";
            $ofertas = OfertaDAO::obtenerOfertas($tipo);
            echo json_encode($ofertas);
        }else{
            echo json_encode(["error"=> "Tipo no introducido."]);
        }
    }

    function eliminarOferta(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener el ID del JSON
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"] ?? null;

        // Si están todos los datos:
        if($id){

            include_once "models/OfertaDAO.php";
            $validacion = OfertaDAO::eliminarOferta($id);

            if($validacion){
                echo json_encode($validacion);
            }else{
                echo json_encode(['error'=> 'No se ha podido eliminar la oferta.']);
            }   

        }else{

            echo json_encode(['error'=> 'No se ha llenado el dato necesario.']);

        }
    }

    /**
     * DATOS ADMIN
     */
    function obtenerDatosPedidos(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/PedidoDAO.php";

        $respuesta = [
            "cantidadPedidos" => PedidoDAO::obtenerCantidadPedidos(),
            "precioTotalPedidos" => PedidoDAO::obtenerPrecioTotalPedidos(),
            "totalDescuentos" => PedidoDAO::obtenerCantidadDescuentos(),
            "mejorUsuario" => PedidoDAO::obtenerMejorUsuario()
        ];

        echo json_encode($respuesta);

    }

    function obtenerDatosUsuarios(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/UsuarioDAO.php";

        $respuesta = [
            "cantidadUsuarios" => UsuarioDAO::obtenerCantidadUsuarios(),
            "usuariosSinTarjeta" => UsuarioDAO::obtenerUsuariosSinTarjeta(),
            "usuariosConPerfilCompleto" => UsuarioDAO::obtenerUsuariosPerfilCompleto()
        ];

        echo json_encode($respuesta);

    }

    function obtenerDatosProductos(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/ProductoDAO.php";

        $respuesta = [
            "cantidadProductos" => ProductoDAO::obtenerCantidadProductos(),
            "promedioPrecioPizzas" => ProductoDAO::obtenerPromedioPrecioPizzas(),
            "promedioPrecioBebidas" => ProductoDAO::obtenerPromedioPrecioBebidas(),
            "promedioPrecioPostres" => ProductoDAO::obtenerPromedioPrecioPostres()
        ];

        echo json_encode($respuesta);
    }

    function obtenerDatosIngredientes(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/IngredienteDAO.php";

        $respuesta = [
            "cantidadIngredientes" => IngredienteDAO::obtenerCantidadIngredientes(),
            "promedioPrecioIngrediente" => IngredienteDAO::obtenerPromedioPrecioIngredientes(),
            "ingredienteMasCaro" => IngredienteDAO::obtenerIngredienteMasCaro(),
            "ingredienteMasBarato" => IngredienteDAO::obtenerIngredienteMasBarato()
        ];

        echo json_encode($respuesta);
    }

    /**
     * LOGS
     */
    function obtenerLogs(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtiene todos los datos de la tabla logs
        include_once "models/LogDAO.php";
        $logs = LogDAO::getAll();
        echo json_encode($logs);
    }

    function guardarLogs(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // Obtener LOGS del JSON
        $data = json_decode(file_get_contents("php://input"), true);

        // Si hay datos, los guarda
        if($data){

            include_once "models/LogDAO.php";
            $validacion = LogDAO::guardarLogs($data);
            echo json_encode($validacion);

        }else{
            echo json_encode(['error'=> 'No es un array.']);
        }

    }

}

?>