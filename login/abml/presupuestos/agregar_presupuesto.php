<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $costoMaterial = $_POST["costoMaterial"];
    $costoPersonal = $_POST["costoPersonal"];
    $costoTotal = $_POST["costoTotal"];
    $estadoPresupuesto = $_POST["estadoPresupuesto"];

    $query = "INSERT INTO presupuestos (costoMaterial, costoPersonal, costoTotal, estadoPresupuesto) VALUES ('$costoMaterial', '$costoPersonal', '$costoTotal', '$estadoPresupuesto')";
    mysqli_query($conexion, $query);

    header("Location: presupuesto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Presupuesto</h2>
    <form action="agregar_presupuesto.php" method="post">
        <label for="costoMaterial">Costo de Material:</label>
        <input type="number" id="costoMaterial" name="costoMaterial" step="0.01" required><br><br>
        <label for="costoPersonal">Costo de Personal:</label>
        <input type="number" id="costoPersonal" name="costoPersonal" step="0.01" required><br><br>
        <label for="costoTotal">Costo Total:</label>
        <input type="number" id="costoTotal" name="costoTotal" step="0.01" required><br><br>
        <label for="estadoPresupuesto">Estado del Presupuesto:</label>
        <input type="text" id="estadoPresupuesto" name="estadoPresupuesto" required><br><br>
        <input type="submit" value="Agregar Presupuesto">
    </form>
    <a href="presupuesto.php">Volver a Presupuestos</a>
</body>
</html>
