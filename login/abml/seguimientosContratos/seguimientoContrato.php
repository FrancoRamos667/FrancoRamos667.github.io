<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Seguimientos de Contratos</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Seguimientos de Contratos</h2>
    <div class="menu">
        <a href="agregar_seguimientoContrato.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_seguimientoContrato.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>ID</th>
            <th>ID del Contrato</th>
            <th>Fecha de Seguimiento</th>
            <th>Estado de Seguimiento</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion2.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM seguimientoscontratos";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_seguimiento'] . "</td>";
            echo "<td>" . $row['id_contrato'] . "</td>";
            echo "<td>" . $row['fechaSeguimiento'] . "</td>";
            echo "<td>" . $row['estadoSeguimiento'] . "</td>";
            echo "<td>" . $row['observaciones'] . "</td>";
            echo "<td>
                    <a href='modificar_seguimientoContrato.php?id=" . $row['id_seguimiento'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_seguimientoContrato.php?id=" . $row['id_seguimiento'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
