<?php
include 'conexion2.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $tipoDocumento = $_POST["tipoDocumento"];
    $descripcionDocumento = $_POST["descripcionDocumento"];
    $fechaExpedicion = $_POST["fechaExpedicion"];
    $fechaVencimiento = $_POST["fechaVencimiento"];
    $estadoDocumento = $_POST["estadoDocumento"];

    // Actualizar el documento en la base de datos
    $query = "UPDATE documentoslegales SET tipoDocumentoLegal='$tipoDocumento', descripcionDocumento='$descripcionDocumento', 
              fechaExpedicion='$fechaExpedicion', fechaVencimiento='$fechaVencimiento', estadoDocumento='$estadoDocumento' 
              WHERE id_documento='$id'";
    mysqli_query($conexion, $query);

    // Redireccionar a la página de listado de documentos
    header("Location: documentoLegal.php");
    exit();
}

// Obtener el ID del documento a modificar
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    // Obtener los datos del documento
    $query = "SELECT * FROM documentoslegales WHERE id_documento='$id'";
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
    <title>Modificar Documento Legal</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleModificar.css">
</head>
<body>
    <h2>Modificar Documento Legal</h2>
    <form action="modificar_documento.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="tipoDocumento">Tipo de Documento:</label>
        <input type="text" id="tipoDocumento" name="tipoDocumento" value="<?php echo isset($documento['tipoDocumentoLegal']) ? $documento['tipoDocumentoLegal'] : ''; ?>" required><br><br>
        <label for="descripcionDocumento">Descripción del Documento:</label>
        <input type="text" id="descripcionDocumento" name="descripcionDocumento" value="<?php echo isset($documento['descripcionDocumento']) ? $documento['descripcionDocumento'] : ''; ?>" required><br><br>
        <label for="fechaExpedicion">Fecha de Expedición:</label>
        <input type="date" id="fechaExpedicion" name="fechaExpedicion" value="<?php echo isset($documento['fechaExpedicion']) ? $documento['fechaExpedicion'] : ''; ?>" required><br><br>
        <label for="fechaVencimiento">Fecha de Vencimiento:</label>
        <input type="date" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo isset($documento['fechaVencimiento']) ? $documento['fechaVencimiento'] : ''; ?>" required><br><br>
        <label for="estadoDocumento">Estado del Documento:</label>
        <input type="text" id="estadoDocumento" name="estadoDocumento" value="<?php echo isset($documento['estadoDocumento']) ? $documento['estadoDocumento'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Documento">
    </form>
    <a href="documentoLegal.php">Volver a Documentos Legales</a>
</body>
</html>
