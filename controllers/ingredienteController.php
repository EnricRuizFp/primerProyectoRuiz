<?php

    class ingredienteController{

        public function store(){

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio_unidad = $_POST['precio_unidad'];

            echo "Nombre: ".$nombre." Descripcion: ".$descripcion." Precio unidad: ".$precio_unidad;

            $ingrediente = new Ingrediente();
            $ingrediente->setNombre($nombre);
            $ingrediente->setDescripcion($descripcion);
            $ingrediente->setPrecioUnidad($precio_unidad);

            IngredienteDAO::store($ingrediente);

            header('Location:?controller=admin&action=ingredientes');

        }

        public function edit(){

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio_unidad = $_POST['precio_unidad'];

            // Verificar que el ID existe
            $verification = IngredienteDAO::verify($id);

            if($verification){

                // El ingrediente existe
                $ingrediente = new Ingrediente();
                $ingrediente->setNombre($nombre);
                $ingrediente->setDescripcion($descripcion);
                $ingrediente->setPrecioUnidad($precio_unidad);

                IngredienteDAO::edit($id, $ingrediente);
                header('Location:?controller=admin&action=ingredientes');

            }else{

                // Ingrediente no existe
                echo "EL INGREDIENTE NO EXISTE<br><a href='?controller=admin&action=ingredientes'>Volver</a>";
            }

        }

    }

?>