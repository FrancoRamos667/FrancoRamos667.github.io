<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $material = $_POST["material"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];

    $query = "UPDATE materiales SET material='$material', descripcion='$descripcion', cantidadInventario='$cantidad' WHERE id_material='$id'";
    mysqli_query($conexion, $query);

    header("Location: material.php");
    exit();
}

// Obtener datos del material si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM materiales WHERE id_material='$id'";
    $result = mysqli_query($conexion, $query);
    $material = mysqli_fetch_assoc($result);
} else {
    $material = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Material</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Material</h2>
    <form action="modificar_material.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="material">Material:</label>
        <input type="text" id="material" name="material" value="<?php echo isset($material['material']) ? $material['material'] : ''; ?>" required><br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo isset($material['descripcion']) ? $material['descripcion'] : ''; ?>" required><br><br>
        <label for="cantidad">Cantidad en Inventario:</label>
        <input type="text" id="cantidad" name="cantidad" value="<?php echo isset($material['cantidadInventario']) ? $material['cantidadInventario'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Material">
    </form>
    <a href="material.php">Volver a Materiales</a>
</body>
</html>
