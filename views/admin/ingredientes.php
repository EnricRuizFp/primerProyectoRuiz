<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PANEL DEL ADMINISTRADOR</h1>
    <h2>INGREDIENTES</h2>
    <h3>Crear ingrediente</h3>
    <form action="?controller=ingrediente&action=store" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" maxlenght="50" required>
            <br>
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" maxlenght="255" required>
            <br>
        <label for="precio_unidad">Precio por unidad</label>
        <input type="number" id="precio_unidad" name="precio_unidad" step="0.01" min="0" max="100" required>
            <br>
        <input type="submit" value="CREAR">
    </form>
    
    <h3>Editar ingrediente</h3>
    <form action="?controller=ingrediente&action=edit" method="POST">
        <label for="id">Indica el ID:</label>
        <input type="number" id="id" name="id" required>
            <br>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" maxlenght="50" required>
            <br>
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" maxlenght="255" required>
            <br>
        <label for="precio_unidad">Precio por unidad</label>
        <input type="number" id="precio_unidad" name="precio_unidad" step="0.01" min="0" max="100" required>
            <br>
        <input type="submit" value="EDITAR">
    </form>


    <h3>Listado de ingredientes</h3>
    
    <table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>PRECIO UNIDAD</th>
            <th>ACCION</th>
        </tr>
    <?php

        foreach($ingredientes as $ingrediente){
    ?>
        <tr>
            <td><?=$ingrediente->getId()?></td>
            <td><?=$ingrediente->getNombre()?></td>
            <td><?=$ingrediente->getDescripcion()?></td>
            <td><?=$ingrediente->getPrecioUnidad()?></td>
            <td><a href="?controller=admin&action=destroy&id=<?=$ingrediente->getId()?>">ELIMINAR</a></td>
        </tr>
    <?php
    }
    ?>
    

</body>
</html>