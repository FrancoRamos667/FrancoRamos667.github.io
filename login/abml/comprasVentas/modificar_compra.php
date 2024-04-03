<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_compra = $_POST["id_compra"];
    $id_proveedor = $_POST["id_proveedor"];
    $fechaCompra = $_POST["fechaCompra"];
    $totalFactura = $_POST["totalFactura"];

    $query = "UPDATE compraVenta SET id_proveedor='$id_proveedor', fechaCompra='$fechaCompra', totalFactura='$totalFactura' WHERE id_compra='$id_compra'";
    mysqli_query($conexion, $query);

    header("Location: compra.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM compraVenta WHERE id_compra='$id'";
    $result = mysqli_query($conexion, $query);
    $compra = mysqli_fetch_assoc($result);
} else {
    $compra = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Compra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Compra</h2>
    <form action="modificar_compra.php" method="post">
        <input type="hidden" name="id_compra" value="<?php echo $id; ?>">
        <label for="id_proveedor">Número de Proveedor:</label>
        <input type="text" id="id_proveedor" name="id_proveedor" value="<?php echo isset($compra['id_proveedor']) ? $compra['id_proveedor'] : ''; ?>" required><br><br>
        <label for="fechaCompra">Fecha de Compra:</label>
        <input type="date" id="fechaCompra" name="fechaCompra" value="<?php echo isset($compra['fechaCompra']) ? $compra['fechaCompra'] : ''; ?>" required><br><br>
        <label for="totalFactura">Total de la Factura:</label>
        <input type="text" id="totalFactura" name="totalFactura" value="<?php echo isset($compra['totalFactura']) ? $compra['totalFactura'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Compra">
    </form>
    <a href="compra.php">Volver a la Lista de Compras</a>
</body>
</html>
