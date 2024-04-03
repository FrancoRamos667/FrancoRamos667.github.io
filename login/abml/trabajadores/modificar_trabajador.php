<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $correo = $_POST["correo"];

    $query = "UPDATE trabajadores SET nombre='$nombre', apellido='$apellido', fechaNacimiento='$fechaNacimiento', correo='$correo' WHERE id_trabajador='$id'";
    mysqli_query($conexion, $query);

    header("Location: trabajador.php");
    exit();
}

// Obtener datos del trabajador si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM trabajadores WHERE id_trabajador='$id'";
    $result = mysqli_query($conexion, $query);
    $trabajador = mysqli_fetch_assoc($result);
} else {
    $trabajador = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Trabajador</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Trabajador</h2>
    <form action="modificar_trabajador.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($trabajador['nombre']) ? $trabajador['nombre'] : ''; ?>" required><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo isset($trabajador['apellido']) ? $trabajador['apellido'] : ''; ?>" required><br><br>
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="text" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo isset($trabajador['fechaNacimiento']) ? $trabajador['fechaNacimiento'] : ''; ?>" required><br><br>
        <label for="correo">Correo:</label>
        <input type="text" id="correo" name="correo" value="<?php echo isset($trabajador['correo']) ? $trabajador['correo'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Trabajador">
    </form>
    <a href="trabajador.php">Volver a Trabajadores</a>
</body>
</html>
