<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Documentos Legales</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Documentos Legales</h2>
    <div class="menu">
        <a href="agregar_documentoLegal.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_documentoLegal.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Tipo Documento</th>
        <th>Descripción</th>
        <th>Fecha Expedición</th>
        <th>Fecha Vencimiento</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Incluir el archivo de conexión

    // Consultar la base de datos para obtener los documentos legales
    $query = "SELECT * FROM documentoslegales";
    $result = mysqli_query($conexion, $query);

    // Mostrar cada documento legal en una fila de la tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['tipoDocumentoLegal'] . "</td>";
        echo "<td>" . $row['descripcionDocumento'] . "</td>";
        echo "<td>" . $row['fechaExpedicion'] . "</td>";
        echo "<td>" . $row['fechaVencimiento'] . "</td>";
        echo "<td>" . $row['estadoDocumento'] . "</td>";
        echo "<td>
                <a href='modificar_documentoLegal.php?id=" . $row['id_documento'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_documentoLegal.php?id=" . $row['id_documento'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
