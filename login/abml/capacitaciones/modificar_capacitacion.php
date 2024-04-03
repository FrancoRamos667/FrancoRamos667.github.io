<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $detalleCapacitacion = $_POST["detalleCapacitacion"];

    $query = "UPDATE capacitaciones SET detalleCapacitacion='$detalleCapacitacion' WHERE id_capacitacion='$id'";
    mysqli_query($conexion, $query);

    header("Location: capacitacion.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM capacitaciones WHERE id_capacitacion='$id'";
    $result = mysqli_query($conexion, $query);
    $capacitacion = mysqli_fetch_assoc($result);
} else {
    $capacitacion = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Capacitación</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Capacitación</h2>
    <form action="modificar_capacitacion.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="detalleCapacitacion">Detalle de la Capacitación:</label>
        <input type="text" id="detalleCapacitacion" name="detalleCapacitacion" value="<?php echo isset($capacitacion['detalleCapacitacion']) ? $capacitacion['detalleCapacitacion'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Capacitación">
    </form>
    <a href="capacitacion.php">Volver a Avances de las Obras</a>
</body>
</html>
