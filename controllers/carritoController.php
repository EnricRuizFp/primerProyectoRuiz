<?php

    class carritoController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            include_once "models/Producto.php";
            include_once "models/ProductoDAO.php";
            include_once "models/Oferta.php";
            include_once "models/OfertaDAO.php";

            session_start();
            $carrito =  $_SESSION['carrito'];

            //Obtener los datos de los productos
            $productosCarrito = ProductoDAO::getProductosCarrito($carrito);
            $precioProductos = $this->getPrecioProductos($productosCarrito);
            $cantidadProductos = $this->getCantidadProductosEnCarrito($productosCarrito);

            //Obtener el dato de la oferta
            if(isset($_SESSION['oferta']) && $_SESSION['oferta'] == "SI"){
                $ofertaSeleccionada = OfertaDAO::getOfertaId($_SESSION['codigoOferta']);

                $precioConDescuento = $this->calcularPrecioConDescuento( $precioProductos, $ofertaSeleccionada);
                $descuentoAplicado = $this->calcularDescuentoAplicado($precioProductos, $ofertaSeleccionada);

            }else{

                $precioSinDescuento = $precioProductos;

            }

            include_once "views/carrito.php";

        }

        public function añadir($id){

            session_start();

            // Verificar si el carrito tiene productos
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

                $productoExiste = false;

                // Verificar si el producto existe
                for ($i = 0; $i < count($_SESSION['carrito']); $i++) {

                    if ($_SESSION['carrito'][$i]['producto'] == $id) {

                        // Producto existe, añadir 1
                        $_SESSION['carrito'][$i]['cantidad'] += 1;
                        $productoExiste = true;
                        break;
                    }
                }

                // Si no se encuentra el producto, se añade
                if (!$productoExiste) {
                    $_SESSION['carrito'][] = ['producto' => $id, 'cantidad' => 1];
                }

            } else {

                // El carrito no está iniciado, crear array y añadir producto
                $_SESSION['carrito'] = [];
                $_SESSION['carrito'][] = ['producto' => $id, 'cantidad' => 1];
            }

            header("Location: ?controller=carrito");

        }

        public function quitar($id){

            session_start();

            // Verificar si el carrito tiene productos
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

                // Verificar si el producto existe
                for ($i = 0; $i < count($_SESSION['carrito']); $i++) {

                    if ($_SESSION['carrito'][$i]['producto'] == $id) {

                        // Producto existe, si hay más de 0, bajar 1
                        if($_SESSION['carrito'][$i]['cantidad'] > 1){
                            $_SESSION['carrito'][$i]['cantidad'] -= 1;
                            break;
                        }else{

                            //Producto hay 0
                            array_splice($_SESSION['carrito'], $i, 1);
                            break;
                        }
                        
                    }
                }

            } else {

                // El carrito no está iniciado, crear array y añadir producto
                $_SESSION['carrito'] = [];
            }

            header("Location: ?controller=carrito");

        }

        public function getPrecioProductos($productosCarrito){

            $precioProductos = 0;
            foreach($productosCarrito as $productoCarrito){
                $producto = $productoCarrito['producto'];
                $cantidad = $productoCarrito['cantidad'];
                $precioProductos += $producto->getPrecio()*$cantidad;
            }
            return $precioProductos;
        }

        public function destroy(){
            unset($_SESSION['carrito']);
        }
        
        public function oferta(){

            session_start();

            include_once "models/Oferta.php";
            include_once "models/OfertaDAO.php";

            $oferta = $_POST['codigoPromocional'];
            $ofertasActuales = OfertaDAO::getOfertasActuales();

            //Obtener el precio de los productos
            $carrito =  $_SESSION['carrito'];
            $productosCarrito = ProductoDAO::getProductosCarrito($carrito);
            $precioProductos = $this->getPrecioProductos($productosCarrito);

            $ofertaValida = "NO";
            foreach($ofertasActuales as $ofertaActual){
                if($ofertaActual->getNombre() == $oferta){

                    $ofertaValida = "SI";
                    break;

                }
            }

            if($oferta == null){
                $ofertaValida = "NULL";
            }

            // Obtener el valor de la oferta
            $descuentoAplicado = $this->calcularDescuentoAplicado($precioProductos, $oferta);

            // Si la oferta baja demasiado el precio, no se aplica ( OFERTA VALIDA = NO )
            if($precioProductos < $descuentoAplicado){
                $ofertaValida = "NO";
            }

            if($ofertaValida == "SI"){
                $_SESSION['oferta'] = true;
                $_SESSION['codigoOferta'] = $oferta;
            }elseif($ofertaValida == "NO"){
                $_SESSION['oferta'] = false;
                $_SESSION['codigoOferta'] = $oferta;
            }else{
                $_SESSION['oferta'] = "null";
                $_SESSION['codigoOferta'] = null;
            }

            header("Location: ?controller=carrito");

        }

        public function calcularPrecioConDescuento($precioProductos, $ofertaSeleccionada){

            $tipoOferta = OfertaDAO::getTipoOferta($ofertaSeleccionada);
            $cantidadOferta = OfertaDAO::getCantidadOferta($ofertaSeleccionada);

            if($tipoOferta == "%"){
                $precioTotal = $precioProductos - round($precioProductos * ($cantidadOferta / 100), 2); 
            }elseif($tipoOferta == "€"){
                $precioTotal = $precioProductos - $cantidadOferta;
            }else{
                $precioTotal = $precioProductos;
            }

            return $precioTotal;

        }

        public function calcularDescuentoAplicado($precioProductos, $ofertaSeleccionada){

            $descuentoAplicado = $precioProductos - $this->calcularPrecioConDescuento($precioProductos, $ofertaSeleccionada);

            return $descuentoAplicado;

        }

        public function getCantidadProductosEnCarrito($productosCarrito){

            return count($productosCarrito);

        }

        public function pagar(){

            include_once "models/Oferta.php";
            include_once "models/OfertaDAO.php";

            session_start();

            if(isset($_SESSION['usuarioActual'])){

                // Obtener las direcciones del usuario
                $direcciones = DireccionDAO::getDirecciones($_SESSION['usuarioActual']);
                $cantidadDirecciones = DireccionDAO::getCantidadDirecciones($_SESSION['usuarioActual']);
                $datosBancariosValidos = UsuarioDAO::validacionDatosBancarios($_SESSION['usuarioActual']);
            }

            $carrito =  $_SESSION['carrito'];

            //Obtener los datos de los productos
            $productosCarrito = ProductoDAO::getProductosCarrito($carrito);
            $precioProductos = $this->getPrecioProductos($productosCarrito);

            //Obtener el dato de la oferta
            if(isset($_SESSION['oferta']) && $_SESSION['oferta']){
                $ofertaSeleccionada = OfertaDAO::getOfertaId($_SESSION['codigoOferta']);

                $precioConDescuento = $this->calcularPrecioConDescuento( $precioProductos, $ofertaSeleccionada);
                $descuentoAplicado = $this->calcularDescuentoAplicado($precioProductos, $ofertaSeleccionada);

            }else{

                $descuentoAplicado = 0;
                $precioSinDescuento = $precioProductos;

            }

            $_SESSION['direccionActual'] = null;
            $direccionActual = null;

            // Si no hay sesión iniciada, lleva a la página de inicio sesión
            session_write_close();
            include_once "views/comprar.php";
            exit(); 

        }

        public function seleccionarDireccion(){

            include_once "models/Oferta.php";
            include_once "models/OfertaDAO.php";

            session_start();

            if(isset($_SESSION['usuarioActual'])){

                // Obtener las direcciones del usuario
                $direcciones = DireccionDAO::getDirecciones($_SESSION['usuarioActual']);
                $cantidadDirecciones = DireccionDAO::getCantidadDirecciones($_SESSION['usuarioActual']);
                $datosBancariosValidos = UsuarioDAO::validacionDatosBancarios($_SESSION['usuarioActual']);
            }

            $carrito =  $_SESSION['carrito'];
            
            //Obtener los datos de los productos
            $productosCarrito = ProductoDAO::getProductosCarrito($carrito);
            $precioProductos = $this->getPrecioProductos($productosCarrito);

            //Obtener el dato de la oferta
            if(isset($_SESSION['oferta']) && $_SESSION['oferta']){
                $ofertaSeleccionada = OfertaDAO::getOfertaId($_SESSION['codigoOferta']);

                $precioConDescuento = $this->calcularPrecioConDescuento( $precioProductos, $ofertaSeleccionada);
                $descuentoAplicado = $this->calcularDescuentoAplicado($precioProductos, $ofertaSeleccionada);

            }else{

                $descuentoAplicado = 0;
                $precioSinDescuento = $precioProductos;

            }

            $_SESSION['direccionActual'] = $_POST['direccion'];
            $direccionActual = DireccionDAO::getDireccion($_SESSION['direccionActual']);

            session_write_close();
            include_once "views/comprar.php";
            exit(); 

        }

        public function comprar(){

            session_start();

            include_once "models/Oferta.php";
            include_once "models/OfertaDAO.php";
            include_once "controllers/pedidoController.php";

            //Obtener los datos de los productos
            $carrito =  $_SESSION['carrito'];
            $productosCarrito = ProductoDAO::getProductosCarrito($carrito);
            $precioProductos = $this->getPrecioProductos($productosCarrito);

            // Obtener los datos del pedido
            $usuarioActual = $_SESSION['usuarioActual'];
            $oferta_id = OfertaDAO::getOfertaId($_SESSION['codigoOferta']);
            $precioFinal = $this->calcularPrecio(  $oferta_id, $precioProductos);
            $descuento = $precioProductos - $precioFinal;
            $estadoPedido = "pedido";
            $fechaPedido = date("Y-m-d H:i:s");

            /*
            // DATOS A INTRODUCIR:
            echo "PEDIDO:<br>";
            echo "cliente: ".$usuarioActual."<br>";
            echo "oferta_id: ".$oferta_id."<br>";
            echo "precio: ".$precioProductos."<br>";
            echo "descuento: ".$descuento."<br>";
            echo "precio final: ".$precioFinal."<br>";
            echo "estado: ".$estadoPedido."<br>";
            echo "fecha: ".$fechaPedido."<br><br>";

            echo "PRODUCTOS:<br>";
            foreach($productosCarrito as $productoCarrito){

                echo "producto_id: ".$productoCarrito['producto']->getId();
                echo "<br>";
                echo "cantidad: ".$productoCarrito['cantidad'];
                echo "<br>";
                echo "precioTotal: ".$productoCarrito['producto']->getPrecio()*$productoCarrito['cantidad'];
                echo "<br>";
                echo "precio: ".$productoCarrito['producto']->getPrecio();
                echo "<br><br>";

            }
            */
            
            $validacion = pedidoController::generarPedido($usuarioActual,$oferta_id,$precioProductos,$descuento,$precioFinal,$estadoPedido,$fechaPedido, $productosCarrito);

            if($validacion){
                header("Location: ?controller=pedido&action=success");
            }else{
                header("Location: ?controller=pedido&action=error");
            }

        }

        public function calcularPrecio($oferta_id, $precioProductos){

            include_once "models/Oferta.php";
            include_once "models/OfertaDAO.php";

            if(isset($oferta_id)){

                $tipoOferta = OfertaDAO::getTipoOferta( $oferta_id );
                $cantidadOferta = OfertaDAO::getCantidadOferta($oferta_id);

                if($tipoOferta == "%"){

                    $precioFinal = $precioProductos - round($precioProductos * ($cantidadOferta / 100), 2);

                }elseif($tipoOferta == "€"){

                    $precioFinal = $precioProductos - $cantidadOferta;
                }else{

                    $precioFinal = $precioProductos;

                }
            }

            return $precioFinal;
        }

        public function calcularDescuento($precioProductos, $precioFinal){

            return $precioFinal - $precioProductos;;

        }

    }

?>