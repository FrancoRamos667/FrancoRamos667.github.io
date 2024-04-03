<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaIncidencia = $_POST["fechaIncidencia"];
    $tipoIncidencia = $_POST["tipoIncidencia"];
    $descripcionIncidente = $_POST["descripcionIncidente"];

    $query = "INSERT INTO incidenciasobras (fechaIncidencia, tipoIncidencia, descripcionIncidente) VALUES ('$fechaIncidencia', '$tipoIncidencia', '$descripcionIncidente')";
    mysqli_query($conexion, $query);

    header("Location: incidenciaObra.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Incidencia en Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Incidencia en Obra</h2>
    <form action="agregar_incidenciaObra.php" method="post">
        <label for="fechaIncidencia">Fecha Incidencia:</label>
        <input type="date" id="fechaIncidencia" name="fechaIncidencia" required><br><br>
        <label for="tipoIncidencia">Tipo Incidencia:</label>
        <input type="text" id="tipoIncidencia" name="tipoIncidencia" required><br><br>
        <label for="descripcionIncidente">Descripción Incidente:</label>
        <textarea id="descripcionIncidente" name="descripcionIncidente" rows="4" required></textarea><br><br>
        <input type="submit" value="Agregar Incidencia en Obra">
    </form>
    <a href="incidenciaObra.php">Volver a Incidencias en Obras</a>
</body>
</html>
