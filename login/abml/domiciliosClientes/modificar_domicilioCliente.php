<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $barrioCliente = $_POST["barrioCliente"];
    $calleCliente = $_POST["calleCliente"];
    $manzanaCliente = $_POST["manzanaCliente"];
    $casaCliente = $_POST["casaCliente"];

    $query = "UPDATE domiciliosclientes SET barrioCliente='$barrioCliente', calleCliente='$calleCliente', manzanaCliente='$manzanaCliente', casaCliente='$casaCliente' WHERE id_domicilioCliente='$id'";
    mysqli_query($conexion, $query);

    header("Location: domicilioCliente.php");
    exit();
}

// Obtener datos del domicilio si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM domiciliosclientes WHERE id_domicilioCliente='$id'";
    $result = mysqli_query($conexion, $query);
    $domicilioCliente = mysqli_fetch_assoc($result);
} else {
    $domicilioCliente = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Domicilio de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleModificar.css">
</head>
<body>
    <h2>Modificar Domicilio de Cliente</h2>
    <form action="modificar_domicilioCliente.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="barrioCliente">Barrio:</label>
        <input type="text" id="barrioCliente" name="barrioCliente" value="<?php echo isset($domicilioCliente['barrioCliente']) ? $domicilioCliente['barrioCliente'] : ''; ?>" required><br><br>
        <label for="calleCliente">Calle:</label>
        <input type="text" id="calleCliente" name="calleCliente" value="<?php echo isset($domicilioCliente['calleCliente']) ? $domicilioCliente['calleCliente'] : ''; ?>" required><br><br>
        <label for="manzanaCliente">Manzana:</label>
        <input type="text" id="manzanaCliente" name="manzanaCliente" value="<?php echo isset($domicilioCliente['manzanaCliente']) ? $domicilioCliente['manzanaCliente'] : ''; ?>" required><br><br>
        <label for="casaCliente">Casa:</label>
        <input type="text" id="casaCliente" name="casaCliente" value="<?php echo isset($domicilioCliente['casaCliente']) ? $domicilioCliente['casaCliente'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Domicilio de Cliente">
    </form>
    <a href="domicilioCliente.php">Volver a Domicilios de Clientes</a>
</body>
</html>
