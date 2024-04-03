<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $departamento = $_POST["departamento"];
    $cargo = $_POST["cargo"];

    $query = "UPDATE recursoshumanos SET departamento='$departamento', cargo='$cargo' WHERE id_recursoHumano='$id'";
    mysqli_query($conexion, $query);

    header("Location: recursoHumano.php");
    exit();
}

// Obtener datos del recurso humano si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM recursoshumanos WHERE id_recursoHumano='$id'";
    $result = mysqli_query($conexion, $query);
    $recursoHumano = mysqli_fetch_assoc($result);
} else {
    $recursoHumano = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Recurso Humano</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleModificar.css">
</head>
<body>
    <h2>Modificar Recurso Humano</h2>
    <form action="modificar_recursoHumano.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="departamento">Departamento:</label>
        <input type="text" id="departamento" name="departamento" value="<?php echo isset($recursoHumano['departamento']) ? $recursoHumano['departamento'] : ''; ?>" required><br><br>
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" value="<?php echo isset($recursoHumano['cargo']) ? $recursoHumano['cargo'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Recurso Humano">
    </form>
    <a href="recursoHumano.php">Volver a Recursos Humanos</a>
</body>
</html>
