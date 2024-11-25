<?php

    class carritoController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            session_start();
            $productosCarrito = $_SESSION['carrito'];
            $productos = ProductoDAO::getAll();
            include_once("views/carrito.php");

        }

        public function añadir($id){

            session_start();

            echo "ID: ".$id."<br>";

            // Verificar si el carrito tiene productos
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                echo "Carrito ya iniciado<br><br>";
                echo "Productos en el carrito:<br>";

                $productoExiste = false;

                // Verificar si el producto existe
                for ($i = 0; $i < count($_SESSION['carrito']); $i++) {

                    if ($_SESSION['carrito'][$i]['producto'] == $id) {

                        // Producto existe, añadir 1
                        echo "El producto está en el carrito.<br>";
                        $_SESSION['carrito'][$i]['cantidad'] += 1;
                        $productoExiste = true;
                        break;
                    }
                }

                // Si no se encuentra el producto, se añade
                if (!$productoExiste) {
                    echo "El producto no está en el carrito. Creando...<br>";
                    $_SESSION['carrito'][] = ['producto' => $id, 'cantidad' => 1];
                }

            } else {

                // El carrito no está iniciado, crear array y añadir producto
                echo "Carrito iniciado.<br>";
                $_SESSION['carrito'] = [];
                $_SESSION['carrito'][] = ['producto' => $id, 'cantidad' => 1];
            }

            header("Location: ?controller=carrito");

        }

        public function destroy(){
            unset($_SESSION['carrito']);
        }
        

    }

?>