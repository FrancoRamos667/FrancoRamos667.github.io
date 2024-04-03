<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCliente = $_POST["idCliente"];
    $nombreCliente = $_POST["nombreCliente"];
    $apellidoCliente = $_POST["apellidoCliente"];
    $fechaNacimientoCliente = $_POST["fechaNacimientoCliente"];

    $query = "UPDATE clientes SET cliente='$nombreCliente', apellidoCliente='$apellidoCliente', fechaNacimientoCliente='$fechaNacimientoCliente' WHERE id_cliente='$idCliente'";
    mysqli_query($conexion, $query);

    header("Location: cliente.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM clientes WHERE id_cliente='$id'";
    $result = mysqli_query($conexion, $query);
    $cliente = mysqli_fetch_assoc($result);
} else {
    $cliente = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Cliente</h2>
    <form action="modificar_cliente.php" method="post">
        <input type="hidden" name="idCliente" value="<?php echo $id; ?>">
        <label for="nombreCliente">Nombre del Cliente:</label>
        <input type="text" id="nombreCliente" name="nombreCliente" value="<?php echo isset($cliente['cliente']) ? $cliente['cliente'] : ''; ?>" required><br><br>
        <label for="apellidoCliente">Apellido del Cliente:</label>
        <input type="text" id="apellidoCliente" name="apellidoCliente" value="<?php echo isset($cliente['apellidoCliente']) ? $cliente['apellidoCliente'] : ''; ?>" required><br><br>
        <label for="fechaNacimientoCliente">Fecha de Nacimiento del Cliente:</label>
        <input type="date" id="fechaNacimientoCliente" name="fechaNacimientoCliente" value="<?php echo isset($cliente['fechaNacimientoCliente']) ? $cliente['fechaNacimientoCliente'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Cliente">
    </form>
    <a href="cliente.php">Volver a Lista de Clientes</a>
</body>
</html>
