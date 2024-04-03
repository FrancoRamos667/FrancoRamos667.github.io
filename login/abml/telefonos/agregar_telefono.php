<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codArea = $_POST["codArea"];
    $numero = $_POST["numero"];

    $query = "INSERT INTO telefonos (codArea, numero) VALUES ('$codArea', '$numero')";
    mysqli_query($conexion, $query);

    header("Location: telefono.php.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Teléfono</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Teléfono</h2>
    <form action="agregar_telefono.php" method="post">
        <label for="codArea">Código de Área:</label>
        <input type="text" id="codArea" name="codArea" required><br><br>
        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required><br><br>
        <input type="submit" value="Agregar Teléfono">
    </form>
    <a href="telefono.php">Volver a Teléfonos</a>
</body>
</html>
