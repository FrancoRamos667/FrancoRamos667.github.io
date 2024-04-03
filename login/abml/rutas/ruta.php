<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Rutas</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Rutas</h2>
    <div class="menu">
        <a href="agregar_ruta.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_ruta.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>ID</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Distancia</th>
            <th>Duración Estimada</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion2.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM rutas";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_ruta'] . "</td>";
            echo "<td>" . $row['origen'] . "</td>";
            echo "<td>" . $row['destino'] . "</td>";
            echo "<td>" . $row['distancia'] . "</td>";
            echo "<td>" . $row['duracionEstimada'] . "</td>";
            echo "<td>
                    <a href='modificar_ruta.php?id=" . $row['id_ruta'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_ruta.php?id=" . $row['id_ruta'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
