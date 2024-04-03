<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sucursal = $_POST["id_sucursal"];
    $id_cliente = $_POST["id_cliente"];
    $id_presupuestos = $_POST["id_presupuestos"];
    $solicitudCliente = $_POST["solicitudCliente"];
    $duracionEstimada = $_POST["duracionEstimada"];
    $id_formaPago = $_POST["id_formaPago"];

    $query = "INSERT INTO contratos (id_sucursal, id_cliente, id_presupuestos, solicitudCliente, duracionEstimada, id_formaPago) 
              VALUES ('$id_sucursal', '$id_cliente', '$id_presupuestos', '$solicitudCliente', '$duracionEstimada', '$id_formaPago')";
    mysqli_query($conexion, $query);

    header("Location: contrato.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contrato</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Contrato</h2>
    <form action="agregar_contrato.php" method="post">
        <label for="id_sucursal">Número de Sucursal:</label>
        <input type="text" id="id_sucursal" name="id_sucursal" required><br><br>
        <label for="id_cliente">Número de Cliente:</label>
        <input type="text" id="id_cliente" name="id_cliente" required><br><br>
        <label for="id_presupuestos">Número de Presupuesto:</label>
        <input type="text" id="id_presupuestos" name="id_presupuestos" required><br><br>
        <label for="solicitudCliente">Solicitud del Cliente:</label>
        <input type="text" id="solicitudCliente" name="solicitudCliente" required><br><br>
        <label for="duracionEstimada">Duración Estimada:</label>
        <input type="text" id="duracionEstimada" name="duracionEstimada" required><br><br>
        <label for="id_formaPago">Número de Forma de Pago:</label>
        <input type="text" id="id_formaPago" name="id_formaPago" required><br><br>
        <input type="submit" value="Agregar Contrato">
    </form>
    <a href="contrato.php">Volver a Lista de Contratos</a>
</body>
</html>
