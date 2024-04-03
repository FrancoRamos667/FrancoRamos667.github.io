<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $sucursal = $_POST["sucursal"];
    $ubicacion = $_POST["ubicacion"];
    $tamaño = $_POST["tamaño"];

    $query = "UPDATE sucursal SET sucursal='$sucursal', ubicacion='$ubicacion', tamaño='$tamaño' WHERE id_sucursal='$id'";
    mysqli_query($conexion, $query);

    header("Location: ingreso.php");
    exit();
}

// Obtener datos de la sucursal si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM sucursal WHERE id_sucursal='$id'";
    $result = mysqli_query($conexion, $query);
    $sucursal = mysqli_fetch_assoc($result);
} else {
    $sucursal = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Sucursal</title>
    <link rel="stylesheet" type="text/css" href="abml\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Sucursal</h2>
    <form action="modificar_sucursal.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="sucursal">Nombre de la Sucursal:</label>
        <input type="text" id="sucursal" name="sucursal" value="<?php echo isset($sucursal['sucursal']) ? $sucursal['sucursal'] : ''; ?>" required><br><br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" value="<?php echo isset($sucursal['ubicacion']) ? $sucursal['ubicacion'] : ''; ?>" required><br><br>
        <label for="tamaño">Tamaño:</label>
        <input type="text" id="tamaño" name="tamaño" value="<?php echo isset($sucursal['tamaño']) ? $sucursal['tamaño'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Sucursal">
    </form>
    <a href="ingreso.php">Volver a Sucursales</a>
</body>
</html>
