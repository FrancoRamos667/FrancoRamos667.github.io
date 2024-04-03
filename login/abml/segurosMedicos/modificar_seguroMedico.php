<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $tipoSeguro = $_POST["tipoSeguro"];
    $cobertura = $_POST["cobertura"];
    $fechaSeguro = $_POST["fechaSeguro"];

    $query = "UPDATE segurosmedicos SET tipoSeguro='$tipoSeguro', cobertura='$cobertura', fechaSeguro='$fechaSeguro' WHERE id_seguro='$id'";
    mysqli_query($conexion, $query);

    header("Location: seguroMedico.php");
    exit();
}

// Obtener datos del seguro médico si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM segurosmedicos WHERE id_seguro='$id'";
    $result = mysqli_query($conexion, $query);
    $seguro = mysqli_fetch_assoc($result);
} else {
    $seguro = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Seguro Médico</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Seguro Médico</h2>
    <form action="modificar_seguroMedico.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="tipoSeguro">Tipo de Seguro:</label>
        <input type="text" id="tipoSeguro" name="tipoSeguro" value="<?php echo isset($seguro['tipoSeguro']) ? $seguro['tipoSeguro'] : ''; ?>" required><br><br>
        <label for="cobertura">Cobertura:</label>
        <input type="text" id="cobertura" name="cobertura" value="<?php echo isset($seguro['cobertura']) ? $seguro['cobertura'] : ''; ?>" required><br><br>
        <label for="fechaSeguro">Fecha de Seguro:</label>
        <input type="date" id="fechaSeguro" name="fechaSeguro" value="<?php echo isset($seguro['fechaSeguro']) ? $seguro['fechaSeguro'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Seguro Médico">
    </form>
    <a href="seguroMedico.php">Volver a Seguros Médicos</a>
</body>
</html>
