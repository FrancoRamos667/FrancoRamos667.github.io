<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Seguros Médicos</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Seguros Médicos</h2>
    <div class="menu">
        <a href="agregar_seguroMedico.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_seguroMedico.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>Tipo de Seguro</th>
            <th>Cobertura</th>
            <th>Fecha de Seguro</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion2.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM segurosmedicos";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['tipoSeguro'] . "</td>";
            echo "<td>" . $row['cobertura'] . "</td>";
            echo "<td>" . $row['fechaSeguro'] . "</td>";
            echo "<td>
                    <a href='modificar_seguroMedico.php?id=" . $row['id_seguro'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_seguroMedico.php?id=" . $row['id_seguro'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
