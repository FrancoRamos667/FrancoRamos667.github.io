<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDetalleDeposito = $_POST["idDetalleDeposito"];
    $idDeposito = $_POST["idDeposito"];
    $accesibilidad = $_POST["accesibilidad"];
    $edificio = $_POST["edificio"];

    $query = "UPDATE detallesdepositos SET id_deposito='$idDeposito', accesibilidad='$accesibilidad', edificio='$edificio' WHERE id_detalleDeposito='$idDetalleDeposito'";
    mysqli_query($conexion, $query);

    header("Location: detalleDeposito.php");
    exit();
}

// Obtener datos del detalle de depósito si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM detallesdepositos WHERE id_detalleDeposito='$id'";
    $result = mysqli_query($conexion, $query);
    $detalleDeposito = mysqli_fetch_assoc($result);
} else {
    $detalleDeposito = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Detalle de Depósito</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleModificar.css">
</head>
<body>
    <h2>Modificar Detalle de Depósito</h2>
    <form action="modificar_detalleDeposito.php" method="post">
        <input type="hidden" name="idDetalleDeposito" value="<?php echo $id; ?>">
        <label for="idDeposito">ID de Depósito:</label>
        <input type="text" id="idDeposito" name="idDeposito" value="<?php echo isset($detalleDeposito['id_deposito']) ? $detalleDeposito['id_deposito'] : ''; ?>" required><br><br>
        <label for="accesibilidad">Accesibilidad:</label>
        <input type="text" id="accesibilidad" name="accesibilidad" value="<?php echo isset($detalleDeposito['accesibilidad']) ? $detalleDeposito['accesibilidad'] : ''; ?>" required><br><br>
        <label for="edificio">Edificio:</label>
        <input type="text" id="edificio" name="edificio" value="<?php echo isset($detalleDeposito['edificio']) ? $detalleDeposito['edificio'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Detalle de Depósito">
    </form>
    <a href="detalleDeposito.php">Volver a Detalles de Depósito</a>
</body>
</html>
