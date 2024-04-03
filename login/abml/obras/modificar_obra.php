<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $id_sucursal = $_POST["id_sucursal"];
    $obra = $_POST["obra"];
    $fechaObra = $_POST["fechaObra"];

    $query = "UPDATE obras 
              SET id_sucursal='$id_sucursal', obra='$obra', fechaObra='$fechaObra' 
              WHERE id_obra='$id'";
    mysqli_query($conexion, $query);

    header("Location: obra.php");
    exit();
}

$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM obras WHERE id_obra='$id'";
    $result = mysqli_query($conexion, $query);
    $obra = mysqli_fetch_assoc($result);
} else {
    $obra = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Obra</h2>
    <form action="modificar_obra.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="id_sucursal">Número de Sucursal:</label>
        <input type="text" id="id_sucursal" name="id_sucursal" value="<?php echo isset($obra['id_sucursal']) ? $obra['id_sucursal'] : ''; ?>" required><br><br>
        <label for="obra">Obra:</label>
        <input type="text" id="obra" name="obra" value="<?php echo isset($obra['obra']) ? $obra['obra'] : ''; ?>" required><br><br>
        <label for="fechaObra">Fecha de Obra:</label>
        <input type="date" id="fechaObra" name="fechaObra" value="<?php echo isset($obra['fechaObra']) ? $obra['fechaObra'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Obra">
    </form>
    <a href="obra.php">Volver a Listado de Obras</a>
</body>
</html>
