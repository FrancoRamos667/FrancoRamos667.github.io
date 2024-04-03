<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["busqueda"])) {
    $busqueda = $_POST["busqueda"];
    $query = "SELECT * FROM Contactoscontratistas WHERE id_contacto LIKE '%$busqueda%' OR id_contratista LIKE '%$busqueda%' OR cargoContacto LIKE '%$busqueda%' OR correoElectronico LIKE '%$busqueda%' OR telefonoContacto LIKE '%$busqueda%'";
    $result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Contacto de Contratista</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/style.css">
</head>
<body>

<div class="container">
    <h2>Buscar Contacto de Contratista</h2>
    <div class="menu">
        <a href="contactoContratista.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<?php if(mysqli_num_rows($result) > 0): ?>
    <table border="3">
        <tr>
            <th>Número de contacto</th>
            <th>Número de contratista</th>
            <th>Cargo</th>
            <th>Correo</th>
            <th>Número de Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id_contacto']; ?></td>
                <td><?php echo $row['id_contratista']; ?></td>
                <td><?php echo $row['cargoContacto']; ?></td>
                <td><?php echo $row['correoElectronico']; ?></td>
                <td><?php echo $row['telefonoContacto']; ?></td>
                <td>
                    <a href="modificar_contactoContratista.php?id=<?php echo $row['id_contacto']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                    <a href="eliminar_contactoContratista.php?id=<?php echo $row['id_contacto']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No se encontraron resultados para la búsqueda "<?php echo $busqueda; ?>".</p>
<?php endif; ?>

<br>
</body>
</html>

<?php
} else {
    echo "Debe ingresar un término de búsqueda.";
}
?>
