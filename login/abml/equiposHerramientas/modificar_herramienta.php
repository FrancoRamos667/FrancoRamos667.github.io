<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_herramienta = $_POST["id_herramienta"];
    $herramienta = $_POST["herramienta"];
    $tipoHerramienta = $_POST["tipoHerramienta"];
    $estado = $_POST["estado"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $peso = $_POST["peso"];
    $materialHerramienta = $_POST["materialHerramienta"];
    $fechaAdquisicion = $_POST["fechaAdquisicion"];
    $id_almacen = $_POST["id_almacen"];

    $query = "UPDATE equiposherramientas SET 
              herramienta='$herramienta', 
              tipoHerramienta='$tipoHerramienta', 
              estado='$estado', 
              marca='$marca', 
              modelo='$modelo', 
              peso='$peso', 
              materialHerramienta='$materialHerramienta', 
              fechaAdquisicion='$fechaAdquisicion', 
              id_almacen='$id_almacen' 
              WHERE id_herramienta='$id_herramienta'";
    mysqli_query($conexion, $query);

    header("Location: herramienta.php");
    exit();
}

if (isset($_GET["id"])) {
    $id_herramienta = $_GET["id"];
    $query = "SELECT * FROM equiposherramientas WHERE id_herramienta='$id_herramienta'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: herramienta.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Herramienta</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Modificar Herramienta</h2>
    <form action="modificar_herramienta.php" method="post">
        <input type="hidden" name="id_herramienta" value="<?php echo $row['id_herramienta']; ?>">
        <label for="herramienta">Herramienta:</label>
        <input type="text" id="herramienta" name="herramienta" value="<?php echo $row['herramienta']; ?>" required><br><br>
        <label for="tipoHerramienta">Tipo de Herramienta:</label>
        <input type="text" id="tipoHerramienta" name="tipoHerramienta" value="<?php echo $row['tipoHerramienta']; ?>" required><br><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo $row['estado']; ?>" required><br><br>
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $row['marca']; ?>" required><br><br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $row['modelo']; ?>" required><br><br>
        <label for="peso">Peso:</label>
        <input type="text" id="peso" name="peso" value="<?php echo $row['peso']; ?>" required><br><br>
        <label for="materialHerramienta">Material:</label>
        <input type="text" id="materialHerramienta" name="materialHerramienta" value="<?php echo $row['materialHerramienta']; ?>" required><br><br>
        <label for="fechaAdquisicion">Fecha de Adquisición:</label>
        <input type="text" id="fechaAdquisicion" name="fechaAdquisicion" value="<?php echo $row['fechaAdquisicion']; ?>" required><br><br>
        <label for="id_almacen">ID Almacén:</label>
        <input type="text" id="id_almacen" name="id_almacen" value="<?php echo $row['id_almacen']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="herramienta.php">Volver a listado Herramientas</a>
</body>
</html>