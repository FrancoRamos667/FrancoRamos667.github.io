<?php
include 'conexion2.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Obras</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Obras</h2>
    <div class="menu">
        <a href="agregar_obra.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_obra.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>N° Obra</th>
            <th>N° Sucurcal</th>
            <th>Obra</th>
            <th>fecha de Obra</th>
            <th>Acciones</th>
        </tr>
        <?php
        $query = "SELECT * FROM obras";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_obra'] . "</td>";
            echo "<td>" . $row['id_sucursal'] . "</td>";
            echo "<td>" . $row['obra'] . "</td>";
            echo "<td>" . $row['fechaObra'] . "</td>";
            echo "<td>
                    <a href='modificar_obra.php?id=" . $row['id_obra'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_obra.php?id=" . $row['id_obra'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
