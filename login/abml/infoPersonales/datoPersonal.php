<?php
include 'conexion2.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Datos Personales</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Datos Personales</h2>
    <div class="menu">
        <a href="agregar_datoPersonal.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_datoPersonal.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>ID Información</th>
            <th>ID Trabajador</th>
            <th>ID Domicilio</th>
            <th>ID Teléfono</th>
            <th>ID Información Laboral</th>
            <th>Acciones</th>
        </tr>
        <?php
        $query = "SELECT * FROM informacionespersonales";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_info'] . "</td>";
            echo "<td>" . $row['id_trabajador'] . "</td>";
            echo "<td>" . $row['id_domicilio'] . "</td>";
            echo "<td>" . $row['id_telefono'] . "</td>";
            echo "<td>" . $row['id_infoLaboral'] . "</td>";
            echo "<td>
                    <a href='modificar_datoPersonal.php?id=" . $row['id_info'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_datoPersonal.php?id=" . $row['id_info'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
