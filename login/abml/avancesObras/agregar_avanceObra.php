<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_avance = $_POST["fecha_avance"];
    $descripcion_avance = $_POST["descripcion_avance"];

    $query = "INSERT INTO avancesobras (fechaAvance, descripcionAvance) 
              VALUES ('$fecha_avance', '$descripcion_avance')";
    mysqli_query($conexion, $query);

    header("Location: avanceObra.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Avance de Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Avance de Obra</h2>
    <form action="agregar_avanceObra.php" method="post">
        <label for="fecha_avance">Fecha del Avance:</label>
        <input type="text" id="fecha_avance" name="fecha_avance" required><br><br>
        <label for="descripcion_avance">Descripción del Avance:</label>
        <input type="text" id="descripcion_avance" name="descripcion_avance" required><br><br>
        <input type="submit" value="Agregar Avance de Obra">
    </form>
    <a href="avanceObra.php">Volver a Avances de Obras</a>
</body>
</html>
