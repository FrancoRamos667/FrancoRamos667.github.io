<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Horarios de Depósitos</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Horarios de Depósitos</h2>
    <div class="menu">
        <a href="agregar_horarioDeposito.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_horarioDeposito.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>dias</th>
        <th>horarios</th>
        <th>horarios mantetenimientos</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM horariosDepositos";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['fechaOperacion'] . "</td>";
        echo "<td>" . $row['horarioOperacion'] . "</td>";
        echo "<td>" . $row['horarioMantenimiento'] . "</td>";
        echo "<td>
                <a href='modificar_horarioDeposito.php?id=" . $row['id_horarioDeposito'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_horarioDeposito.php?id=" . $row['id_horarioDeposito'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
