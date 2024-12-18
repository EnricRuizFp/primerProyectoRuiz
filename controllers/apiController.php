<?php

class apiController{

    function obtenerAllUsuarios(){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/UsuarioDAO.php";
        $usuarios = UsuarioDAO::getUsuarios();

        echo json_encode($usuarios);

    }

    function eliminarUsuario($id){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once "models/UsuarioDAO.php";

        // Eliminar usuario
        UsuarioDAO::eliminarUsuario($id);

        // Actualizar la vista
        $usuarios = UsuarioDAO::getUsuarios();

        echo json_encode($usuarios);

    }

}

?>