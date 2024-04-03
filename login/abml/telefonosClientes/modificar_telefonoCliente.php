<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $codAreaCliente = $_POST["codAreaCliente"];
    $numCelular = $_POST["numCelular"];

    $query = "UPDATE telefonosclientes SET codAreaCliente='$codAreaCliente', numCelular='$numCelular' WHERE id_celCliente='$id'";
    mysqli_query($conexion, $query);

    header("Location: telefonoCliente.php");
    exit();
}

// Obtener datos del teléfono del cliente si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM telefonosclientes WHERE id_celCliente='$id'";
    $result = mysqli_query($conexion, $query);
    $telefonoCliente = mysqli_fetch_assoc($result);
} else {
    $telefonoCliente = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Teléfono de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Teléfono de Cliente</h2>
    <form action="modificar_telefonoCliente.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="codAreaCliente">Código de Área:</label>
        <input type="text" id="codAreaCliente" name="codAreaCliente" value="<?php echo isset($telefonoCliente['codAreaCliente']) ? $telefonoCliente['codAreaCliente'] : ''; ?>" required><br><br>
        <label for="numCelular">Número de Celular:</label>
        <input type="text" id="numCelular" name="numCelular" value="<?php echo isset($telefonoCliente['numCelular']) ? $telefonoCliente['numCelular'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Teléfono de Cliente">
    </form>
    <a href="telefonoCliente.php">Volver a Teléfonos de Clientes</a>
</body>
</html>
