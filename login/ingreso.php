<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["usuario"])) {
    header("Location: http://localhost/constructora/inicio.html");
    exit;
}

// Obtener el nombre de usuario
$nombre_usuario = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Lateral</title>
    <link rel="stylesheet" href="ingreso.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <style>

        body{
            background-image: url('https://cdn.pixabay.com/photo/2020/01/26/19/32/architecture-4795667_1280.jpg');
        }

        .nombre-clase {
            display: flex;
            justify-content: center;
            font-size: 50px;
            font-weight: bold;
            color: azure;
            text-transform: uppercase;
            text-shadow: 6px 3px 6px #18B8F0; /* Agrega una sombra al texto */
        }
        
        .usuario {
            font-size: 50px;
            color: azure;
            font-weight: bold;
            display: inline-block; /* Asegura que el elemento se muestre como bloque en línea */
            text-shadow: 6px 3px 6px #18B8F0;
        }

        /* Estilos para el menú lateral */
        .options__menu {
            overflow-y: auto; /* Agrega la barra de desplazamiento vertical */
            max-height: calc(100vh - 120px); /* Limita la altura máxima para mantener el espacio para el botón de cerrar sesión */
        }

        /* Estilos para la barra de desplazamiento */
        .options__menu::-webkit-scrollbar {
            width: 10px; /* Ancho de la barra de desplazamiento */
        }

        /* Estilos para el pulgar de la barra de desplazamiento */
        .options__menu::-webkit-scrollbar-thumb {
            background-color: #07ffc5; /* Color del pulgar de la barra de desplazamiento */
            border-radius: 5px; /* Borde redondeado del pulgar de la barra de desplazamiento */
        }

        .casco{
            color: aqua;
            font-size: 30px;
        }

        .texto{
            color: black;
            font-size: 25px;
            -webkit-text-stroke: 1px #07D1D8 ; /* Ancho y color del borde para navegadores WebKit (Safari, Chrome, etc.) */
        }

        /* Ocultar el menú lateral por defecto */
        .menu__side {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #000000;
            transition: all 0.3s ease;
        }

        /* Mostrar el menú lateral cuando se abre */
        .menu__side.active {
            left: 0;
        }

        /* Estilos para el contenido principal */
        main {
            margin-left: 250px; /* Ajustar el margen para que no se solape con el menú lateral */
            padding: 20px;
        }

        .back-to-home {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-to-home:hover {
            background-color: #0056b3;
        }

        /* Estilos para el icono de menú */
        .icon__menu {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        /* Estilos para los enlaces del menú lateral */
        .options__menu a {
            display: block;
            padding: 15px;
            color: #fff;
            text-decoration: none;
            font-size: 30px
            transition: background-color 0.3s ease;
        }
        

        .options__menu a:hover {
            background-color: #1EABDC;
        }

        /* Estilos para el nombre de la página */
        .name__page {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .name__page h4 {
            margin-left: 10px;
            color: #fff;
        }
        /* Estilos adicionales según sea necesario */

        .a{
            text-decoration: none;
            font-size: 25px;
        }

        p{
            color: transparent;
            text-shadow: 10px 6px 10px #004DFF ; /* Agrega una sombra al texto */
            margin: 0;
            padding:0;
        }

    </style>
</head>
<body class="active">

<div class="menu__side active" id="menu_side">
    <div class="name__page">
        <div class="texto">
        <h3>ConstructoraRV</h3>
        </div>
        <div class="casco">
        <i class="fa-solid fa-helmet-safety"></i>
        </div>
    </div>

    <div class="options__menu">
        <!-- Enlaces del menú lateral -->
        <a href="abml/almacenes/almacen.php" class="a">Almacenes</a>
        <a href="abml/almacenesDetalles/almacenDetalle.php" class="a">Detalles de los Almacenes</a>
        <a href="abml/asignaciones/asignacion.php" class="a">Asignaciones de vehículos</a>
        <a href="abml/asignacionesContratistas/asignacionContratista.php" class="a">Asignaciones de contratistas</a>
        <a href="abml/avancesObras/avanceObra.php" class="a">Avances de la obra</a>
        <a href="abml/capacitaciones/capacitacion.php" class="a">Capacitaciones</a>
        <a href="abml/clientes/cliente.php" class="a">Clientes</a>
        <a href="abml/comprasVentas/compra.php" class="a">Compras</a>
        <a href="abml/ContactosContratistas/ContactoContratista.php" class="a">Contacto Contratistas</a>
        <a href="abml/contratistas/contratista.php" class="a">Contratistas</a>
        <a href="abml/contratos/contrato.php" class="a">Contratos</a>
        <a href="abml/detallesCompras/detalleCompra.php" class="a">Detalles de las compras</a>
        <a href="abml/detallesDepositos/detalleDeposito.php" class="a">Detalles de los depósitos</a>
        <a href="abml/detallesPresupuestos/detallePresupuesto.php" class="a">Detalles de los presupuestos</a>
        <a href="abml/documentosAdjuntos/documentoAdjunto.php" class="a">Documentos adjuntos</a>
        <a href="abml/documentosLegales/documentoLegal.php" class="a">Documentos legales</a>
        <a href="abml/domicilios/domicilio.php" class="a">Domicilio de los trabajadores</a>
        <a href="abml/domiciliosClientes/domicilioCliente.php" class="a">Domicilio de los clientes</a>
        <a href="abml/equiposHerramientas/herramienta.php" class="a">Herramientas</a>
        <a href="abml/facturas/factura.php" class="a">Facturas</a>
        <a href="abml/formasPagos/formaPago.php" class="a">Formas de pagos</a>
        <a href="abml/horarios/horario.php" class="a">Horarios de trabajo</a>
        <a href="abml/horariosDepositos/horarioDeposito.php" class="a">Horarios de depósitos</a>
        <a href="abml/impuestos/impuesto.php" class="a">Impuestos del trabajador</a>
        <a href="abml\indicenciasObras\incidenciaObra.php" class="a">Accidentes en las obras</a>
        <a href="abml/infoclientes/datoCliente.php" class="a">Datos de los clientes</a>
        <a href="abml/infoLaborales/datoLaboral.php" class="a">Datos laborales</a>
        <a href="abml/infoPersonales/datoPersonal.php" class="a">Datos de los trabajadores</a>
        <a href="abml/ingresos/ingreso.php" class="a">Ingresos Monetarios</a>
        <a href="abml/materiales/material.php" class="a">Materiales</a>
        <a href="abml/obras/obra.php" class="a">Obras</a>
        <a href="abml/presupuestos/presupuesto.php" class="a">Presupuestos</a>
        <a href="abml/proveedores/proveedor.php" class="a">Proveedores</a>
        <a href="abml/proyectosObras/proyectoObra.php" class="a">Proyectos de las Obras</a>
        <a href="abml/recursosHumanos/recursoHumano.php" class="a">Recursos Humanos</a>
        <a href="abml/registrosLaborales/registroLaboral.php" class="a">Registros Laborales</a>
        <a href="abml/riesgos/riesgo.php" class="a">Riesgos Laborales</a>
        <a href="abml/rutas/ruta.php" class="a">Rutas</a>
        <a href="abml/seguimientosContratos/seguimientoContrato.php" class="a">Seguimiento de los Contratos</a>
        <a href="abml/seguridadesLaborales/seguridadLaboral.php" class="a">Seguridad Laboral</a>
        <a href="abml/segurosMedicos/seguroMedico.php" class="a">Seguros Médicos</a>
        <a href="abml/servicios/servicio.php" class="a">Servicios</a>
        <a href="abml/telefonos/telefono.php" class="a">Teléfonos del personal</a>
        <a href="abml/telefonosClientes/telefonoCliente.php" class="a">Teléfonos de los clientes</a>
        <a href="abml/trabajadores/trabajador.php" class="a">Trabajadores</a>
        <a href="abml/vehiculos/vehiculo.php" class="a">Vehículos</a>
    </div>
</div>

<main>

<a href="cerrar_sesion.php" class="back-to-home">Cerrar Sesión</a>

<h1 class="nombre-clase">Bienvenido <p>_</p><span class="usuario"><?php echo " ". $nombre_usuario; ?></span></h1>
<p>_______________________________________________________________________________________________________________________________________</p>

<script>
    // Seleccionar los elementos
    const nombreClase = document.querySelector('.nombre-clase');
    const usuario = document.querySelector('.usuario');

    // Función para cambiar la sombra del texto de "Bienvenido" a azure después de 3 segundos
    function cambiarSombraAzure() {
        nombreClase.style.textShadow = '6px 3px 6px #021CFA'; // Cambiar la sombra del texto a azure
        // Programar la función para revertir la sombra después de otros 3 segundos
        setTimeout(cambiarSombraOriginal, 3000); // 3000 milisegundos = 3 segundos
    }

    // Función para cambiar la sombra del texto al original
    function cambiarSombraOriginal() {
        nombreClase.style.textShadow = '6px 3px 6px #18B8F0'; // Cambiar la sombra del texto al original
        // Programar la función para cambiar la sombra a azure nuevamente después de 3 segundos
        setTimeout(cambiarSombraAzure, 3000); // 3000 milisegundos = 3 segundos
    }

    // Función para cambiar la sombra del nombre de usuario a azure después de 3 segundos
    function cambiarSombraUsuario() {
        usuario.style.textShadow = '6px 3px 6px #021CFA'; // Cambiar la sombra del texto a azure
        // Programar la función para revertir la sombra después de otros 3 segundos
        setTimeout(cambiarSombraUsuarioOriginal, 3000); // 3000 milisegundos = 3 segundos
    }

    // Función para cambiar la sombra del nombre de usuario al original
    function cambiarSombraUsuarioOriginal() {
        usuario.style.textShadow = '6px 3px 6px #18B8F0'; // Cambiar la sombra del texto al original
        // Programar la función para cambiar la sombra a azure nuevamente después de 3 segundos
        setTimeout(cambiarSombraUsuario, 3000); // 3000 milisegundos = 3 segundos
    }

    // Iniciar el ciclo de cambio de sombra para "Bienvenido" y el nombre de usuario
    cambiarSombraAzure(); // Cambia la sombra de "Bienvenido" a azure
    cambiarSombraUsuario(); // Cambia la sombra del nombre de usuario a azure
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Sucursales</title>

    <style>

    * {
        margin: 0;
        padding: 0;
    }

    /* Estilos para la tabla */
    table {
        font-weight: bold;
        background-color: rgba(240, 255, 255, 0.781);
        width: 100%;
        border-collapse: collapse;
        color: black;
        
    }


    /* Estilos para las filas pares e impares */
    tr:nth-child(even) {
        background-color: #3498dbc9;
        color: black;
    }

    /* Estilos para el encabezado de la tabla */
    th {
        background-color: #00143d;
        color: azure;
    }

    a:hover {
        text-decoration: underline;
    }

    h2 {
        display: flex;
        justify-content: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: azure;
        -webkit-text-stroke: 2px black; /* Ancho y color del borde para navegadores WebKit (Safari, Chrome, etc.) */
        text-stroke: 2px black; /* Ancho y color del borde */
        margin-left: 200px;
    }

    img {
        width: 50px;
        height: 50px;
    }

    /* Estilos para el contenedor del menú */
    .container {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        font-size: 30px;
        color: azure;
        background-color:rgba(47, 148, 148, 0.61) ;
    }

    /* Estilos para el menú */
    .menu {
        display: flex;
        align-items: center;
        margin-left: auto; /* Alinea el menú a la derecha */
    }

    /* Estilos para los enlaces del menú */
    .menu a {
        text-decoration: none;
        margin-left: 20px;
        color: #000000;
    }

    /* Estilos para los enlaces del menú al pasar el ratón */
    .menu a:hover {
        color: #ECA219;
    }

    table {
        border-color: black;
    }


    th, td {
        padding: 8px;
        text-align: left;
        font-size: 25px;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Listado de Sucursales</h2>
    <div class="menu">
        <a href="agregar_sucursal.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_sucursal.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
    </div>
</div>
    
    <div>
    <table border="3" >
        <tr>
            <th>Sucursal</th>
            <th>Ubicación</th>
            <th>Tamaño</th>
            <th>Acciones</th>
        </tr>

    </div>
        <?php
        include 'conexion.php'; // Ruta relativa al archivo de conexión

        $query = "SELECT * FROM sucursal";
        $result = mysqli_query($conexion, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['sucursal'] . "</td>";
            echo "<td>" . $row['ubicacion'] . "</td>";
            echo "<td>" . $row['tamaño'] . "</td>";
            echo "<td>
                    <a href='modificar_sucursal.php?id=" . $row['id_sucursal'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                    <a href='eliminar_sucursal.php?id=" . $row['id_sucursal'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>
</html>



    
</main>

<script src="js.js"></script>

</body>
</html>
