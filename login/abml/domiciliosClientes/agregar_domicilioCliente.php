<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barrioCliente = $_POST["barrioCliente"];
    $calleCliente = $_POST["calleCliente"];
    $manzanaCliente = $_POST["manzanaCliente"];
    $casaCliente = $_POST["casaCliente"];

    $query = "INSERT INTO domiciliosclientes (barrioCliente, calleCliente, manzanaCliente, casaCliente) VALUES ('$barrioCliente', '$calleCliente', '$manzanaCliente', '$casaCliente')";
    mysqli_query($conexion, $query);

    header("Location: domicilioCliente.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Domicilio de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Domicilio de Cliente</h2>
    <form action="agregar_domicilioCliente.php" method="post">
        <label for="barrioCliente">Barrio:</label>
        <input type="text" id="barrioCliente" name="barrioCliente" required><br><br>
        <label for="calleCliente">Calle:</label>
        <input type="text" id="calleCliente" name="calleCliente" required><br><br>
        <label for="manzanaCliente">Manzana:</label>
        <input type="text" id="manzanaCliente" name="manzanaCliente" required><br><br>
        <label for="casaCliente">Casa:</label>
        <input type="text" id="casaCliente" name="casaCliente" required><br><br>
        <input type="submit" value="Agregar Domicilio de Cliente">
    </form>
    <a href="domicilioCliente.php">Volver a Domicilios de Clientes</a>
</body>
</html>
