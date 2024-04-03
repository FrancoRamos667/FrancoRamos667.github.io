<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $costoMaterial = $_POST["costoMaterial"];
    $costoPersonal = $_POST["costoPersonal"];
    $costoTotal = $_POST["costoTotal"];
    $estadoPresupuesto = $_POST["estadoPresupuesto"];

    $query = "UPDATE presupuestos SET costoMaterial='$costoMaterial', costoPersonal='$costoPersonal', costoTotal='$costoTotal', estadoPresupuesto='$estadoPresupuesto' WHERE id_presupuesto='$id'";
    mysqli_query($conexion, $query);

    header("Location: presupuesto.php");
    exit();
}

// Obtener datos del presupuesto si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM presupuestos WHERE id_presupuesto='$id'";
    $result = mysqli_query($conexion, $query);
    $presupuesto = mysqli_fetch_assoc($result);
} else {
    $presupuesto = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Presupuesto</h2>
    <form action="modificar_presupuesto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="costoMaterial">Costo de Material:</label>
        <input type="number" id="costoMaterial" name="costoMaterial" value="<?php echo isset($presupuesto['costoMaterial']) ? $presupuesto['costoMaterial'] : ''; ?>" step="0.01" required><br><br>
        <label for="costoPersonal">Costo de Personal:</label>
        <input type="number" id="costoPersonal" name="costoPersonal" value="<?php echo isset($presupuesto['costoPersonal']) ? $presupuesto['costoPersonal'] : ''; ?>" step="0.01" required><br><br>
        <label for="costoTotal">Costo Total:</label>
        <input type="number" id="costoTotal" name="costoTotal" value="<?php echo isset($presupuesto['costoTotal']) ? $presupuesto['costoTotal'] : ''; ?>" step="0.01" required><br><br>
        <label for="estadoPresupuesto">Estado del Presupuesto:</label>
        <input type="text" id="estadoPresupuesto" name="estadoPresupuesto" value="<?php echo isset($presupuesto['estadoPresupuesto']) ? $presupuesto['estadoPresupuesto'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Presupuesto">
    </form>
    <a href="presupuesto.php">Volver a Presupuestos</a>
</body>
</html>
