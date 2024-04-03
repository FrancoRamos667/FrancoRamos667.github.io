<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];
    $id_domicilioCliente = $_POST["id_domicilioCliente"];
    $id_celCliente = $_POST["id_celCliente"];

    $query = "INSERT INTO informacionesclientes (id_cliente, id_domicilioCliente, id_celCliente) VALUES ('$id_cliente', '$id_domicilioCliente', '$id_celCliente')";
    mysqli_query($conexion, $query);

    header("Location: datoCliente.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Datos de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Datos de Cliente</h2>
    <form action="agregar_datoCliente.php" method="post">
        <label for="id_cliente">ID Cliente:</label>
        <input type="text" id="id_cliente" name="id_cliente" required><br><br>
        <label for="id_domicilioCliente">ID Domicilio:</label>
        <input type="text" id="id_domicilioCliente" name="id_domicilioCliente" required><br><br>
        <label for="id_celCliente">ID Celular:</label>
        <input type="text" id="id_celCliente" name="id_celCliente" required><br><br>
        <input type="submit" value="Agregar Datos de Cliente">
    </form>
    <a href="datoCliente.php">Volver a Datos de Cliente</a>
</body>
</html>
