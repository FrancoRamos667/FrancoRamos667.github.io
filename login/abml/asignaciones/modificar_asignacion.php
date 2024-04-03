<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_asignacion = $_POST["id_asignacion"];
    $id_vehiculo = $_POST["id_vehiculo"];
    $id_deposito = $_POST["id_deposito"];

    $query = "UPDATE asignaciones SET id_vehiculo='$id_vehiculo', id_deposito='$id_deposito' WHERE id_asignacion='$id_asignacion'";
    mysqli_query($conexion, $query);

    header("Location: asignaciones.php");
    exit();
}

$id_asignacion = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id_asignacion) {
    $query = "SELECT * FROM asignaciones WHERE id_asignacion='$id_asignacion'";
    $result = mysqli_query($conexion, $query);
    $asignacion = mysqli_fetch_assoc($result);
} else {
    $asignacion = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Asignación</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Asignación</h2>
    <form action="modificar_asignacion.php" method="post">
        <input type="hidden" name="id_asignacion" value="<?php echo $id_asignacion; ?>">
        <label for="id_vehiculo">Número de Vehículo:</label>
        <input type="text" id="id_vehiculo" name="id_vehiculo" value="<?php echo isset($asignacion['id_vehiculo']) ? $asignacion['id_vehiculo'] : ''; ?>" required><br><br>
        <label for="id_deposito">Número de Depósito:</label>
        <input type="text" id="id_deposito" name="id_deposito" value="<?php echo isset($asignacion['id_deposito']) ? $asignacion['id_deposito'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Asignación">
    </form>
    <a href="asignacion.php">Volver a Asignaciones de Vehículos</a>
</body>
</html>
