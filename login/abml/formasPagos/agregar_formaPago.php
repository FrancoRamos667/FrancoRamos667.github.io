<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaPago = $_POST["fechaPago"];
    $montoPago = $_POST["montoPago"];
    $metodoPago = $_POST["metodoPago"];

    $query = "INSERT INTO formaspagos (fechaPago, montoPago, metodoPago) VALUES ('$fechaPago', '$montoPago', '$metodoPago')";
    mysqli_query($conexion, $query);

    header("Location: formaPago.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Forma de Pago</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Forma de Pago</h2>
    <form action="agregar_formaPago.php" method="post">
        <label for="fechaPago">Fecha de Pago:</label>
        <input type="date" id="fechaPago" name="fechaPago" required><br><br>
        <label for="montoPago">Monto de Pago:</label>
        <input type="text" id="montoPago" name="montoPago" required><br><br>
        <label for="metodoPago">Método de Pago:</label>
        <input type="text" id="metodoPago" name="metodoPago" required><br><br>
        <input type="submit" value="Agregar Forma de Pago">
    </form>
    <a href="formaPago.php">Volver a Formas de Pago</a>
</body>
</html>
