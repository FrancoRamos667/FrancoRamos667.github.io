<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoImpuesto = $_POST["tipoImpuesto"];
    $montoImpuesto = $_POST["montoImpuesto"];
    $fechaImpuesto = $_POST["fechaImpuesto"];

    $query = "INSERT INTO impuestos (tipoImpuesto, montoImpuesto, fechaImpuesto) VALUES ('$tipoImpuesto', '$montoImpuesto', '$fechaImpuesto')";
    mysqli_query($conexion, $query);

    header("Location: impuesto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Impuesto</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Impuesto</h2>
    <form action="agregar_impuesto.php" method="post">
        <label for="tipoImpuesto">Tipo de Impuesto:</label>
        <input type="text" id="tipoImpuesto" name="tipoImpuesto" required><br><br>
        <label for="montoImpuesto">Monto de Impuesto:</label>
        <input type="text" id="montoImpuesto" name="montoImpuesto" required><br><br>
        <label for="fechaImpuesto">Fecha de Impuesto:</label>
        <input type="date" id="fechaImpuesto" name="fechaImpuesto" required><br><br>
        <input type="submit" value="Agregar Impuesto">
    </form>
    <a href="impuesto.php">Volver a Impuestos</a>
</body>
</html>
