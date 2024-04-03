<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_proveedor = $_POST["id_proveedor"];
    $fechaEmision = $_POST["fechaEmision"];
    $montoTotal = $_POST["montoTotal"];
    $descripcionFactura = $_POST["descripcionFactura"];
    $estadoFactura = $_POST["estadoFactura"];

    $query = "INSERT INTO facturas (id_proveedor, fechaEmision, montoTotal, descripcionFactura, estadoFactura) 
              VALUES ('$id_proveedor', '$fechaEmision', '$montoTotal', '$descripcionFactura', '$estadoFactura')";
    mysqli_query($conexion, $query);

    header("Location: factura.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Factura</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Factura</h2>
    <form action="agregar_factura.php" method="post">
        <label for="id_proveedor">ID Proveedor:</label>
        <input type="text" id="id_proveedor" name="id_proveedor" required><br><br>
        <label for="fechaEmision">Fecha de Emisión:</label>
        <input type="date" id="fechaEmision" name="fechaEmision" required><br><br>
        <label for="montoTotal">Monto Total:</label>
        <input type="text" id="montoTotal" name="montoTotal" required><br><br>
        <label for="descripcionFactura">Descripción:</label>
        <textarea id="descripcionFactura" name="descripcionFactura" required></textarea><br><br>
        <label for="estadoFactura">Estado:</label>
        <input type="text" id="estadoFactura" name="estadoFactura" required><br><br>
        <input type="submit" value="Agregar Factura">
    </form>
    <a href="factura.php">Volver a Facturas</a>
</body>
</html>
