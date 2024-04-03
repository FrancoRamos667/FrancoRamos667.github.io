<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $id_contrato = $_POST["id_contrato"];
    $fechaSeguimiento = $_POST["fechaSeguimiento"];
    $estadoSeguimiento = $_POST["estadoSeguimiento"];
    $observaciones = $_POST["observaciones"];

    $query = "UPDATE seguimientoscontratos SET id_contrato='$id_contrato', fechaSeguimiento='$fechaSeguimiento', estadoSeguimiento='$estadoSeguimiento', observaciones='$observaciones' WHERE id_seguimiento='$id'";
    mysqli_query($conexion, $query);

    header("Location: seguimientoContrato.php");
    exit();
}

// Obtener datos del seguimiento de contrato si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM seguimientoscontratos WHERE id_seguimiento='$id'";
    $result = mysqli_query($conexion, $query);
    $seguimientoContrato = mysqli_fetch_assoc($result);
} else {
    $seguimientoContrato = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Seguimiento de Contrato</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Seguimiento de Contrato</h2>
    <form action="modificar_seguimientoContrato.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="id_contrato">ID del Contrato:</label>
        <input type="text" id="id_contrato" name="id_contrato" value="<?php echo isset($seguimientoContrato['id_contrato']) ? $seguimientoContrato['id_contrato'] : ''; ?>" required><br><br>
        <label for="fechaSeguimiento">Fecha de Seguimiento:</label>
        <input type="date" id="fechaSeguimiento" name="fechaSeguimiento" value="<?php echo isset($seguimientoContrato['fechaSeguimiento']) ? $seguimientoContrato['fechaSeguimiento'] : ''; ?>" required><br><br>
        <label for="estadoSeguimiento">Estado de Seguimiento:</label>
        <input type="text" id="estadoSeguimiento" name="estadoSeguimiento" value="<?php echo isset($seguimientoContrato['estadoSeguimiento']) ? $seguimientoContrato['estadoSeguimiento'] : ''; ?>" required><br><br>
        <label for="observaciones">Observaciones:</label>
        <input type="text" id="observaciones" name="observaciones" value="<?php echo isset($seguimientoContrato['observaciones']) ? $seguimientoContrato['observaciones'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Seguimiento de Contrato">
    </form>
    <a href="seguimientoContrato.php">Volver a Seguimientos de Contratos</a>
</body>
</html>
