<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fechaOperacion = $_POST["fechaOperacion"];
    $horarioOperacion = $_POST["horarioOperacion"];
    $horarioMantenimiento = $_POST["horarioMantenimiento"];

    $query = "UPDATE horariosDepositos 
              SET fechaOperacion='$fechaOperacion', horarioOperacion='$horarioOperacion', horarioMantenimiento='$horarioMantenimiento' 
              WHERE id_horarioDeposito='$id'";
    mysqli_query($conexion, $query);

    header("Location: horarioDeposito.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM horariosDepositos WHERE id_horarioDeposito='$id'";
    $result = mysqli_query($conexion, $query);
    $horarioDeposito = mysqli_fetch_assoc($result);
} else {
    $horarioDeposito = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Horario de Depósito</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Horario de Depósito</h2>
    <form action="modificar_horarioDeposito.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fechaOperacion">Fecha de Operación:</label>
        <input type="date" id="fechaOperacion" name="fechaOperacion" value="<?php echo isset($horarioDeposito['fechaOperacion']) ? $horarioDeposito['fechaOperacion'] : ''; ?>" required><br><br>
        <label for="horarioOperacion">Horario de Operación:</label>
        <input type="time" id="horarioOperacion" name="horarioOperacion" value="<?php echo isset($horarioDeposito['horarioOperacion']) ? $horarioDeposito['horarioOperacion'] : ''; ?>" required><br><br>
        <label for="horarioMantenimiento">Horario de Mantenimiento:</label>
        <input type="time" id="horarioMantenimiento" name="horarioMantenimiento" value="<?php echo isset($horarioDeposito['horarioMantenimiento']) ? $horarioDeposito['horarioMantenimiento'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Horario de Depósito">
    </form>
    <a href="horarioDeposito.php">Volver a Horarios de Depósito</a>
</body>
</html>
