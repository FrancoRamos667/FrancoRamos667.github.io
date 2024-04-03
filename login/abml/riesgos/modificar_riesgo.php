<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_riesgo = $_POST["id_riesgo"];
    $riesgo = $_POST["riesgo"];
    $cumplimiento = $_POST["cumplimiento"];

    $query = "UPDATE riesgos SET riesgo='$riesgo', cumplimiento='$cumplimiento' WHERE id_riesgo='$id_riesgo'";
    mysqli_query($conexion, $query);

    header("Location: riesgo.php");
    exit();
}

// Obtener datos del riesgo si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM riesgos WHERE id_riesgo='$id'";
    $result = mysqli_query($conexion, $query);
    $riesgo = mysqli_fetch_assoc($result);
} else {
    $riesgo = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Riesgo</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Riesgo</h2>
    <form action="modificar_riesgo.php" method="post">
        <input type="hidden" name="id_riesgo" value="<?php echo $id; ?>">
        <label for="riesgo">Riesgo:</label>
        <input type="text" id="riesgo" name="riesgo" value="<?php echo isset($riesgo['riesgo']) ? $riesgo['riesgo'] : ''; ?>" required><br><br>
        <label for="cumplimiento">Cumplimiento:</label>
        <input type="text" id="cumplimiento" name="cumplimiento" value="<?php echo isset($riesgo['cumplimiento']) ? $riesgo['cumplimiento'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Riesgo">
    </form>
    <a href="riesgo.php">Volver a Listado de Riesgos</a>
</body>
</html>
