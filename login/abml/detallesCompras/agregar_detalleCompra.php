<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCompra = $_POST["idCompra"];
    $idMaterial = $_POST["idMaterial"];
    $precio = $_POST["precio"];

    $query = "INSERT INTO detallecompra (id_compra, id_material, precio) VALUES ('$idCompra', '$idMaterial', '$precio')";
    mysqli_query($conexion, $query);

    header("Location: detalleCompra.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Detalle de Compra</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Detalle de Compra</h2>
    <form action="agregar_detalleCompra.php" method="post">
        <label for="idCompra">ID de Compra:</label>
        <input type="text" id="idCompra" name="idCompra" required><br><br>
        <label for="idMaterial">ID de Material:</label>
        <input type="text" id="idMaterial" name="idMaterial" required><br><br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" required><br><br>
        <input type="submit" value="Agregar Detalle de Compra">
    </form>
    <a href="detalleCompra.php">Volver a Detalles de Compra</a>
</body>
</html>
