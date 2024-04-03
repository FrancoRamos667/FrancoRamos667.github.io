<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_almacenDetalle = $_POST["id_almacenDetalle"];
    $id_compraDetalle = $_POST["id_compraDetalle"];
    $id_almacen = $_POST["id_almacen"];

    $query = "INSERT INTO almacenesdetalles (id_almacenDetalle, id_compraDetalle, id_almacen) 
              VALUES ('$id_almacenDetalle', '$id_compraDetalle', '$id_almacen')";
    mysqli_query($conexion, $query);

    header("Location: almacenDetalle.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Detalle de Almacén</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Detalle de Almacén</h2>
    <form action="agregar_almacenDetalle.php" method="post">
        <label for="id_almacenDetalle">ID Detalle de Almacén:</label>
        <input type="text" id="id_almacenDetalle" name="id_almacenDetalle" required><br><br>
        <label for="id_compraDetalle">ID Detalle de Compra:</label>
        <input type="text" id="id_compraDetalle" name="id_compraDetalle" required><br><br>
        <label for="id_almacen">ID Almacén:</label>
        <input type="text" id="id_almacen" name="id_almacen" required><br><br>
        <input type="submit" value="Agregar Detalle de Almacén">
    </form>
    <a href="almacenDetalle.php">Volver a Detalles de Almacenes</a>
</body>
</html>
