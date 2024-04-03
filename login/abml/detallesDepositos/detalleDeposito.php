<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Detalles de Depósito</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Detalles de Depósito</h2>
    <div class="menu">
        <a href="agregar_detalleDeposito.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_detalleDeposito.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID Detalle Depósito</th>
        <th>ID Depósito</th>
        <th>Accesibilidad</th>
        <th>Edificio</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM detallesdepositos";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_detalleDeposito'] . "</td>";
        echo "<td>" . $row['id_deposito'] . "</td>";
        echo "<td>" . $row['accesibilidad'] . "</td>";
        echo "<td>" . $row['edificio'] . "</td>";
        echo "<td>
                <a href='modificar_detalleDeposito.php?id=" . $row['id_detalleDeposito'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_detalleDeposito.php?id=" . $row['id_detalleDeposito'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
