<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fechaIncidencia = $_POST["fechaIncidencia"];
    $tipoIncidencia = $_POST["tipoIncidencia"];
    $descripcionIncidente = $_POST["descripcionIncidente"];

    $query = "UPDATE incidenciasobras SET fechaIncidencia='$fechaIncidencia', tipoIncidencia='$tipoIncidencia', descripcionIncidente='$descripcionIncidente' WHERE id_incidencia='$id'";
    mysqli_query($conexion, $query);

    header("Location: incidenciaObra.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM incidenciasobras WHERE id_incidencia='$id'";
    $result = mysqli_query($conexion, $query);
    $incidencia = mysqli_fetch_assoc($result);
} else {
    $incidencia = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Incidencia en Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Incidencia en Obra</h2>
    <form action="modificar_incidenciaObra.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fechaIncidencia">Fecha Incidencia:</label>
        <input type="date" id="fechaIncidencia" name="fechaIncidencia" value="<?php echo isset($incidencia['fechaIncidencia']) ? $incidencia['fechaIncidencia'] : ''; ?>" required><br><br>
        <label for="tipoIncidencia">Tipo Incidencia:</label>
        <input type="text" id="tipoIncidencia" name="tipoIncidencia" value="<?php echo isset($incidencia['tipoIncidencia']) ? $incidencia['tipoIncidencia'] : ''; ?>" required><br><br>
        <label for="descripcionIncidente">Descripción Incidente:</label>
        <textarea id="descripcionIncidente" name="descripcionIncidente" rows="4" required><?php echo isset($incidencia['descripcionIncidente']) ? $incidencia['descripcionIncidente'] : ''; ?></textarea><br><br>
        <input type="submit" value="Modificar Incidencia en Obra">
    </form>
    <a href="incidenciaObra.php">Volver a Incidencias en Obras</a>
</body>
</html>
