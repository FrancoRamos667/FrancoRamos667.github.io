<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Registros Laborales</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Registros Laborales</h2>
    <div class="menu">
        <a href="agregar_registroLaboral.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_registroLaboral.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>N° Registro</th>
            <th>N° Información Laboral</th>
            <th>N° Seguridad</th>
            <th>N° Capacitación</th>
            <th>N° Ingreso</th>
            <th>N° Impuesto</th>
            <th>N° Seguro</th>
            <th>N° Recurso Humano</th>
            <th>N° Riesgo</th>
            <th>Acciones</th>
        </tr>
        <?php
        include 'conexion2.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM registrolaboral";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_registro'] . "</td>";
            echo "<td>" . $row['id_informacionLaboral'] . "</td>";
            echo "<td>" . $row['id_seguridad'] . "</td>";
            echo "<td>" . $row['id_capacitacion'] . "</td>";
            echo "<td>" . $row['id_ingreso'] . "</td>";
            echo "<td>" . $row['id_impuesto'] . "</td>";
            echo "<td>" . $row['id_seguro'] . "</td>";
            echo "<td>" . $row['id_recursoHumano'] . "</td>";
            echo "<td>" . $row['id_riesgo'] . "</td>";
            echo "<td>
                    <a href='modificar_registroLaboral.php?id=" . $row['id_registro'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_registroLaboral.php?id=" . $row['id_registro'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>
