<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Domicilios de Clientes</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Domicilios de Clientes</h2>
    <div class="menu">
        <a href="agregar_domicilioCliente.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_domicilioCliente.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Barrio</th>
        <th>Calle</th>
        <th>Manzana</th>
        <th>Casa</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM domiciliosclientes";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['barrioCliente'] . "</td>";
        echo "<td>" . $row['calleCliente'] . "</td>";
        echo "<td>" . $row['manzanaCliente'] . "</td>";
        echo "<td>" . $row['casaCliente'] . "</td>";
        echo "<td>
                <a href='modificar_domicilioCliente.php?id=" . $row['id_domicilioCliente'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_domicilioCliente.php?id=" . $row['id_domicilioCliente'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
