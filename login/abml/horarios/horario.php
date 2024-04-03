<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Horarios</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Horarios</h2>
    <div class="menu">
        <a href="agregar_horario.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_horario.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Hora de Entrada</th>
        <th>Hora de Salida</th>
        <th>Días Laborales</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM horarios";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['horaEntrada'] . "</td>";
        echo "<td>" . $row['horaSalida'] . "</td>";
        echo "<td>" . $row['diasLaborales'] . "</td>";
        echo "<td>" . $row['descripcion'] . "</td>";
        echo "<td>
                <a href='modificar_horario.php?id=" . $row['id_horario'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_horario.php?id=" . $row['id_horario'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
