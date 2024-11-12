<?php

    /* -- Inclusión de los DAOs -- */
    include_once "models/IngredienteDAO.php";

    class adminController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            include_once "views/admin/";

        }

        public function productos(){

            include_once "views/admin/productos.php";

        }

        public function ingredientes(){

            $ingredientes = IngredienteDAO::getAll();
            include_once "views/admin/ingredientes.php";
        }

    }

?>