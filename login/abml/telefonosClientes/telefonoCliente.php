<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Teléfonos de Clientes</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Teléfonos de Clientes</h2>
    <div class="menu">
        <a href="agregar_telefonoCliente.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_telefonoCliente.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>Código de Área</th>
            <th>Número de Celular</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion2.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM telefonosclientes";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['codAreaCliente'] . "</td>";
            echo "<td>" . $row['numCelular'] . "</td>";
            echo "<td>
                    <a href='modificar_telefonoCliente.php?id=" . $row['id_celCliente'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_telefonoCliente.php?id=" . $row['id_celCliente'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>