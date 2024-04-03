<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Incidencias en Obras</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Incidencias en Obras</h2>
    <div class="menu">
        <a href="agregar_incidenciaObra.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_incidenciaObra.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Fecha Incidencia</th>
        <th>Tipo Incidencia</th>
        <th>Descripción Incidente</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php';

    $query = "SELECT * FROM incidenciasobras";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['fechaIncidencia'] . "</td>";
        echo "<td>" . $row['tipoIncidencia'] . "</td>";
        echo "<td>" . $row['descripcionIncidente'] . "</td>";
        echo "<td>
                <a href='modificar_incidenciaObra.php?id=" . $row['id_incidencia'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_incidenciaObra.php?id=" . $row['id_incidencia'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>

</body>
</html>
