<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $id_trabajador = $_POST["id_trabajador"];
    $id_domicilio = $_POST["id_domicilio"];
    $id_telefono = $_POST["id_telefono"];
    $id_infoLaboral = $_POST["id_infoLaboral"];

    $query = "UPDATE informacionespersonales SET id_trabajador='$id_trabajador', id_domicilio='$id_domicilio', id_telefono='$id_telefono', id_infoLaboral='$id_infoLaboral' WHERE id_info='$id'";
    mysqli_query($conexion, $query);

    header("Location: datoPersonal.php");
    exit();
}

// Obtener datos de los datos personales si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM informacionespersonales WHERE id_info='$id'";
    $result = mysqli_query($conexion, $query);
    $datoPersonal = mysqli_fetch_assoc($result);
} else {
    $datoPersonal = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Datos Personales</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Datos Personales</h2>
    <form action="modificar_datoPersonal.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="id_trabajador">ID Trabajador:</label>
        <input type="text" id="id_trabajador" name="id_trabajador" value="<?php echo isset($datoPersonal['id_trabajador']) ? $datoPersonal['id_trabajador'] : ''; ?>" required><br><br>
        <label for="id_domicilio">ID Domicilio:</label>
        <input type="text" id="id_domicilio" name="id_domicilio" value="<?php echo isset($datoPersonal['id_domicilio']) ? $datoPersonal['id_domicilio'] : ''; ?>" required><br><br>
        <label for="id_telefono">ID Teléfono:</label>
        <input type="text" id="id_telefono" name="id_telefono" value="<?php echo isset($datoPersonal['id_telefono']) ? $datoPersonal['id_telefono'] : ''; ?>" required><br><br>
        <label for="id_infoLaboral">ID Información Laboral:</label>
        <input type="text" id="id_infoLaboral" name="id_infoLaboral" value="<?php echo isset($datoPersonal['id_infoLaboral']) ? $datoPersonal['id_infoLaboral'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Datos Personales">
    </form>
    <a href="datoPersonal.php">Volver a Datos Personales</a>
</body>
</html>

