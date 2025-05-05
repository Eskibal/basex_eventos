<?php
include_once 'load.php';

use BaseXClient\BaseXException;
use BaseXClient\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
try {
    $session = new Session("localhost", 1984, "admin", "admin");
    $id = $_POST['id'];

    // Abre la base de datos
    $session->execute("OPEN eventos");

    // Consulta XQuery
    $input = 
    'for $a in ./temas/tema
    where $a/id = "' . $id . '"
    return delete node $a';

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Borrar un Registro</h1>
    <form method="post">
    <br><label for="id">ID: </label><input type="number" name="id"></br>
    <br><input type="submit" value="Borrar"></br>
    </form>
</body>
</html>