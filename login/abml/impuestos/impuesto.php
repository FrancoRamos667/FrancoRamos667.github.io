<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Impuestos</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Impuestos</h2>
    <div class="menu">
        <a href="agregar_impuesto.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_impuesto.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Tipo Impuesto</th>
        <th>Monto Impuesto</th>
        <th>Fecha Impuesto</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM impuestos";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['tipoImpuesto'] . "</td>";
        echo "<td>" . $row['montoImpuesto'] . "</td>";
        echo "<td>" . $row['fechaImpuesto'] . "</td>";
        echo "<td>
                <a href='modificar_impuesto.php?id=" . $row['id_impuesto'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_impuesto.php?id=" . $row['id_impuesto'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
