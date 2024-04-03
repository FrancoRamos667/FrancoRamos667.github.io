<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $montoIngreso = $_POST["montoIngreso"];
    $fechaIngreso = $_POST["fechaIngreso"];

    $query = "UPDATE ingresos SET montoIngreso='$montoIngreso', fechaIngreso='$fechaIngreso' WHERE id_ingreso='$id'";
    mysqli_query($conexion, $query);

    header("Location: ingreso.php");
    exit();
}

// Obtener datos del ingreso si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM ingresos WHERE id_ingreso='$id'";
    $result = mysqli_query($conexion, $query);
    $ingreso = mysqli_fetch_assoc($result);
} else {
    $ingreso = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Ingreso</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Ingreso</h2>
    <form action="modificar_ingreso.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="montoIngreso">Monto:</label>
        <input type="text" id="montoIngreso" name="montoIngreso" value="<?php echo isset($ingreso['montoIngreso']) ? $ingreso['montoIngreso'] : ''; ?>" required><br><br>
        <label for="fechaIngreso">Fecha:</label>
        <input type="date" id="fechaIngreso" name="fechaIngreso" value="<?php echo isset($ingreso['fechaIngreso']) ? $ingreso['fechaIngreso'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Ingreso">
    </form>
    <a href="ingreso.php">Volver a Ingresos</a>
</body>
</html>
