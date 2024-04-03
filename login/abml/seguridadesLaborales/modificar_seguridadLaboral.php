<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $detallesSeguridad = $_POST["detallesSeguridad"];

    $query = "UPDATE seguridadeslaborales SET detalleSeguridad='$detallesSeguridad' WHERE id_seguridad='$id'";
    mysqli_query($conexion, $query);

    header("Location: seguridadLaboral.php");
    exit();
}

// Obtener datos del detalle de seguridad laboral si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM seguridadeslaborales WHERE id_seguridad='$id'";
    $result = mysqli_query($conexion, $query);
    $seguridadLaboral = mysqli_fetch_assoc($result);
} else {
    $seguridadLaboral = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Detalle de Seguridad Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Detalle de Seguridad Laboral</h2>
    <form action="modificar_seguridadLaboral.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="detallesSeguridad">Detalles de Seguridad Laboral:</label>
        <input type="text" id="detallesSeguridad" name="detallesSeguridad" value="<?php echo isset($seguridadLaboral['detalleSeguridad']) ? $seguridadLaboral['detalleSeguridad'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Detalle de Seguridad Laboral">
    </form>
    <a href="seguridadLaboral.php">Volver a Detalles de Seguridad Laboral</a>
</body>
</html>
