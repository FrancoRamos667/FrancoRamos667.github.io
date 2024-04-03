<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Almacén</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Almacén</h2>
    <?php
    include 'conexion2.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $numeroEstante = $_POST["numeroEstante"];
        $seccion = $_POST["seccion"];
        $capacidadMaxima = $_POST["capacidadMaxima"];
        $observaciones = $_POST["observaciones"];

        $query = "UPDATE almacenes SET numeroEstante='$numeroEstante', seccion='$seccion', 
                  capacidadMaxima='$capacidadMaxima', observaciones='$observaciones' WHERE id_almacen='$id'";
        mysqli_query($conexion, $query);

        header("Location: almacen.php");
        exit();
    }

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    if ($id) {
        $query = "SELECT * FROM almacenes WHERE id_almacen='$id'";
        $result = mysqli_query($conexion, $query);
        $almacen = mysqli_fetch_assoc($result);
    } else {
        $almacen = null;
    }
    ?>
    <form action="modificar_almacen.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="numeroEstante">Número de Estante:</label>
        <input type="text" id="numeroEstante" name="numeroEstante" value="<?php echo isset($almacen['numeroEstante']) ? $almacen['numeroEstante'] : ''; ?>" required><br><br>
        <label for="seccion">Sección:</label>
        <input type="text" id="seccion" name="seccion" value="<?php echo isset($almacen['seccion']) ? $almacen['seccion'] : ''; ?>" required><br><br>
        <label for="capacidadMaxima">Capacidad Máxima:</label>
        <input type="text" id="capacidadMaxima" name="capacidadMaxima" value="<?php echo isset($almacen['capacidadMaxima']) ? $almacen['capacidadMaxima'] : ''; ?>" required><br><br>
        <label for="observaciones">Observaciones:</label>
        <input type="text" id="observaciones" name="observaciones" value="<?php echo isset($almacen['observaciones']) ? $almacen['observaciones'] : ''; ?>"><br><br>
        <input type="submit" value="Modificar Almacén">
    </form>
    <a href="almacen.php">Volver a Almacenes</a>
</body>
</html>
