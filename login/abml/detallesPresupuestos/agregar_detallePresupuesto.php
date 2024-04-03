<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcionDetalle = $_POST["descripcionDetalle"];
    $cantidadPresupuesto = $_POST["cantidadPresupuesto"];
    $precioUnitarioPresupuesto = $_POST["precioUnitarioPresupuesto"];

    $query = "INSERT INTO detallesPresupuestos (descripcionDetalle, cantidadPresupuesto, precioUnitarioPresupuesto) 
              VALUES ('$descripcionDetalle', '$cantidadPresupuesto', '$precioUnitarioPresupuesto')";
    mysqli_query($conexion, $query);

    header("Location: detallePresupuesto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Detalle de Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Detalle de Presupuesto</h2>
    <form action="agregar_detallePresupuesto.php" method="post">
        <label for="descripcionDetalle">Descripción:</label>
        <input type="text" id="descripcionDetalle" name="descripcionDetalle" required><br><br>
        <label for="cantidadPresupuesto">Cantidad:</label>
        <input type="text" id="cantidadPresupuesto" name="cantidadPresupuesto" required><br><br>
        <label for="precioUnitarioPresupuesto">Precio Unitario:</label>
        <input type="text" id="precioUnitarioPresupuesto" name="precioUnitarioPresupuesto" required><br><br>
        <input type="submit" value="Agregar Detalle">
    </form>
    <a href="detallePresupuesto.php">Volver a Lista de Detalles de Presupuestos</a>
</body>
</html>
