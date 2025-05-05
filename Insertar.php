<?php
include_once 'load.php';

use BaseXClient\BaseXException;
use BaseXClient\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
try {
    $session = new Session("localhost", 1984, "admin", "admin");
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $public = $_POST['public'];
    $titulo = $_POST['titulo'];
    $desc = $_POST['desc'];

    // Abre la base de datos
    $session->execute("OPEN eventos");

    // Consulta XQuery
    $input = 
    'insert node
    <tema xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
        <id>'. $id . '</id>
        <tipo>' . $tipo . '</tipo>
        <publicacion>' . $public . '</publicacion>
        <titulo>' . $titulo . '</titulo>
        <descripcion>' . $desc . '</descripcion>
    </tema>
    into /temas';

    $query = $session->query($input);
    $result = $query->execute();

    // Cierra la consulta
    $query->close();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $session->close();
}}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Insertar un Registro</h1>
    <form method="post">
    <br><label for="id">ID: </label><input type="number" name="id"></br>
    <br><label for="tipo">Tipo: </label><input type="text" name="tipo"></br>
    <br><label for="public">Publicación: </label><input type="datetime-local" name="public"></br>
    <br><label for="titulo">Titulo: </label><input type="text" name="titulo"></br>
    <br><label for="desc">Descripcion: </label><input type="text" name="desc"></br>
    <br><input type="submit" value="Submit"></br>
    </form>
</body>
</html>