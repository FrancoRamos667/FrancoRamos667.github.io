<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $barrio = $_POST["barrio"];
    $manzana = $_POST["manzana"];
    $casa = $_POST["casa"];
    $calle = $_POST["calle"];

    $query = "UPDATE domicilios SET barrio='$barrio', manzana='$manzana', casa='$casa', calle='$calle' WHERE id_domicilio='$id'";
    mysqli_query($conexion, $query);

    header("Location: domicilio.php");
    exit();
}

// Obtener datos del domicilio si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM domicilios WHERE id_domicilio='$id'";
    $result = mysqli_query($conexion, $query);
    $domicilio = mysqli_fetch_assoc($result);
} else {
    $domicilio = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Domicilio</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Domicilio</h2>
    <form action="modificar_domicilio.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="barrio">Barrio:</label>
        <input type="text" id="barrio" name="barrio" value="<?php echo isset($domicilio['barrio']) ? $domicilio['barrio'] : ''; ?>" required><br><br>
        <label for="manzana">Manzana:</label>
        <input type="text" id="manzana" name="manzana" value="<?php echo isset($domicilio['manzana']) ? $domicilio['manzana'] : ''; ?>" required><br><br>
        <label for="casa">Casa:</label>
        <input type="text" id="casa" name="casa" value="<?php echo isset($domicilio['casa']) ? $domicilio['casa'] : ''; ?>" required><br><br>
        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" value="<?php echo isset($domicilio['calle']) ? $domicilio['calle'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Domicilio">
    </form>
    <a href="domicilio.php">Volver a Domicilios</a>
</body>
</html>
