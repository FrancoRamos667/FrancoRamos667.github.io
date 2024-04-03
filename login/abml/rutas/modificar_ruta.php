<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_ruta = $_POST["id_ruta"];
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $distancia = $_POST["distancia"];
    $duracionEstimada = $_POST["duracionEstimada"];

    $query = "UPDATE rutas SET origen='$origen', destino='$destino', distancia='$distancia', duracionEstimada='$duracionEstimada' WHERE id_ruta='$id_ruta'";
    mysqli_query($conexion, $query);

    header("Location: ruta.php");
    exit();
}

// Obtener datos de la ruta si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM rutas WHERE id_ruta='$id'";
    $result = mysqli_query($conexion, $query);
    $ruta = mysqli_fetch_assoc($result);
} else {
    $ruta = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Ruta</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Ruta</h2>
    <form action="modificar_ruta.php" method="post">
        <input type="hidden" name="id_ruta" value="<?php echo $id; ?>">
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" value="<?php echo isset($ruta['origen']) ? $ruta['origen'] : ''; ?>" required><br><br>
        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" value="<?php echo isset($ruta['destino']) ? $ruta['destino'] : ''; ?>" required><br><br>
        <label for="distancia">Distancia:</label>
        <input type="text" id="distancia" name="distancia" value="<?php echo isset($ruta['distancia']) ? $ruta['distancia'] : ''; ?>" required><br><br>
        <label for="duracionEstimada">Duración Estimada:</label>
        <input type="text" id="duracionEstimada" name="duracionEstimada" value="<?php echo isset($ruta['duracionEstimada']) ? $ruta['duracionEstimada'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Ruta">
    </form>
    <a href="ruta.php">Volver a Listado de Rutas</a>
</body>
</html>
