<?php

    /* -- Inclusión de los DAOs -- */
    include_once "models/IngredienteDAO.php";

    class adminController{

        /* -- Acciones pasadas por URL -- */
        public function index(){

            include_once "views/admin/index.html";

        }

        public function pedidos(){

            echo "SIN FUNCIONALIDAD<br><a href='?controller=admin'>Volver</a>";

        }

        public function usuarios(){
            include_once "views/admin/usuarios.html";

           // header("Location: views/admin/usuarios.html");

        }

    }

?>