<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDeposito = $_POST["idDeposito"];
    $accesibilidad = $_POST["accesibilidad"];
    $edificio = $_POST["edificio"];

    $query = "INSERT INTO detallesdepositos (id_deposito, accesibilidad, edificio) VALUES ('$idDeposito', '$accesibilidad', '$edificio')";
    mysqli_query($conexion, $query);

    header("Location: detalleDeposito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Detalle de Depósito</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Detalle de Depósito</h2>
    <form action="agregar_detalleDeposito.php" method="post">
        <label for="idDeposito">ID de Depósito:</label>
        <input type="text" id="idDeposito" name="idDeposito" required><br><br>
        <label for="accesibilidad">Accesibilidad:</label>
        <input type="text" id="accesibilidad" name="accesibilidad" required><br><br>
        <label for="edificio">Edificio:</label>
        <input type="text" id="edificio" name="edificio" required><br><br>
        <input type="submit" value="Agregar Detalle de Depósito">
    </form>
    <a href="detalleDeposito.php">Volver a Detalles de Depósito</a>
</body>
</html>
