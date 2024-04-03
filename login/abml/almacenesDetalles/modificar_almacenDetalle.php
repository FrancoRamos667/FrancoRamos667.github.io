<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Detalle de Almacén</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Detalle de Almacén</h2>
    <?php
    include 'conexion2.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $id_compraDetalle = $_POST["id_compraDetalle"];
        $id_almacen = $_POST["id_almacen"];

        $query = "UPDATE almacenesdetalles SET id_compraDetalle='$id_compraDetalle', id_almacen='$id_almacen' WHERE id_almacenDetalle='$id'";
        mysqli_query($conexion, $query);

        header("Location: almacenDetalle.php");
        exit();
    }

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    if ($id) {
        $query = "SELECT * FROM almacenesdetalles WHERE id_almacenDetalle='$id'";
        $result = mysqli_query($conexion, $query);
        $detalle = mysqli_fetch_assoc($result);
    } else {
        $detalle = null;
    }
    ?>
    <form action="modificar_almacenDetalle.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="id_compraDetalle">Número de Detalle de Compra:</label>
        <input type="text" id="id_compraDetalle" name="id_compraDetalle" value="<?php echo isset($detalle['id_compraDetalle']) ? $detalle['id_compraDetalle'] : ''; ?>" required><br><br>
        <label for="id_almacen">Número de Almacén:</label>
        <input type="text" id="id_almacen" name="id_almacen" value="<?php echo isset($detalle['id_almacen']) ? $detalle['id_almacen'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Detalle de Almacén">
    </form>
    <a href="almacenDetalle.php">Volver a Detalles de Almacenes</a>
</body>
</html>
