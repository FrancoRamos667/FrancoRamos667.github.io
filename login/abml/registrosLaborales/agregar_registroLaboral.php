<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_informacionLaboral = $_POST["id_informacionLaboral"];
    $id_seguridad = $_POST["id_seguridad"];
    $id_capacitacion = $_POST["id_capacitacion"];
    $id_ingreso = $_POST["id_ingreso"];
    $id_impuesto = $_POST["id_impuesto"];
    $id_seguro = $_POST["id_seguro"];
    $id_recursoHumano = $_POST["id_recursoHumano"];
    $id_riesgo = $_POST["id_riesgo"];

    $query = "INSERT INTO registrolaboral (id_informacionLaboral, id_seguridad, id_capacitacion, id_ingreso, id_impuesto, id_seguro, id_recursoHumano, id_riesgo) VALUES ('$id_informacionLaboral', '$id_seguridad', '$id_capacitacion', '$id_ingreso', '$id_impuesto', '$id_seguro', '$id_recursoHumano', '$id_riesgo')";
    mysqli_query($conexion, $query);

    header("Location: registroLaboral.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Registro Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Registro Laboral</h2>
    <form action="agregar_registroLaboral.php" method="post">
        <label for="id_informacionLaboral">ID Información Laboral:</label>
        <input type="text" id="id_informacionLaboral" name="id_informacionLaboral" required><br><br>
        <label for="id_seguridad">ID Seguridad:</label>
        <input type="text" id="id_seguridad" name="id_seguridad" required><br><br>
        <label for="id_capacitacion">ID Capacitación:</label>
        <input type="text" id="id_capacitacion" name="id_capacitacion" required><br><br>
        <label for="id_ingreso">ID Ingreso:</label>
        <input type="text" id="id_ingreso" name="id_ingreso" required><br><br>
        <label for="id_impuesto">ID Impuesto:</label>
        <input type="text" id="id_impuesto" name="id_impuesto" required><br><br>
        <label for="id_seguro">ID Seguro:</label>
        <input type="text" id="id_seguro" name="id_seguro" required><br><br>
        <label for="id_recursoHumano">ID Recurso Humano:</label>
        <input type="text" id="id_recursoHumano" name="id_recursoHumano" required><br><br>
        <label for="id_riesgo">ID Riesgo:</label>
        <input type="text" id="id_riesgo" name="id_riesgo" required><br><br>
        <input type="submit" value="Agregar Registro Laboral">
    </form>
    <a href="registroLaboral.php">Volver a Listado de Registros Laborales</a>
</body>
</html>
