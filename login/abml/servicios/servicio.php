<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Servicios</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Servicios</h2>
    <div class="menu">
        <a href="agregar_servicio.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_servicio.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>Mantenimiento</th>
            <th>Otros Servicios</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion2.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM servicios";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['mantenimiento'] . "</td>";
            echo "<td>" . $row['otrosServicio'] . "</td>";
            echo "<td>
                    <a href='modificar_servicio.php?id=" . $row['id_servicio'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_servicio.php?id=" . $row['id_servicio'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
