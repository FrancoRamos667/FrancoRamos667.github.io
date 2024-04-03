<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $tipoImpuesto = $_POST["tipoImpuesto"];
    $montoImpuesto = $_POST["montoImpuesto"];
    $fechaImpuesto = $_POST["fechaImpuesto"];

    $query = "UPDATE impuestos SET tipoImpuesto='$tipoImpuesto', montoImpuesto='$montoImpuesto', fechaImpuesto='$fechaImpuesto' WHERE id_impuesto='$id'";
    mysqli_query($conexion, $query);

    header("Location: impuesto.php");
    exit();
}

// Obtener datos del impuesto si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM impuestos WHERE id_impuesto='$id'";
    $result = mysqli_query($conexion, $query);
    $impuesto = mysqli_fetch_assoc($result);
} else {
    $impuesto = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Impuesto</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Impuesto</h2>
    <form action="modificar_impuesto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="tipoImpuesto">Tipo de Impuesto:</label>
        <input type="text" id="tipoImpuesto" name="tipoImpuesto" value="<?php echo isset($impuesto['tipoImpuesto']) ? $impuesto['tipoImpuesto'] : ''; ?>" required><br><br>
        <label for="montoImpuesto">Monto de Impuesto:</label>
        <input type="text" id="montoImpuesto" name="montoImpuesto" value="<?php echo isset($impuesto['montoImpuesto']) ? $impuesto['montoImpuesto'] : ''; ?>" required><br><br>
        <label for="fechaImpuesto">Fecha de Impuesto:</label>
        <input type="date" id="fechaImpuesto" name="fechaImpuesto" value="<?php echo isset($impuesto['fechaImpuesto']) ? $impuesto['fechaImpuesto'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Impuesto">
    </form>
    <a href="impuesto.php">Volver a Impuestos</a>
</body>
</html>
