<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departamento = $_POST["departamento"];
    $cargo = $_POST["cargo"];

    $query = "INSERT INTO recursoshumanos (departamento, cargo) VALUES ('$departamento', '$cargo')";
    mysqli_query($conexion, $query);

    header("Location: recursoHumano.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Recurso Humano</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Recurso Humano</h2>
    <form action="agregar_recursoHumano.php" method="post">
        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento" required><br><br>
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required><br><br>
        <input type="submit" value="Agregar Recurso Humano">
    </form>
    <a href="recursoHumano.php">Volver a Recursos Humanos</a>
</body>
</html>
