<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Trabajadores</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Trabajadores</h2>
    <div class="menu">
        <a href="agregar_trabajador.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_trabajador.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion2.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM trabajadores";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['fechaNacimiento'] . "</td>";
            echo "<td>" . $row['correo'] . "</td>";
            echo "<td>
                    <a href='modificar_trabajador.php?id=" . $row['id_trabajador'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_trabajador.php?id=" . $row['id_trabajador'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
