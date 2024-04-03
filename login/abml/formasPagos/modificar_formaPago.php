<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fechaPago = $_POST["fechaPago"];
    $montoPago = $_POST["montoPago"];
    $metodoPago = $_POST["metodoPago"];

    $query = "UPDATE formaspagos SET fechaPago='$fechaPago', montoPago='$montoPago', metodoPago='$metodoPago' WHERE id_formaPago='$id'";
    mysqli_query($conexion, $query);

    header("Location: formaPago.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM formaspagos WHERE id_formaPago='$id'";
    $result = mysqli_query($conexion, $query);
    $formaPago = mysqli_fetch_assoc($result);
} else {
    $formaPago = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Forma de Pago</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Forma de Pago</h2>
    <form action="modificar_formaPago.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fechaPago">Fecha de Pago:</label>
        <input type="date" id="fechaPago" name="fechaPago" value="<?php echo isset($formaPago['fechaPago']) ? $formaPago['fechaPago'] : ''; ?>" required><br><br>
        <label for="montoPago">Monto de Pago:</label>
        <input type="text" id="montoPago" name="montoPago" value="<?php echo isset($formaPago['montoPago']) ? $formaPago['montoPago'] : ''; ?>" required><br><br>
        <label for="metodoPago">Método de Pago:</label>
        <input type="text" id="metodoPago" name="metodoPago" value="<?php echo isset($formaPago['metodoPago']) ? $formaPago['metodoPago'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Forma de Pago">
    </form>
    <a href="formaPago.php">Volver a Formas de Pago</a>
</body>
</html>
