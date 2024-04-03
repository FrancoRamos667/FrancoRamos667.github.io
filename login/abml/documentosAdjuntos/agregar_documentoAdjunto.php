<?php
include 'conexion2.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_contrato = $_POST["id_contrato"];
    $nombreDocumento = $_POST["nombreDocumento"];
    $tipoDocumento = $_POST["tipoDocumento"];
    $contenidoDocumento = $_POST["contenidoDocumento"];

    // Insertar el nuevo documento adjunto en la base de datos
    $query = "INSERT INTO documentosadjuntos (id_contrato, nombreDocumento, tipoDocumento, contenidoDocumento) VALUES ('$id_contrato', '$nombreDocumento', '$tipoDocumento', '$contenidoDocumento')";
    mysqli_query($conexion, $query);

    // Redireccionar al listado de documentos adjuntos
    header("Location: documentoAdjunto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Documento Adjunto</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Documento Adjunto</h2>
    <form action="agregar_documentoAdjunto.php" method="post">
        <label for="id_contrato">ID Contrato:</label>
        <input type="text" id="id_contrato" name="id_contrato" required><br><br>
        <label for="nombreDocumento">Nombre Documento:</label>
        <input type="text" id="nombreDocumento" name="nombreDocumento" required><br><br>
        <label for="tipoDocumento">Tipo Documento:</label>
        <input type="text" id="tipoDocumento" name="tipoDocumento" required><br><br>
        <label for="contenidoDocumento">Contenido Documento:</label>
        <textarea id="contenidoDocumento" name="contenidoDocumento" required></textarea><br><br>
        <input type="submit" value="Agregar Documento Adjunto">
    </form>
    <a href="documentoAdjunto.php">Volver a Documentos Adjuntos</a>
</body>
</html>
