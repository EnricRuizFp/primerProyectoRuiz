<?php
include_once "models/IngredienteDAO.php";
include_once "models/Ingrediente.php";
$ingredientes = IngredienteDAO::getIngredientesDefault(1);

var_dump($ingredientes);

?>