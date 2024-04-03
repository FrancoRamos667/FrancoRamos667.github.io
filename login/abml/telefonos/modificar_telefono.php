<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $codArea = $_POST["codArea"];
    $numero = $_POST["numero"];

    $query = "UPDATE telefonos SET codArea='$codArea', numero='$numero' WHERE id_telefono='$id'";
    mysqli_query($conexion, $query);

    header("Location: telefono.php");
    exit();
}

// Obtener datos del teléfono si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM telefonos WHERE id_telefono='$id'";
    $result = mysqli_query($conexion, $query);
    $telefono = mysqli_fetch_assoc($result);
} else {
    $telefono = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Teléfono</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Teléfono</h2>
    <form action="modificar_telefono.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="codArea">Código de Área:</label>
        <input type="text" id="codArea" name="codArea" value="<?php echo isset($telefono['codArea']) ? $telefono['codArea'] : ''; ?>" required><br><br>
        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" value="<?php echo isset($telefono['numero']) ? $telefono['numero'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Teléfono">
    </form>
    <a href="telefono.php">Volver a Teléfonos</a>
</body>
</html>
