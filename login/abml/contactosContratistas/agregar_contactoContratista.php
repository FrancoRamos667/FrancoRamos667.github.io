<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_contratista = $_POST["id_contratista"];
    $cargoContacto = $_POST["cargoContacto"];
    $correoElectronico = $_POST["correoElectronico"];
    $telefonoContacto = $_POST["telefonoContacto"];

    $query = "INSERT INTO Contactoscontratistas (id_contratista, cargoContacto, correoElectronico, telefonoContacto) 
              VALUES ('$id_contratista', '$cargoContacto', '$correoElectronico', '$telefonoContacto')";
    mysqli_query($conexion, $query);

    header("Location: contactoContratista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contacto de Contratista</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Agregar Contacto de Contratista</h2>
    <form action="agregar_contactoContratista.php" method="post">
        <label for="id_contratista">Número de Contratista:</label>
        <input type="text" id="id_contratista" name="id_contratista" required><br><br>
        <label for="cargoContacto">Cargo del Contacto:</label>
        <input type="text" id="cargoContacto" name="cargoContacto" required><br><br>
        <label for="correoElectronico">Correo Electrónico:</label>
        <input type="text" id="correoElectronico" name="correoElectronico" required><br><br>
        <label for="telefonoContacto">Número de Teléfono:</label>
        <input type="text" id="telefonoContacto" name="telefonoContacto" required><br><br>
        <input type="submit" value="Agregar Contacto de Contratista">
    </form>
    <a href="contactoContratista.php">Volver al Listado de Contactos de Contratistas</a>
</body>
</html>
