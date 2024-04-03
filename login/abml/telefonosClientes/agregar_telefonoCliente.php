<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codAreaCliente = $_POST["codAreaCliente"];
    $numCelular = $_POST["numCelular"];

    $query = "INSERT INTO telefonosclientes (codAreaCliente, numCelular) VALUES ('$codAreaCliente', '$numCelular')";
    mysqli_query($conexion, $query);

    header("Location: sucursal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Teléfono de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Teléfono de Cliente</h2>
    <form action="agregar_telefonoCliente.php" method="post">
        <label for="codAreaCliente">Código de Área:</label>
        <input type="text" id="codAreaCliente" name="codAreaCliente" required><br><br>
        <label for="numCelular">Número de Celular:</label>
        <input type="text" id="numCelular" name="numCelular" required><br><br>
        <input type="submit" value="Agregar Teléfono de Cliente">
    </form>
    <a href="telefonoCliente.php">Volver a Teléfonos de Clientes</a>
</body>
</html>
