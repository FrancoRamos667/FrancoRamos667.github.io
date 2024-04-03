<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_detallePresupuesto = $_POST["id_detallePresupuesto"];
    $descripcionDetalle = $_POST["descripcionDetalle"];
    $cantidadPresupuesto = $_POST["cantidadPresupuesto"];
    $precioUnitarioPresupuesto = $_POST["precioUnitarioPresupuesto"];

    $query = "UPDATE detallesPresupuestos SET 
              descripcionDetalle='$descripcionDetalle', 
              cantidadPresupuesto='$cantidadPresupuesto', 
              precioUnitarioPresupuesto='$precioUnitarioPresupuesto' 
              WHERE id_detallePresupuesto='$id_detallePresupuesto'";
    mysqli_query($conexion, $query);

    header("Location: detallePresupuesto.php");
    exit();
}

if (isset($_GET["id"])) {
    $id_detallePresupuesto = $_GET["id"];
    $query = "SELECT * FROM detallesPresupuestos WHERE id_detallePresupuesto='$id_detallePresupuesto'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: detallePresupuesto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Detalle de Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Modificar Detalle de Presupuesto</h2>
    <form action="modificar_detallePresupuesto.php" method="post">
        <input type="hidden" name="id_detallePresupuesto" value="<?php echo $row['id_detallePresupuesto']; ?>">
        <label for="descripcionDetalle">Descripción:</label>
        <input type="text" id="descripcionDetalle" name="descripcionDetalle" value="<?php echo $row['descripcionDetalle']; ?>" required><br><br>
        <label for="cantidadPresupuesto">Cantidad:</label>
        <input type="text" id="cantidadPresupuesto" name="cantidadPresupuesto" value="<?php echo $row['cantidadPresupuesto']; ?>" required><br><br>
        <label for="precioUnitarioPresupuesto">Precio Unitario:</label>
        <input type="text" id="precioUnitarioPresupuesto" name="precioUnitarioPresupuesto" value="<?php echo $row['precioUnitarioPresupuesto']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="detallePresupuesto.php">Cancelar</a>
</body>
</html>
