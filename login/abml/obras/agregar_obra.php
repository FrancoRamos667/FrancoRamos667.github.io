<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sucursal = $_POST["id_sucursal"];
    $obra = $_POST["obra"];
    $fechaObra = $_POST["fechaObra"];

    $query = "INSERT INTO obras (id_sucursal, obra, fechaObra) 
              VALUES ('$id_sucursal', '$obra', '$fechaObra')";
    mysqli_query($conexion, $query);

    header("Location: obra.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Obra</h2>
    <form action="agregar_obra.php" method="post">
        <label for="id_sucursal">Número de Sucursal:</label>
        <input type="text" id="id_sucursal" name="id_sucursal" required><br><br>
        <label for="obra">Obra:</label>
        <input type="text" id="obra" name="obra" required><br><br>
        <label for="fechaObra">Fecha de Obra:</label>
        <input type="date" id="fechaObra" name="fechaObra" required><br><br>
        <input type="submit" value="Agregar Obra">
    </form>
    <a href="obra.php">Volver a Listado de Obras</a>
</body>
</html>
