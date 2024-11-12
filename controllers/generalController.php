<?php

    class generalController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            include_once "views/main.php";

        }

        public function productos(){

            include_once "views/productos.php";

        }

        public function admin(){

            include_once "views/admin/index.php";

        }

    }

?>