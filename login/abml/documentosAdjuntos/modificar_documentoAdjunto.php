<?php
include 'conexion2.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $id_contrato = $_POST["id_contrato"];
    $nombreDocumento = $_POST["nombreDocumento"];
    $tipoDocumento = $_POST["tipoDocumento"];
    $contenidoDocumento = $_POST["contenidoDocumento"];

    // Actualizar el documento adjunto en la base de datos
    $query = "UPDATE documentosadjuntos SET id_contrato='$id_contrato', nombreDocumento='$nombreDocumento', tipoDocumento='$tipoDocumento', contenidoDocumento='$contenidoDocumento' WHERE id_documentoContrato='$id'";
    mysqli_query($conexion, $query);

    // Redireccionar al listado de documentos adjuntos
    header("Location: documentoAdjunto.php");
    exit();
}

// Obtener datos del documento si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM documentosadjuntos WHERE id_documentoContrato='$id'";
    $result = mysqli_query($conexion, $query);
    $documento = mysqli_fetch_assoc($result);
} else {
    $documento = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Documento Adjunto</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleModificar.css">
</head>
<body>
    <h2>Modificar Documento Adjunto</h2>
    <form action="modificar_documentoAdjunto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="id_contrato">ID Contrato:</label>
        <input type="text" id="id_contrato" name="id_contrato" value="<?php echo isset($documento['id_contrato']) ? $documento['id_contrato'] : ''; ?>" required><br><br>
        <label for="nombreDocumento">Nombre Documento:</label>
        <input type="text" id="nombreDocumento" name="nombreDocumento" value="<?php echo isset($documento['nombreDocumento']) ? $documento['nombreDocumento'] : ''; ?>" required><br><br>
        <label for="tipoDocumento">Tipo Documento:</label>
        <input type="text" id="tipoDocumento" name="tipoDocumento" value="<?php echo isset($documento['tipoDocumento']) ? $documento['tipoDocumento'] : ''; ?>" required><br><br>
        <label for="contenidoDocumento">Contenido Documento:</label>
        <textarea id="contenidoDocumento" name="contenidoDocumento" required><?php echo isset($documento['contenidoDocumento']) ? $documento['contenidoDocumento'] : ''; ?></textarea><br><br>
        <input type="submit" value="Modificar Documento Adjunto">
    </form>
    <a href="documentoAdjunto.php">Volver a Documentos Adjuntos</a>
</body>
</html>
