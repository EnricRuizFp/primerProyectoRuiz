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
                $ofertaSeleccionada = $_SESSION['codigoOferta'];

                $precioConDescuento = $this->calcularPrecioConDescuento( $precioProductos, $ofertaSeleccionada);
                $descuentoAplicado = $this->calcularDescuentoAplicado($precioProductos, $ofertaSeleccionada);

            }else{

                $precioSinDescuento = $precioProductos;

            }

            include_once("views/carrito.php");

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

            echo $oferta;

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

            if($ofertaValida == "SI"){
                $_SESSION['oferta'] = true;
                $_SESSION['codigoOferta'] = $oferta;
                echo "oferta valida.";
            }elseif($ofertaValida == "NO"){
                $_SESSION['oferta'] = false;
                $_SESSION['codigoOferta'] = $oferta;
                echo "oferta invalida";
            }else{
                $_SESSION['oferta'] = "null";
                $_SESSION['codigoOferta'] = null;
                echo "sin oferta";
            }

            header("Location: ?controller=carrito");

        }

        public function calcularPrecioConDescuento($precioProductos, $ofertaSeleccionada){

            $tipoOferta = OfertaDAO::getTipoOferta($ofertaSeleccionada);
            $cantidadOferta = OfertaDAO::getCantidadOferta($ofertaSeleccionada);
            
            if($tipoOferta == "%"){
                echo "oferta porcentaje";
                $precioTotal = $precioProductos - round($precioProductos * ($cantidadOferta / 100), 2); 
            }elseif($tipoOferta == "€"){
                echo "oferta euros";
                $precioTotal = $precioProductos - $cantidadOferta;
            }else{
                echo "sin ofertas";
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

            // Si no hay sesión iniciada, lleva a la página de inicio sesión

            //Si está iniciada, pedir confirmación

        }

    }

?>