<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDetalleCompra = $_POST["idDetalleCompra"];
    $idCompra = $_POST["idCompra"];
    $idMaterial = $_POST["idMaterial"];
    $precio = $_POST["precio"];

    $query = "UPDATE detallecompra SET id_compra='$idCompra', id_material='$idMaterial', precio='$precio' WHERE id_compraDetalle='$idDetalleCompra'";
    mysqli_query($conexion, $query);

    header("Location: detalleCompra.php");
    exit();
}

// Obtener datos del detalle de compra si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM detallecompra WHERE id_compraDetalle='$id'";
    $result = mysqli_query($conexion, $query);
    $detalleCompra = mysqli_fetch_assoc($result);
} else {
    $detalleCompra = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Detalle de Compra</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleModificar.css">
</head>
<body>
    <h2>Modificar Detalle de Compra</h2>
    <form action="modificar_detalleCompra.php" method="post">
        <input type="hidden" name="idDetalleCompra" value="<?php echo $id; ?>">
        <label for="idCompra">ID de Compra:</label>
        <input type="text" id="idCompra" name="idCompra" value="<?php echo isset($detalleCompra['id_compra']) ? $detalleCompra['id_compra'] : ''; ?>" required><br><br>
        <label for="idMaterial">ID de Material:</label>
        <input type="text" id="idMaterial" name="idMaterial" value="<?php echo isset($detalleCompra['id_material']) ? $detalleCompra['id_material'] : ''; ?>" required><br><br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" value="<?php echo isset($detalleCompra['precio']) ? $detalleCompra['precio'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Detalle de Compra">
    </form>
    <a href="detalleCompra.php">Volver a Detalles de Compra</a>
</body>
</html>
