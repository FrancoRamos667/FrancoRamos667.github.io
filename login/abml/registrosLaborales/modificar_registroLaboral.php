<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_registro = $_POST["id_registro"];
    $id_informacionLaboral = $_POST["id_informacionLaboral"];
    $id_seguridad = $_POST["id_seguridad"];
    $id_capacitacion = $_POST["id_capacitacion"];
    $id_ingreso = $_POST["id_ingreso"];
    $id_impuesto = $_POST["id_impuesto"];
    $id_seguro = $_POST["id_seguro"];
    $id_recursoHumano = $_POST["id_recursoHumano"];
    $id_riesgo = $_POST["id_riesgo"];

    $query = "UPDATE registrolaboral SET id_informacionLaboral='$id_informacionLaboral', id_seguridad='$id_seguridad', id_capacitacion='$id_capacitacion', id_ingreso='$id_ingreso', id_impuesto='$id_impuesto', id_seguro='$id_seguro', id_recursoHumano='$id_recursoHumano', id_riesgo='$id_riesgo' WHERE id_registro='$id_registro'";
    mysqli_query($conexion, $query);

    header("Location: registroLaboral.php");
    exit();
}

// Obtener datos del registro laboral si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM registrolaboral WHERE id_registro='$id'";
    $result = mysqli_query($conexion, $query);
    $registroLaboral = mysqli_fetch_assoc($result);
} else {
    $registroLaboral = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Registro Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Registro Laboral</h2>
    <form action="modificar_registroLaboral.php" method="post">
        <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
        <label for="id_informacionLaboral">ID Información Laboral:</label>
        <input type="text" id="id_informacionLaboral" name="id_informacionLaboral" value="<?php echo isset($registroLaboral['id_informacionLaboral']) ? $registroLaboral['id_informacionLaboral'] : ''; ?>" required><br><br>
        <label for="id_seguridad">ID Seguridad:</label>
        <input type="text" id="id_seguridad" name="id_seguridad" value="<?php echo isset($registroLaboral['id_seguridad']) ? $registroLaboral['id_seguridad'] : ''; ?>" required><br><br>
        <label for="id_capacitacion">ID Capacitación:</label>
        <input type="text" id="id_capacitacion" name="id_capacitacion" value="<?php echo isset($registroLaboral['id_capacitacion']) ? $registroLaboral['id_capacitacion'] : ''; ?>" required><br><br>
        <label for="id_ingreso">ID Ingreso:</label>
        <input type="text" id="id_ingreso" name="id_ingreso" value="<?php echo isset($registroLaboral['id_ingreso']) ? $registroLaboral['id_ingreso'] : ''; ?>" required><br><br>
        <label for="id_impuesto">ID Impuesto:</label>
        <input type="text" id="id_impuesto" name="id_impuesto" value="<?php echo isset($registroLaboral['id_impuesto']) ? $registroLaboral['id_impuesto'] : ''; ?>" required><br><br>
        <label for="id_seguro">ID Seguro:</label>
        <input type="text" id="id_seguro" name="id_seguro" value="<?php echo isset($registroLaboral['id_seguro']) ? $registroLaboral['id_seguro'] : ''; ?>" required><br><br>
        <label for="id_recursoHumano">ID Recurso Humano:</label>
        <input type="text" id="id_recursoHumano" name="id_recursoHumano" value="<?php echo isset($registroLaboral['id_recursoHumano']) ? $registroLaboral['id_recursoHumano'] : ''; ?>" required><br><br>
        <label for="id_riesgo">ID Riesgo:</label>
        <input type="text" id="id_riesgo" name="id_riesgo" value="<?php echo isset($registroLaboral['id_riesgo']) ? $registroLaboral['id_riesgo'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Registro Laboral">
    </form>
    <a href="registroLaboral.php">Volver a Listado de Registros Laborales</a>
</body>
</html>
