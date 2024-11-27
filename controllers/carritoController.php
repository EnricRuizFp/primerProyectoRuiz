<?php

    class carritoController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            include_once "models/Producto.php";
            include_once "models/ProductoDAO.php";

            session_start();
            $carrito =  $_SESSION['carrito'];

            $productosCarrito = ProductoDAO::getProductosCarrito($carrito);

            $precioProductos = $this->getPrecioProductos($productosCarrito);
            
            //var_dump($productosCarrito);

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
        

    }

?>