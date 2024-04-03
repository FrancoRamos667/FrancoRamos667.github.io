<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_infoCliente = $_POST["id_infoCliente"];
    $id_cliente = $_POST["id_cliente"];
    $id_domicilioCliente = $_POST["id_domicilioCliente"];
    $id_celCliente = $_POST["id_celCliente"];

    $query = "UPDATE informacionesclientes SET id_cliente='$id_cliente', id_domicilioCliente='$id_domicilioCliente', id_celCliente='$id_celCliente' WHERE id_infoCliente='$id_infoCliente'";
    mysqli_query($conexion, $query);

    header("Location: datoCliente.php");
    exit();
}

$id_infoCliente = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id_infoCliente) {
    $query = "SELECT * FROM informacionesclientes WHERE id_infoCliente='$id_infoCliente'";
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
    <title>Modificar Datos de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Datos de Cliente</h2>
    <form action="modificar_datoCliente.php" method="post">
        <input type="hidden" name="id_infoCliente" value="<?php echo $id_infoCliente; ?>">
        <label for="id_cliente">ID Cliente:</label>
        <input type="text" id="id_cliente" name="id_cliente" value="<?php echo isset($cliente['id_cliente']) ? $cliente['id_cliente'] : ''; ?>" required><br><br>
        <label for="id_domicilioCliente">ID Domicilio:</label>
        <input type="text" id="id_domicilioCliente" name="id_domicilioCliente" value="<?php echo isset($cliente['id_domicilioCliente']) ? $cliente['id_domicilioCliente'] : ''; ?>" required><br><br>
        <label for="id_celCliente">ID Celular:</label>
        <input type="text" id="id_celCliente" name="id_celCliente" value="<?php echo isset($cliente['id_celCliente']) ? $cliente['id_celCliente'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Datos de Cliente">
    </form>
    <a href="datoCliente.php">Volver a Datos de Cliente</a>
</body>
</html>
