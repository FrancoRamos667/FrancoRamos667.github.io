<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_contrato = $_POST["id_contrato"];
    $id_sucursal = $_POST["id_sucursal"];
    $id_cliente = $_POST["id_cliente"];
    $id_presupuestos = $_POST["id_presupuestos"];
    $solicitudCliente = $_POST["solicitudCliente"];
    $duracionEstimada = $_POST["duracionEstimada"];
    $id_formaPago = $_POST["id_formaPago"];

    $query = "UPDATE contratos SET 
              id_sucursal='$id_sucursal', 
              id_cliente='$id_cliente', 
              id_presupuestos='$id_presupuestos', 
              solicitudCliente='$solicitudCliente', 
              duracionEstimada='$duracionEstimada', 
              id_formaPago='$id_formaPago' 
              WHERE id_contrato='$id_contrato'";
    mysqli_query($conexion, $query);

    header("Location: contrato.php");
    exit();
}

if (isset($_GET["id"])) {
    $id_contrato = $_GET["id"];
    $query = "SELECT * FROM contratos WHERE id_contrato='$id_contrato'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: contrato.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Contrato</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleAgregar.css">
</head>
<body>
    <h2>Modificar Contrato</h2>
    <form action="modificar_contrato.php" method="post">
        <input type="hidden" name="id_contrato" value="<?php echo $row['id_contrato']; ?>">
        <label for="id_sucursal">Número de Sucursal:</label>
        <input type="text" id="id_sucursal" name="id_sucursal" value="<?php echo $row['id_sucursal']; ?>" required><br><br>
        <label for="id_cliente">Número de Cliente:</label>
        <input type="text" id="id_cliente" name="id_cliente" value="<?php echo $row['id_cliente']; ?>" required><br><br>
        <label for="id_presupuestos">Número de Presupuesto:</label>
        <input type="text" id="id_presupuestos" name="id_presupuestos" value="<?php echo $row['id_presupuestos']; ?>" required><br><br>
        <label for="solicitudCliente">Solicitud del Cliente:</label>
        <input type="text" id="solicitudCliente" name="solicitudCliente" value="<?php echo $row['solicitudCliente']; ?>" required><br><br>
        <label for="duracionEstimada">Duración Estimada:</label>
        <input type="text" id="duracionEstimada" name="duracionEstimada" value="<?php echo $row['duracionEstimada']; ?>" required><br><br>
        <label for="id_formaPago">Número de Forma de Pago:</label>
        <input type="text" id="id_formaPago" name="id_formaPago" value="<?php echo $row['id_formaPago']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="contrato.php">Cancelar</a>
</body>
</html>
