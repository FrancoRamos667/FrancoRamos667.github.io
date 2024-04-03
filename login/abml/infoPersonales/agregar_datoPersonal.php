<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_trabajador = $_POST["id_trabajador"];
    $id_domicilio = $_POST["id_domicilio"];
    $id_telefono = $_POST["id_telefono"];
    $id_infoLaboral = $_POST["id_infoLaboral"];

    $query = "INSERT INTO informacionespersonales (id_trabajador, id_domicilio, id_telefono, id_infoLaboral) VALUES ('$id_trabajador', '$id_domicilio', '$id_telefono', '$id_infoLaboral')";
    mysqli_query($conexion, $query);

    header("Location: datoPersonal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Datos Personales</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Datos Personales</h2>
    <form action="agregar_datoPersonal.php" method="post">
        <label for="id_trabajador">ID Trabajador:</label>
        <input type="text" id="id_trabajador" name="id_trabajador" required><br><br>
        <label for="id_domicilio">ID Domicilio:</label>
        <input type="text" id="id_domicilio" name="id_domicilio" required><br><br>
        <label for="id_telefono">ID Teléfono:</label>
        <input type="text" id="id_telefono" name="id_telefono" required><br><br>
        <label for="id_infoLaboral">ID Información Laboral:</label>
        <input type="text" id="id_infoLaboral" name="id_infoLaboral" required><br><br>
        <input type="submit" value="Agregar Datos Personales">
    </form>
    <a href="datoPersonal.php">Volver a Datos Personales</a>
</body>
</html>
