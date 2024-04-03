<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_proveedor = $_POST["id_proveedor"];
    $fechaCompra = $_POST["fechaCompra"];
    $totalFactura = $_POST["totalFactura"];

    $query = "INSERT INTO compraVenta (id_proveedor, fechaCompra, totalFactura) 
              VALUES ('$id_proveedor', '$fechaCompra', '$totalFactura')";
    mysqli_query($conexion, $query);

    header("Location: compra.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Compra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Compra</h2>
    <form action="agregar_compra.php" method="post">
        <label for="id_proveedor">Número de Proveedor:</label>
        <input type="text" id="id_proveedor" name="id_proveedor" required><br><br>
        <label for="fechaCompra">Fecha de Compra:</label>
        <input type="date" id="fechaCompra" name="fechaCompra" required><br><br>
        <label for="totalFactura">Total de la Factura:</label>
        <input type="text" id="totalFactura" name="totalFactura" required><br><br>
        <input type="submit" value="Agregar Compra">
    </form>
    <a href="compra.php">Volver a la Lista de Compras</a>
</body>
</html>
