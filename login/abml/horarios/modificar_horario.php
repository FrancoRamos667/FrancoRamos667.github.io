<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $horaEntrada = $_POST["horaEntrada"];
    $horaSalida = $_POST["horaSalida"];
    $diasLaborales = $_POST["diasLaborales"];
    $descripcion = $_POST["descripcion"];

    $query = "UPDATE horarios 
              SET horaEntrada='$horaEntrada', horaSalida='$horaSalida', diasLaborales='$diasLaborales', Descripción='$descripcion' 
              WHERE id_horario='$id'";
    mysqli_query($conexion, $query);

    header("Location: horario.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM horarios WHERE id_horario='$id'";
    $result = mysqli_query($conexion, $query);
    $horario = mysqli_fetch_assoc($result);
} else {
    $horario = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Horario</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Horario</h2>
    <form action="modificar_horario.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="horaEntrada">Hora de Entrada:</label>
        <input type="time" id="horaEntrada" name="horaEntrada" value="<?php echo isset($horario['horaEntrada']) ? $horario['horaEntrada'] : ''; ?>" required><br><br>
        <label for="horaSalida">Hora de Salida:</label>
        <input type="time" id="horaSalida" name="horaSalida" value="<?php echo isset($horario['horaSalida']) ? $horario['horaSalida'] : ''; ?>" required><br><br>
        <label for="diasLaborales">Días Laborales:</label>
        <input type="text" id="diasLaborales" name="diasLaborales" value="<?php echo isset($horario['diasLaborales']) ? $horario['diasLaborales'] : ''; ?>" required><br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo isset($horario['Descripción']) ? $horario['Descripción'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Horario">
    </form>
    <a href="horario.php">Volver a Horarios</a>
</body>
</html>
