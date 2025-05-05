<?php
require_once 'load.php';

use BaseXClient\BaseXException;
use BaseXClient\Session;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    try {
        $session = new Session("localhost", 1984, "admin", "admin");
        if ($accion === 'crear') {
            $session->execute("create db resultadoseconomicos");
            echo "✅ Base 'resultadoseconomicos' creada correctamente.";
        } elseif ($accion === 'eliminar') {
            $session->execute("drop db resultadoseconomicos");
            echo "🗑️ Base 'resultadoseconomicos' eliminada correctamente.";
        } else {
            echo "⚠️ Acción no válida.";
        }
    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage();
    }
} else {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Base resultadoseconomicos</title>
</head>
<body>
    <h1>Crear o Eliminar la base resultadoseconomicos</h1>
    <form method="POST">
        <label>Acción:</label>
        <select name="accion" required>
            <option value="crear">Crear base</option>
            <option value="eliminar">Eliminar base</option>
        </select>
        <button type="submit">Ejecutar</button>
    </form>
</body>
</html>
<?php } ?>