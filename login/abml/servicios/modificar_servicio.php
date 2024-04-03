<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $mantenimiento = $_POST["mantenimiento"];
    $otrosServicio = $_POST["otrosServicio"];

    $query = "UPDATE servicios SET mantenimiento='$mantenimiento', otrosServicio='$otrosServicio' WHERE id_servicio='$id'";
    mysqli_query($conexion, $query);

    header("Location: servicio.php");
    exit();
}

// Obtener datos del servicio si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM servicios WHERE id_servicio='$id'";
    $result = mysqli_query($conexion, $query);
    $servicio = mysqli_fetch_assoc($result);
} else {
    $servicio = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Servicio</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Servicio</h2>
    <form action="modificar_servicio.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="mantenimiento">Mantenimiento:</label>
        <input type="text" id="mantenimiento" name="mantenimiento" value="<?php echo isset($servicio['mantenimiento']) ? $servicio['mantenimiento'] : ''; ?>" required><br><br>
        <label for="otrosServicio">Otros Servicios:</label>
        <input type="text" id="otrosServicio" name="otrosServicio" value="<?php echo isset($servicio['otrosServicio']) ? $servicio['otrosServicio'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Servicio">
    </form>
    <a href="servicio.php">Volver a Servicios</a>
</body>
</html>
