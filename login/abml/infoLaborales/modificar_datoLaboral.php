<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fechaInicio = $_POST["fechaInicio"];
    $faltas = $_POST["faltas"];
    $id_horario = $_POST["id_horario"];

    $query = "UPDATE informacioneslaborales 
              SET fechaInicio='$fechaInicio', faltas='$faltas', id_horario='$id_horario' 
              WHERE id_infoLaboral='$id'";
    mysqli_query($conexion, $query);

    header("Location: datoLaboral.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM informacioneslaborales WHERE id_infoLaboral='$id'";
    $result = mysqli_query($conexion, $query);
    $datoLaboral = mysqli_fetch_assoc($result);
} else {
    $datoLaboral = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Dato Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Dato Laboral</h2>
    <form action="modificar_datoLaboral.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo isset($datoLaboral['fechaInicio']) ? $datoLaboral['fechaInicio'] : ''; ?>" required><br><br>
        <label for="faltas">Faltas:</label>
        <input type="number" id="faltas" name="faltas" value="<?php echo isset($datoLaboral['faltas']) ? $datoLaboral['faltas'] : ''; ?>" required><br><br>
        <label for="id_horario">ID de Horario:</label>
        <input type="text" id="id_horario" name="id_horario" value="<?php echo isset($datoLaboral['id_horario']) ? $datoLaboral['id_horario'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Dato Laboral">
    </form>
    <a href="datoLaboral.php">Volver a Datos Laborales</a>
</body>
</html>
