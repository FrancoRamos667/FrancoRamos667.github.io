<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barrio = $_POST["barrio"];
    $manzana = $_POST["manzana"];
    $casa = $_POST["casa"];
    $calle = $_POST["calle"];

    // Verificar si se está agregando o modificando
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        // Modificar domicilio existente
        $id = $_POST["id"];
        $query = "UPDATE domicilios SET barrio='$barrio', manzana='$manzana', casa='$casa', calle='$calle' WHERE id_domicilio='$id'";
    } else {
        // Agregar nuevo domicilio
        $query = "INSERT INTO domicilios (barrio, manzana, casa, calle) VALUES ('$barrio', '$manzana', '$casa', '$calle')";
    }

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
    <title><?php echo isset($domicilio) ? 'Modificar' : 'Agregar'; ?> Domicilio</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2><?php echo isset($domicilio) ? 'Modificar' : 'Agregar'; ?> Domicilio</h2>
    <form action="agregar_modificar_domicilio.php" method="post">
        <input type="hidden" name="id" value="<?php echo isset($domicilio['id_domicilio']) ? $domicilio['id_domicilio'] : ''; ?>">
        <label for="barrio">Barrio:</label>
        <input type="text" id="barrio" name="barrio" value="<?php echo isset($domicilio['barrio']) ? $domicilio['barrio'] : ''; ?>" required><br><br>
        <label for="manzana">Manzana:</label>
        <input type="text" id="manzana" name="manzana" value="<?php echo isset($domicilio['manzana']) ? $domicilio['manzana'] : ''; ?>" required><br><br>
        <label for="casa">Casa:</label>
        <input type="text" id="casa" name="casa" value="<?php echo isset($domicilio['casa']) ? $domicilio['casa'] : ''; ?>" required><br><br>
        <label for="calle">Calle:</label>
        <input type="text" id="calle" name="calle" value="<?php echo isset($domicilio['calle']) ? $domicilio['calle'] : ''; ?>" required><br><br>
        <input type="submit" value="<?php echo isset($domicilio) ? 'Modificar' : 'Agregar'; ?> Domicilio">
    </form>
    <a href="domicilio.php">Volver a Domicilios</a>
</body>
</html>

