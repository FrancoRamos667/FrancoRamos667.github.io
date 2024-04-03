<?php
include 'conexion2.php'; // Incluir el archivo de conexión

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el término de búsqueda del formulario
    $termino = $_POST["termino"];

    // Buscar documentos que coincidan con el término de búsqueda
    $query = "SELECT * FROM documentoslegales WHERE tipoDocumentoLegal LIKE '%$termino%' OR descripcionDocumento LIKE '%$termino%'";
    $result = mysqli_query($conexion, $query);

    // Almacenar los resultados de la búsqueda en un arreglo
    while ($row = mysqli_fetch_assoc($result)) {
        $resultados[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Documento Legal</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleBuscar.css">
</head>
<body>
    <h2>Buscar Documento Legal</h2>
    <form action="buscar_documento.php" method="post">
        <label for="termino">Buscar por Tipo de Documento o Descripción:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Tipo Documento</th>
                    <th>Descripción Documento</th>
                    <th>Fecha Expedición</th>
                    <th>Fecha Vencimiento</th>
                    <th>Estado Documento</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['tipoDocumentoLegal']; ?></td>
                        <td><?php echo $row['descripcionDocumento']; ?></td>
                        <td><?php echo $row['fechaExpedicion']; ?></td>
                        <td><?php echo $row['fechaVencimiento']; ?></td>
                        <td><?php echo $row['estadoDocumento']; ?></td>
                        <td>
                            <a href="modificar_documento.php?id=<?php echo $row['id_documento']; ?>">Modificar</a> |
                            <a href="eliminar_documento.php?id=<?php echo $row['id_documento']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="documentoLegal.php">Volver a Documentos Legales</a>
</body>
</html>
