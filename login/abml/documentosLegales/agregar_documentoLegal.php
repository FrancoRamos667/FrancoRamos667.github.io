<?php
include 'conexion2.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoDocumento = $_POST["tipoDocumento"];
    $descripcionDocumento = $_POST["descripcionDocumento"];
    $fechaExpedicion = $_POST["fechaExpedicion"];
    $fechaVencimiento = $_POST["fechaVencimiento"];
    $estadoDocumento = $_POST["estadoDocumento"];

    // Insertar el nuevo documento en la base de datos
    $query = "INSERT INTO documentoslegales (tipoDocumentoLegal, descripcionDocumento, fechaExpedicion, fechaVencimiento, estadoDocumento) 
              VALUES ('$tipoDocumento', '$descripcionDocumento', '$fechaExpedicion', '$fechaVencimiento', '$estadoDocumento')";
    mysqli_query($conexion, $query);

    // Redireccionar a la página de listado de documentos
    header("Location: documentoLegal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Documento Legal</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Documento Legal</h2>
    <form action="agregar_documento.php" method="post">
        <label for="tipoDocumento">Tipo de Documento:</label>
        <input type="text" id="tipoDocumento" name="tipoDocumento" required><br><br>
        <label for="descripcionDocumento">Descripción del Documento:</label>
        <input type="text" id="descripcionDocumento" name="descripcionDocumento" required><br><br>
        <label for="fechaExpedicion">Fecha de Expedición:</label>
        <input type="date" id="fechaExpedicion" name="fechaExpedicion" required><br><br>
        <label for="fechaVencimiento">Fecha de Vencimiento:</label>
        <input type="date" id="fechaVencimiento" name="fechaVencimiento" required><br><br>
        <label for="estadoDocumento">Estado del Documento:</label>
        <input type="text" id="estadoDocumento" name="estadoDocumento" required><br><br>
        <input type="submit" value="Agregar Documento">
    </form>
    <a href="documentoLegal.php">Volver a Documentos Legales</a>
</body>
</html>
