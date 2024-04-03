<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $id_proveedor = $_POST["id_proveedor"];
    $fechaEmision = $_POST["fechaEmision"];
    $montoTotal = $_POST["montoTotal"];
    $descripcionFactura = $_POST["descripcionFactura"];
    $estadoFactura = $_POST["estadoFactura"];

    $query = "UPDATE facturas SET id_proveedor='$id_proveedor', fechaEmision='$fechaEmision', 
              montoTotal='$montoTotal', descripcionFactura='$descripcionFactura', estadoFactura='$estadoFactura' 
              WHERE id_factura='$id'";
    mysqli_query($conexion, $query);

    header("Location: factura.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM facturas WHERE id_factura='$id'";
    $result = mysqli_query($conexion, $query);
    $factura = mysqli_fetch_assoc($result);
} else {
    $factura = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Factura</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Factura</h2>
    <form action="modificar_factura.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="id_proveedor">ID Proveedor:</label>
        <input type="text" id="id_proveedor" name="id_proveedor" value="<?php echo isset($factura['id_proveedor']) ? $factura['id_proveedor'] : ''; ?>" required><br><br>
        <label for="fechaEmision">Fecha de Emisión:</label>
        <input type="date" id="fechaEmision" name="fechaEmision" value="<?php echo isset($factura['fechaEmision']) ? $factura['fechaEmision'] : ''; ?>" required><br><br>
        <label for="montoTotal">Monto Total:</label>
        <input type="text" id="montoTotal" name="montoTotal" value="<?php echo isset($factura['montoTotal']) ? $factura['montoTotal'] : ''; ?>" required><br><br>
        <label for="descripcionFactura">Descripción:</label>
        <textarea id="descripcionFactura" name="descripcionFactura" required><?php echo isset($factura['descripcionFactura']) ? $factura['descripcionFactura'] : ''; ?></textarea><br><br>
        <label for="estadoFactura">Estado:</label>
        <input type="text" id="estadoFactura" name="estadoFactura" value="<?php echo isset($factura['estadoFactura']) ? $factura['estadoFactura'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Factura">
    </form>
    <a href="factura.php">Volver a Facturas</a>
</body>
</html>
