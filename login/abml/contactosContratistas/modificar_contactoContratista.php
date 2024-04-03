<?php
include 'conexion2.php';

// Verificar si se ha enviado un ID válido por el método GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_contacto = $_GET['id'];

    // Obtener los datos del contacto de contratista mediante su ID
    $query = "SELECT * FROM Contactoscontratistas WHERE id_contacto = '$id_contacto'";
    $result = mysqli_query($conexion, $query);

    // Verificar si se encontró el contacto de contratista
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verificar si se ha enviado el formulario de modificación
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cargoContacto = $_POST["cargoContacto"];
            $correoElectronico = $_POST["correoElectronico"];
            $telefonoContacto = $_POST["telefonoContacto"];

            // Actualizar los datos del contacto de contratista en la base de datos
            $query_update = "UPDATE Contactoscontratistas 
                             SET cargoContacto = '$cargoContacto', 
                                 correoElectronico = '$correoElectronico', 
                                 telefonoContacto = '$telefonoContacto' 
                             WHERE id_contacto = '$id_contacto'";
            mysqli_query($conexion, $query_update);

            // Redireccionar al listado de contactos de contratistas
            header("Location: contactoContratista.php");
            exit();
        }
    } else {
        echo "Contacto de contratista no encontrado.";
        exit();
    }
} else {
    echo "ID de contacto de contratista no especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Contacto de Contratista</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Modificar Contacto de Contratista</h2>
    <form action="modificar_contactoContratista.php?id=<?php echo $id_contacto; ?>" method="post">
        <label for="cargoContacto">Cargo del Contacto:</label>
        <input type="text" id="cargoContacto" name="cargoContacto" value="<?php echo $row['cargoContacto']; ?>" required><br><br>
        <label for="correoElectronico">Correo Electrónico:</label>
        <input type="text" id="correoElectronico" name="correoElectronico" value="<?php echo $row['correoElectronico']; ?>" required><br><br>
        <label for="telefonoContacto">Número de Teléfono:</label>
        <input type="text" id="telefonoContacto" name="telefonoContacto" value="<?php echo $row['telefonoContacto']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="contactoContratista.php">Volver al Listado de Contactos de Contratistas</a>
</body>
</html>
