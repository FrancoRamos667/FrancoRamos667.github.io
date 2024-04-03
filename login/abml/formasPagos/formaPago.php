<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Formas de Pago</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Formas de Pago</h2>
    <div class="menu">
        <a href="agregar_formaPago.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_formaPago.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID Forma de Pago</th>
        <th>Fecha de Pago</th>
        <th>Monto de Pago</th>
        <th>Método de Pago</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM formaspagos";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_formaPago'] . "</td>";
        echo "<td>" . $row['fechaPago'] . "</td>";
        echo "<td>" . $row['montoPago'] . "</td>";
        echo "<td>" . $row['metodoPago'] . "</td>";
        echo "<td>
                <a href='modificar_formaPago.php?id=" . $row['id_formaPago'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_formaPago.php?id=" . $row['id_formaPago'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
