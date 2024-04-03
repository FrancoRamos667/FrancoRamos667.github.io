<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $contacto = $_POST["contacto"];
    $producto = $_POST["producto"];
    $precioUnidad = $_POST["precioUnidad"];

    $query = "UPDATE proveedores SET Contacto='$contacto', Producto='$producto', PrecioUnidad='$precioUnidad' WHERE id_proveedor='$id'";
    mysqli_query($conexion, $query);

    header("Location: proveedor.php");
    exit();
}

// Obtener datos del proveedor si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM proveedores WHERE id_proveedor='$id'";
    $result = mysqli_query($conexion, $query);
    $proveedor = mysqli_fetch_assoc($result);
} else {
    $proveedor = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Proveedor</h2>
    <form action="modificar_proveedor.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="contacto">Contacto:</label>
        <input type="text" id="contacto" name="contacto" value="<?php echo isset($proveedor['Contacto']) ? $proveedor['Contacto'] : ''; ?>" required><br><br>
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" value="<?php echo isset($proveedor['Producto']) ? $proveedor['Producto'] : ''; ?>" required><br><br>
        <label for="precioUnidad">Precio por Unidad:</label>
        <input type="number" id="precioUnidad" name="precioUnidad" value="<?php echo isset($proveedor['PrecioUnidad']) ? $proveedor['PrecioUnidad'] : ''; ?>" step="0.01" required><br><br>
        <input type="submit" value="Modificar Proveedor">
    </form>
    <a href="proveedor.php">Volver a Proveedores</a>
</body>
</html>
